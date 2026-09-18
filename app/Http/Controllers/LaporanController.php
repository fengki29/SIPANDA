<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPajakExport;
use App\Models\JenisPajak;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\TargetPajak;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun;
        $jenis = $request->jenis;
        $status = $request->status;

        $tagihanQuery = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
            'pembayarans',
        ]);

        if ($tahun) {
            $tagihanQuery->where('tahun_pajak', $tahun);
        }

        if ($jenis) {
            $tagihanQuery->where('jenis_pajak_id', $jenis);
        }

        if ($status) {
            $tagihanQuery->where('status', $status);
        }

        $tagihans = $tagihanQuery
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $statistikQuery = Tagihan::query();

        if ($tahun) {
            $statistikQuery->where('tahun_pajak', $tahun);
        }

        if ($jenis) {
            $statistikQuery->where('jenis_pajak_id', $jenis);
        }

        $totalTagihan = (float) (clone $statistikQuery)
            ->sum('total_tagihan');

        $jumlahTagihan = (clone $statistikQuery)
            ->count();

        $jumlahLunas = (clone $statistikQuery)
            ->where('status', 'lunas')
            ->count();

        $jumlahBelumLunas = (clone $statistikQuery)
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ])
            ->count();

        $pembayaranQuery = Pembayaran::query();

        if ($tahun) {
            $pembayaranQuery->whereHas(
                'tagihan',
                function ($query) use ($tahun) {
                    $query->where(
                        'tahun_pajak',
                        $tahun
                    );
                }
            );
        }

        if ($jenis) {
            $pembayaranQuery->whereHas(
                'tagihan',
                function ($query) use ($jenis) {
                    $query->where(
                        'jenis_pajak_id',
                        $jenis
                    );
                }
            );
        }

        $totalPembayaran = (float) (clone $pembayaranQuery)
            ->sum('jumlah_bayar');

        $totalTunggakan = Tagihan::withSum(
            'pembayarans',
            'jumlah_bayar'
        )
            ->when($tahun, function ($query) use ($tahun) {
                $query->where(
                    'tahun_pajak',
                    $tahun
                );
            })
            ->when($jenis, function ($query) use ($jenis) {
                $query->where(
                    'jenis_pajak_id',
                    $jenis
                );
            })
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ])
            ->get()
            ->sum(function ($tagihan) {
                return max(
                    0,
                    (float) $tagihan->total_tagihan
                    -
                    (float) (
                        $tagihan
                            ->pembayarans_sum_jumlah_bayar
                        ?? 0
                    )
                );
            });

        $targetQuery = TargetPajak::query();

        if ($tahun) {
            $targetQuery->where(
                'tahun',
                $tahun
            );
        }

        if ($jenis) {
            $targetQuery->where(
                'jenis_pajak_id',
                $jenis
            );
        }

        $totalTarget = (float) $targetQuery
            ->sum('target');

        $persentasePencapaian = $totalTarget > 0
            ? ($totalPembayaran / $totalTarget) * 100
            : 0;

        $persentasePencapaian = min(
            $persentasePencapaian,
            100
        );

        $jenisPajakQuery = JenisPajak::query()
            ->where('status', true)
            ->orderBy('nama');

        if ($jenis) {
            $jenisPajakQuery->where(
                'id',
                $jenis
            );
        }

        $jenisPajakRingkasan = $jenisPajakQuery
            ->get()
            ->map(function ($jenisPajak) use ($tahun) {

                $targetQuery = TargetPajak::query()
                    ->where(
                        'jenis_pajak_id',
                        $jenisPajak->id
                    );

                if ($tahun) {
                    $targetQuery->where(
                        'tahun',
                        $tahun
                    );
                }

                $target = (float) $targetQuery
                    ->sum('target');

                $realisasiQuery = Pembayaran::query()
                    ->whereHas(
                        'tagihan',
                        function ($query) use (
                            $jenisPajak,
                            $tahun
                        ) {
                            $query->where(
                                'jenis_pajak_id',
                                $jenisPajak->id
                            );

                            if ($tahun) {
                                $query->where(
                                    'tahun_pajak',
                                    $tahun
                                );
                            }
                        }
                    );

                $realisasi = (float) $realisasiQuery
                    ->sum('jumlah_bayar');

                $tagihanQuery = Tagihan::query()
                    ->where(
                        'jenis_pajak_id',
                        $jenisPajak->id
                    );

                if ($tahun) {
                    $tagihanQuery->where(
                        'tahun_pajak',
                        $tahun
                    );
                }

                $nilaiTagihan = (float) $tagihanQuery
                    ->sum('total_tagihan');

                $jumlahTagihan = $tagihanQuery
                    ->count();

                $persentase = $target > 0
                    ? ($realisasi / $target) * 100
                    : 0;

                $persentase = min(
                    $persentase,
                    100
                );

                return [
                    'id' => $jenisPajak->id,
                    'nama' => $jenisPajak->nama,
                    'kode' => $jenisPajak->kode,
                    'target' => $target,
                    'realisasi' => $realisasi,
                    'persentase' => $persentase,
                    'nilai_tagihan' => $nilaiTagihan,
                    'jumlah_tagihan' => $jumlahTagihan,
                    'selisih' => max(
                        $target - $realisasi,
                        0
                    ),
                ];
            });

        $tahunTersedia = Tagihan::query()
            ->select('tahun_pajak')
            ->distinct()
            ->orderByDesc('tahun_pajak')
            ->pluck('tahun_pajak');

        $tahunTarget = TargetPajak::query()
            ->select('tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');

        $tahunTersedia = $tahunTersedia
            ->merge($tahunTarget)
            ->unique()
            ->sortDesc()
            ->values();

        $jenisPajaks = JenisPajak::where(
            'status',
            true
        )
            ->orderBy('nama')
            ->get();

        return view(
            'laporan.index',
            compact(
                'tagihans',
                'totalTagihan',
                'jumlahTagihan',
                'jumlahLunas',
                'jumlahBelumLunas',
                'totalPembayaran',
                'totalTunggakan',
                'totalTarget',
                'persentasePencapaian',
                'jenisPajakRingkasan',
                'tahunTersedia',
                'jenisPajaks'
            )
        );
    }

    public function exportExcel(Request $request)
    {
        $tahun = $request->tahun;
        $jenis = $request->jenis;
        $status = $request->status;

        $namaFile = 'laporan-pajak';

        if ($tahun) {
            $namaFile .= '-' . $tahun;
        }

        $namaFile .= '-'
            . now()->format('Y-m-d-His')
            . '.xlsx';

        return Excel::download(
            new LaporanPajakExport(
                $tahun,
                $jenis,
                $status
            ),
            $namaFile
        );
    }

    public function exportPdf(Request $request)
    {
        $tahun = $request->tahun;
        $jenis = $request->jenis;
        $status = $request->status;

        $query = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
            'pembayarans',
        ]);

        if ($tahun) {
            $query->where(
                'tahun_pajak',
                $tahun
            );
        }

        if ($jenis) {
            $query->where(
                'jenis_pajak_id',
                $jenis
            );
        }

        if ($status) {
            $query->where(
                'status',
                $status
            );
        }

        $tagihans = $query
            ->latest()
            ->get();

        $statistikQuery = Tagihan::query();

        if ($tahun) {
            $statistikQuery->where(
                'tahun_pajak',
                $tahun
            );
        }

        if ($jenis) {
            $statistikQuery->where(
                'jenis_pajak_id',
                $jenis
            );
        }

        $totalTagihan = (float) (clone $statistikQuery)
            ->sum('total_tagihan');

        $jumlahTagihan = (clone $statistikQuery)
            ->count();

        $jumlahLunas = (clone $statistikQuery)
            ->where('status', 'lunas')
            ->count();

        $jumlahBelumLunas = (clone $statistikQuery)
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ])
            ->count();

        $pembayaranQuery = Pembayaran::query();

        if ($tahun) {
            $pembayaranQuery->whereHas(
                'tagihan',
                function ($query) use ($tahun) {
                    $query->where(
                        'tahun_pajak',
                        $tahun
                    );
                }
            );
        }

        if ($jenis) {
            $pembayaranQuery->whereHas(
                'tagihan',
                function ($query) use ($jenis) {
                    $query->where(
                        'jenis_pajak_id',
                        $jenis
                    );
                }
            );
        }

        $totalPembayaran = (float) $pembayaranQuery
            ->sum('jumlah_bayar');

        $totalTunggakan = Tagihan::withSum(
            'pembayarans',
            'jumlah_bayar'
        )
            ->when($tahun, function ($query) use ($tahun) {
                $query->where(
                    'tahun_pajak',
                    $tahun
                );
            })
            ->when($jenis, function ($query) use ($jenis) {
                $query->where(
                    'jenis_pajak_id',
                    $jenis
                );
            })
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ])
            ->get()
            ->sum(function ($tagihan) {
                return max(
                    0,
                    (float) $tagihan->total_tagihan
                    -
                    (float) (
                        $tagihan
                            ->pembayarans_sum_jumlah_bayar
                        ?? 0
                    )
                );
            });

        $targetQuery = TargetPajak::query();

        if ($tahun) {
            $targetQuery->where(
                'tahun',
                $tahun
            );
        }

        if ($jenis) {
            $targetQuery->where(
                'jenis_pajak_id',
                $jenis
            );
        }

        $totalTarget = (float) $targetQuery
            ->sum('target');

        $persentasePencapaian = $totalTarget > 0
            ? ($totalPembayaran / $totalTarget) * 100
            : 0;

        $persentasePencapaian = min(
            $persentasePencapaian,
            100
        );

        $jenisPajakRingkasanQuery = JenisPajak::query()
            ->where('status', true)
            ->orderBy('nama');

        if ($jenis) {
            $jenisPajakRingkasanQuery->where(
                'id',
                $jenis
            );
        }

        $jenisPajakRingkasan = $jenisPajakRingkasanQuery
            ->get()
            ->map(function ($jenisPajak) use ($tahun) {

                $targetQuery = TargetPajak::query()
                    ->where(
                        'jenis_pajak_id',
                        $jenisPajak->id
                    );

                if ($tahun) {
                    $targetQuery->where(
                        'tahun',
                        $tahun
                    );
                }

                $target = (float) $targetQuery
                    ->sum('target');

                $realisasi = (float) Pembayaran::query()
                    ->whereHas(
                        'tagihan',
                        function ($query) use (
                            $jenisPajak,
                            $tahun
                        ) {
                            $query->where(
                                'jenis_pajak_id',
                                $jenisPajak->id
                            );

                            if ($tahun) {
                                $query->where(
                                    'tahun_pajak',
                                    $tahun
                                );
                            }
                        }
                    )
                    ->sum('jumlah_bayar');

                $persentase = $target > 0
                    ? ($realisasi / $target) * 100
                    : 0;

                $persentase = min(
                    $persentase,
                    100
                );

                return [
                    'nama' => $jenisPajak->nama,
                    'kode' => $jenisPajak->kode,
                    'target' => $target,
                    'realisasi' => $realisasi,
                    'persentase' => $persentase,
                    'selisih' => max(
                        $target - $realisasi,
                        0
                    ),
                ];
            });

        $jenisPajakNama = 'Semua Jenis Pajak';

        if ($jenis) {
            $jenisPajak = JenisPajak::find($jenis);

            if ($jenisPajak) {
                $jenisPajakNama = $jenisPajak->nama;
            }
        }

        $pdf = Pdf::loadView(
            'laporan.pdf',
            compact(
                'tagihans',
                'tahun',
                'jenis',
                'status',
                'jenisPajakNama',
                'totalTagihan',
                'jumlahTagihan',
                'jumlahLunas',
                'jumlahBelumLunas',
                'totalPembayaran',
                'totalTunggakan',
                'totalTarget',
                'persentasePencapaian',
                'jenisPajakRingkasan'
            )
        );

        $pdf->setPaper(
            'a4',
            'landscape'
        );

        $namaFile = 'laporan-pajak';

        if ($tahun) {
            $namaFile .= '-' . $tahun;
        }

        $namaFile .= '-'
            . now()->format('Y-m-d-His')
            . '.pdf';

        return $pdf->download($namaFile);
    }
}