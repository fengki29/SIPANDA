<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use App\Models\ObjekPajak;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\TargetPajak;
use App\Models\WajibPajak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = (int) $request->input(
            'tahun',
            now()->year
        );

        /*
        |--------------------------------------------------------------------------
        | DATA WAJIB PAJAK
        |--------------------------------------------------------------------------
        */

        $totalWajibPajak = WajibPajak::count();

        $wajibPajakAktif = WajibPajak::where(
            'status',
            true
        )->count();

        $wajibPajakTidakAktif = WajibPajak::where(
            'status',
            false
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DATA OBJEK PAJAK
        |--------------------------------------------------------------------------
        */

        $totalObjekPajak = ObjekPajak::count();

        $objekPajakAktif = ObjekPajak::where(
            'status',
            true
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DATA TAGIHAN
        |--------------------------------------------------------------------------
        */

        $tagihansTahun = Tagihan::where(
            'tahun_pajak',
            $tahun
        );

        $totalTagihan = (clone $tagihansTahun)
            ->count();

        $totalNilaiTagihan = (float) (clone $tagihansTahun)
            ->sum('total_tagihan');

        $tagihanBelumBayar = (clone $tagihansTahun)
            ->where(
                'status',
                'belum_bayar'
            )
            ->count();

        $tagihanSebagian = (clone $tagihansTahun)
            ->where(
                'status',
                'sebagian'
            )
            ->count();

        $tagihanLunas = (clone $tagihansTahun)
            ->where(
                'status',
                'lunas'
            )
            ->count();

        $tagihanJatuhTempo = (clone $tagihansTahun)
            ->where(
                'status',
                'jatuh_tempo'
            )
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN TAHUN TERPILIH
        |--------------------------------------------------------------------------
        */

        $pembayaranTahunQuery = Pembayaran::whereHas(
            'tagihan',
            function ($query) use ($tahun) {
                $query->where(
                    'tahun_pajak',
                    $tahun
                );
            }
        );

        $totalPembayaran = (float) (clone $pembayaranTahunQuery)
            ->sum('jumlah_bayar');


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN HARI INI
        |--------------------------------------------------------------------------
        |
        | Hanya akan menghasilkan nilai jika tahun yang dipilih
        | memang merupakan tahun berjalan.
        |
        */

        $pembayaranHariIni = (float) Pembayaran::whereDate(
            'tanggal_pembayaran',
            today()
        )
            ->whereHas(
                'tagihan',
                function ($query) use ($tahun) {
                    $query->where(
                        'tahun_pajak',
                        $tahun
                    );
                }
            )
            ->sum('jumlah_bayar');


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN BULAN INI
        |--------------------------------------------------------------------------
        |
        | Menggunakan bulan sekarang tetapi tahun mengikuti
        | tahun yang sedang dipilih pada dashboard.
        |
        */

        $pembayaranBulanIni = (float) Pembayaran::whereMonth(
            'tanggal_pembayaran',
            now()->month
        )
            ->whereYear(
                'tanggal_pembayaran',
                $tahun
            )
            ->whereHas(
                'tagihan',
                function ($query) use ($tahun) {
                    $query->where(
                        'tahun_pajak',
                        $tahun
                    );
                }
            )
            ->sum('jumlah_bayar');


        /*
        |--------------------------------------------------------------------------
        | TARGET PAJAK
        |--------------------------------------------------------------------------
        */

        $targetPajaks = TargetPajak::with(
            'jenisPajak'
        )
            ->where(
                'tahun',
                $tahun
            )
            ->orderBy('id')
            ->get();

        $totalTarget = (float) $targetPajaks->sum(
            'target'
        );


        /*
        |--------------------------------------------------------------------------
        | REALISASI PEMBAYARAN PER JENIS PAJAK
        |--------------------------------------------------------------------------
        */

        $realisasiPerJenis = Pembayaran::query()
            ->selectRaw(
                'tagihans.jenis_pajak_id, SUM(pembayarans.jumlah_bayar) as total_realisasi'
            )
            ->join(
                'tagihans',
                'tagihans.id',
                '=',
                'pembayarans.tagihan_id'
            )
            ->where(
                'tagihans.tahun_pajak',
                $tahun
            )
            ->groupBy(
                'tagihans.jenis_pajak_id'
            )
            ->pluck(
                'total_realisasi',
                'jenis_pajak_id'
            );


        /*
        |--------------------------------------------------------------------------
        | TARGET VS REALISASI PER JENIS PAJAK
        |--------------------------------------------------------------------------
        */

        $targetRealisasi = $targetPajaks
            ->map(
                function ($target) use (
                    $realisasiPerJenis
                ) {

                    $targetNominal = (float) $target->target;

                    $realisasi = (float) (
                        $realisasiPerJenis[
                            $target->jenis_pajak_id
                        ] ?? 0
                    );

                    $persentase = $targetNominal > 0
                        ? (
                            $realisasi
                            /
                            $targetNominal
                        ) * 100
                        : 0;

                    return [
                        'jenis_pajak_id' =>
                            $target->jenis_pajak_id,

                        'kode' =>
                            $target->jenisPajak->kode
                            ?? '-',

                        'nama' =>
                            $target->jenisPajak->nama
                            ?? '-',

                        'target' =>
                            $targetNominal,

                        'realisasi' =>
                            $realisasi,

                        'sisa' =>
                            max(
                                $targetNominal
                                -
                                $realisasi,
                                0
                            ),

                        'persentase' =>
                            min(
                                round(
                                    $persentase,
                                    2
                                ),
                                100
                            ),
                    ];
                }
            );


        /*
        |--------------------------------------------------------------------------
        | RINGKASAN TARGET
        |--------------------------------------------------------------------------
        */

        $persentaseTarget = $totalTarget > 0
            ? round(
                (
                    $totalPembayaran
                    /
                    $totalTarget
                ) * 100,
                2
            )
            : 0;

        $sisaTarget = max(
            $totalTarget
            -
            $totalPembayaran,
            0
        );


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PEMBAYARAN 6 BULAN
        |--------------------------------------------------------------------------
        |
        | Untuk tahun berjalan:
        |   menampilkan 6 bulan terakhir sampai bulan sekarang.
        |
        | Untuk tahun sebelumnya:
        |   menampilkan 6 bulan terakhir dari tahun tersebut.
        |
        */

        $chartLabels = [];
        $chartPembayaran = [];

        if ($tahun === now()->year) {

            $bulanAkhir = now()->copy();

        } else {

            $bulanAkhir = now()
                ->copy()
                ->setYear($tahun)
                ->setMonth(12)
                ->startOfMonth();
        }

        for ($i = 5; $i >= 0; $i--) {

            $tanggal = $bulanAkhir
                ->copy()
                ->subMonths($i);

            $chartLabels[] = $tanggal
                ->translatedFormat('M Y');

            $jumlah = Pembayaran::whereMonth(
                'tanggal_pembayaran',
                $tanggal->month
            )
                ->whereYear(
                    'tanggal_pembayaran',
                    $tanggal->year
                )
                ->whereHas(
                    'tagihan',
                    function ($query) use ($tahun) {
                        $query->where(
                            'tahun_pajak',
                            $tahun
                        );
                    }
                )
                ->sum('jumlah_bayar');

            $chartPembayaran[] = (float) $jumlah;
        }


        /*
        |--------------------------------------------------------------------------
        | TAGIHAN TERBARU TAHUN TERPILIH
        |--------------------------------------------------------------------------
        */

        $recentTagihans = Tagihan::with([
            'wajibPajak',
            'jenisPajak',
            'objekPajak',
        ])
            ->where(
                'tahun_pajak',
                $tahun
            )
            ->latest()
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN TERBARU TAHUN TERPILIH
        |--------------------------------------------------------------------------
        */

        $recentPembayarans = Pembayaran::with([
            'tagihan.wajibPajak',
            'tagihan.objekPajak',
            'tagihan.jenisPajak',
            'petugas',
        ])
            ->whereHas(
                'tagihan',
                function ($query) use ($tahun) {
                    $query->where(
                        'tahun_pajak',
                        $tahun
                    );
                }
            )
            ->latest(
                'tanggal_pembayaran'
            )
            ->latest('id')
            ->limit(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TUNGGAKAN
        |--------------------------------------------------------------------------
        */

        $tunggakan = Tagihan::withSum(
            'pembayarans',
            'jumlah_bayar'
        )
            ->where(
                'tahun_pajak',
                $tahun
            )
            ->whereIn(
                'status',
                [
                    'belum_bayar',
                    'sebagian',
                    'jatuh_tempo',
                ]
            )
            ->get();

        $totalTunggakan = (float) $tunggakan->sum(
            function ($tagihan) {

                return max(
                    (float) $tagihan->total_tagihan
                    -
                    (float) (
                        $tagihan
                            ->pembayarans_sum_jumlah_bayar
                        ?? 0
                    ),
                    0
                );
            }
        );


        /*
        |--------------------------------------------------------------------------
        | TAHUN YANG TERSEDIA
        |--------------------------------------------------------------------------
        */

        $tahunTagihan = Tagihan::query()
            ->select('tahun_pajak')
            ->distinct()
            ->pluck('tahun_pajak');

        $tahunTarget = TargetPajak::query()
            ->select('tahun')
            ->distinct()
            ->pluck('tahun');

        $tahunTersedia = $tahunTagihan
            ->merge($tahunTarget)
            ->map(
                fn ($value) => (int) $value
            )
            ->unique()
            ->sortDesc()
            ->values();


        /*
        |--------------------------------------------------------------------------
        | PASTIKAN TAHUN DEFAULT TETAP TERSEDIA
        |--------------------------------------------------------------------------
        */

        if (!$tahunTersedia->contains($tahun)) {

            $tahunTersedia = $tahunTersedia
                ->prepend($tahun)
                ->unique()
                ->sortDesc()
                ->values();
        }


        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(
                'tahun',

                'totalWajibPajak',
                'wajibPajakAktif',
                'wajibPajakTidakAktif',

                'totalObjekPajak',
                'objekPajakAktif',

                'totalTagihan',
                'totalNilaiTagihan',

                'tagihanBelumBayar',
                'tagihanSebagian',
                'tagihanLunas',
                'tagihanJatuhTempo',

                'totalPembayaran',
                'pembayaranHariIni',
                'pembayaranBulanIni',

                'totalTarget',
                'persentaseTarget',
                'sisaTarget',
                'targetRealisasi',

                'chartLabels',
                'chartPembayaran',

                'recentTagihans',
                'recentPembayarans',

                'totalTunggakan',

                'tahunTersedia'
            )
        );
    }
}