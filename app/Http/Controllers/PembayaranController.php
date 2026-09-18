<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Services\TagihanStatusService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar pembayaran.
     */
    public function index(Request $request)
    {
        $query = Pembayaran::with([
            'tagihan.wajibPajak',
            'tagihan.objekPajak',
            'tagihan.jenisPajak',
            'petugas',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Bisa mencari berdasarkan:
        | - Nomor pembayaran
        | - Nomor tagihan
        | - Nama wajib pajak
        | - NIK wajib pajak
        |
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'nomor_pembayaran',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas(
                    'tagihan',
                    function ($tagihanQuery) use ($search) {

                        $tagihanQuery
                            ->where(
                                'nomor_tagihan',
                                'like',
                                "%{$search}%"
                            )

                            ->orWhereHas(
                                'wajibPajak',
                                function ($wajibPajakQuery) use ($search) {

                                    $wajibPajakQuery
                                        ->where(
                                            'nama',
                                            'like',
                                            "%{$search}%"
                                        )
                                        ->orWhere(
                                            'nik',
                                            'like',
                                            "%{$search}%"
                                        );
                                }
                            );
                    }
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER TAHUN PAJAK
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tahun_pajak')) {
            $query->whereHas(
                'tagihan',
                function ($tagihanQuery) use ($request) {
                    $tagihanQuery->where(
                        'tahun_pajak',
                        $request->tahun_pajak
                    );
                }
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER METODE PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('metode_pembayaran')) {
            $query->where(
                'metode_pembayaran',
                $request->metode_pembayaran
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS TAGIHAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->whereHas(
                'tagihan',
                function ($tagihanQuery) use ($request) {
                    $tagihanQuery->where(
                        'status',
                        $request->status
                    );
                }
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal_pembayaran',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate(
                'tanggal_pembayaran',
                '<=',
                $request->tanggal_selesai
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $pembayarans = $query
            ->latest('tanggal_pembayaran')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | DATA DROPDOWN TAHUN
        |--------------------------------------------------------------------------
        */

        $tahunPajaks = Tagihan::query()
            ->select('tahun_pajak')
            ->whereNotNull('tahun_pajak')
            ->distinct()
            ->orderByDesc('tahun_pajak')
            ->pluck('tahun_pajak');

        /*
        |--------------------------------------------------------------------------
        | STATISTIK PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $totalPembayaran = Pembayaran::count();

        $totalNominal = Pembayaran::sum(
            'jumlah_bayar'
        );

        /*
        |--------------------------------------------------------------------------
        | STATISTIK METODE
        |--------------------------------------------------------------------------
        */

        $jumlahTunai = Pembayaran::where(
            'metode_pembayaran',
            'tunai'
        )->count();

        $jumlahTransfer = Pembayaran::where(
            'metode_pembayaran',
            'transfer'
        )->count();

        $jumlahQris = Pembayaran::where(
            'metode_pembayaran',
            'qris'
        )->count();

        $jumlahLainnya = Pembayaran::where(
            'metode_pembayaran',
            'lainnya'
        )->count();

        return view(
            'pembayaran.index',
            compact(
                'pembayarans',
                'tahunPajaks',
                'totalPembayaran',
                'totalNominal',
                'jumlahTunai',
                'jumlahTransfer',
                'jumlahQris',
                'jumlahLainnya'
            )
        );
    }

    public function create()
    {
        $tagihans = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
        ])
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ])
            ->orderBy('tanggal_jatuh_tempo')
            ->orderBy('id')
            ->get();

        return view(
            'pembayaran.create',
            compact('tagihans')
        );
    }

    public function store(
        Request $request,
        TagihanStatusService $statusService
    ) {
        $validated = $request->validate([
            'tagihan_id' => [
                'required',
                'exists:tagihans,id',
            ],

            'nomor_pembayaran' => [
                'required',
                'string',
                'max:255',
                'unique:pembayarans,nomor_pembayaran',
            ],

            'tanggal_pembayaran' => [
                'required',
                'date',
            ],

            'jumlah_bayar' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'metode_pembayaran' => [
                'required',
                'in:tunai,transfer,qris,lainnya',
            ],

            'keterangan' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $tagihan = Tagihan::findOrFail(
            $validated['tagihan_id']
        );

        $totalSudahDibayar = $tagihan
            ->pembayarans()
            ->sum('jumlah_bayar');

        $sisaTagihan =
            (float) $tagihan->total_tagihan
            -
            (float) $totalSudahDibayar;

        if (
            (float) $validated['jumlah_bayar']
            >
            $sisaTagihan
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah_bayar' =>
                        'Jumlah pembayaran melebihi sisa tagihan. '
                        . 'Sisa tagihan saat ini adalah Rp '
                        . number_format(
                            max($sisaTagihan, 0),
                            0,
                            ',',
                            '.'
                        )
                        . '.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | PETUGAS YANG LOGIN
        |--------------------------------------------------------------------------
        */

        $validated['petugas_id'] = auth()->id();

        $pembayaran = Pembayaran::create(
            $validated
        );

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS TAGIHAN
        |--------------------------------------------------------------------------
        */

        $statusService->update(
            $tagihan->fresh()
        );

        return redirect()
            ->route(
                'pembayaran.print',
                $pembayaran
            )
            ->with(
                'success',
                'Pembayaran berhasil dicatat.'
            );
    }

    public function show(Pembayaran $pembayaran)
    {
        $pembayaran->load([
            'tagihan.wajibPajak',
            'tagihan.objekPajak',
            'tagihan.jenisPajak',
            'petugas',
        ]);

        return view(
            'pembayaran.show',
            compact('pembayaran')
        );
    }

    public function print(Pembayaran $pembayaran)
    {
        $pembayaran->load([
            'tagihan.wajibPajak',
            'tagihan.objekPajak',
            'tagihan.jenisPajak',
            'tagihan.pembayarans',
            'petugas',
        ]);

        $totalSudahDibayar = (float) $pembayaran
            ->tagihan
            ->pembayarans
            ->sum('jumlah_bayar');

        $sisaTagihan = max(
            (float) $pembayaran->tagihan->total_tagihan
            -
            $totalSudahDibayar,
            0
        );

        return view(
            'pembayaran.print',
            compact(
                'pembayaran',
                'totalSudahDibayar',
                'sisaTagihan'
            )
        );
    }

    public function edit(Pembayaran $pembayaran)
    {
        $tagihans = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
        ])
            ->where(function ($query) use ($pembayaran) {

                $query
                    ->whereIn('status', [
                        'belum_bayar',
                        'sebagian',
                        'jatuh_tempo',
                    ])
                    ->orWhere(
                        'id',
                        $pembayaran->tagihan_id
                    );
            })
            ->orderBy('tanggal_jatuh_tempo')
            ->orderBy('id')
            ->get();

        return view(
            'pembayaran.edit',
            compact(
                'pembayaran',
                'tagihans'
            )
        );
    }

    public function update(
        Request $request,
        Pembayaran $pembayaran,
        TagihanStatusService $statusService
    ) {
        $validated = $request->validate([
            'tagihan_id' => [
                'required',
                'exists:tagihans,id',
            ],

            'nomor_pembayaran' => [
                'required',
                'string',
                'max:255',
                'unique:pembayarans,nomor_pembayaran,'
                    . $pembayaran->id,
            ],

            'tanggal_pembayaran' => [
                'required',
                'date',
            ],

            'jumlah_bayar' => [
                'required',
                'numeric',
                'min:0.01',
            ],

            'metode_pembayaran' => [
                'required',
                'in:tunai,transfer,qris,lainnya',
            ],

            'keterangan' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);

        $tagihanLamaId =
            $pembayaran->tagihan_id;

        $tagihanBaru = Tagihan::findOrFail(
            $validated['tagihan_id']
        );

        $totalPembayaranLain = $tagihanBaru
            ->pembayarans()
            ->where(
                'id',
                '!=',
                $pembayaran->id
            )
            ->sum('jumlah_bayar');

        $sisaTagihan =
            (float) $tagihanBaru->total_tagihan
            -
            (float) $totalPembayaranLain;

        if (
            (float) $validated['jumlah_bayar']
            >
            $sisaTagihan
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'jumlah_bayar' =>
                        'Jumlah pembayaran melebihi sisa tagihan. '
                        . 'Sisa tagihan yang tersedia adalah Rp '
                        . number_format(
                            max($sisaTagihan, 0),
                            0,
                            ',',
                            '.'
                        )
                        . '.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | PETUGAS TIDAK DIUBAH SAAT EDIT
        |--------------------------------------------------------------------------
        */

        $pembayaran->update(
            $validated
        );

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS TAGIHAN LAMA
        |--------------------------------------------------------------------------
        */

        if (
            $tagihanLamaId
            !=
            $validated['tagihan_id']
        ) {
            $tagihanLama =
                Tagihan::find($tagihanLamaId);

            if ($tagihanLama) {
                $statusService->update(
                    $tagihanLama->fresh()
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS TAGIHAN BARU
        |--------------------------------------------------------------------------
        */

        $statusService->update(
            $tagihanBaru->fresh()
        );

        return redirect()
            ->route('pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil diperbarui.'
            );
    }

    public function destroy(
        Pembayaran $pembayaran,
        TagihanStatusService $statusService
    ) {
        $tagihan =
            $pembayaran->tagihan;

        $pembayaran->delete();

        if ($tagihan) {
            $statusService->update(
                $tagihan->fresh()
            );
        }

        return redirect()
            ->route('pembayaran.index')
            ->with(
                'success',
                'Pembayaran berhasil dihapus.'
            );
    }
}