<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use App\Models\Pembayaran;
use App\Models\TargetPajak;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TargetPajakController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | TAHUN AKTIF
        |--------------------------------------------------------------------------
        */

        $tahun = (int) $request->input(
            'tahun',
            now()->year
        );


        /*
        |--------------------------------------------------------------------------
        | DATA TARGET
        |--------------------------------------------------------------------------
        */

        $targetPajaks = TargetPajak::with('jenisPajak')
            ->where('tahun', $tahun)
            ->orderByDesc('target')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | REALISASI PEMBAYARAN
        |--------------------------------------------------------------------------
        |
        | Realisasi dihitung dari pembayaran yang terhubung
        | ke tagihan pada tahun dan jenis pajak yang sama.
        |
        */

        $realisasi = Pembayaran::query()
            ->join(
                'tagihans',
                'pembayarans.tagihan_id',
                '=',
                'tagihans.id'
            )
            ->where(
                'tagihans.tahun_pajak',
                $tahun
            )
            ->selectRaw(
                'tagihans.jenis_pajak_id, SUM(pembayarans.jumlah_bayar) as total_realisasi'
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
        | HITUNG REALISASI SETIAP TARGET
        |--------------------------------------------------------------------------
        */

        $targetPajaks->each(function ($target) use ($realisasi) {

            $targetValue = (float) $target->target;

            $realisasiValue = (float) (
                $realisasi[$target->jenis_pajak_id]
                ?? 0
            );

            $sisaValue = max(
                $targetValue - $realisasiValue,
                0
            );

            $persentase = $targetValue > 0
                ? ($realisasiValue / $targetValue) * 100
                : 0;

            $target->setAttribute(
                'realisasi',
                $realisasiValue
            );

            $target->setAttribute(
                'sisa',
                $sisaValue
            );

            $target->setAttribute(
                'persentase',
                min($persentase, 100)
            );

            $target->setAttribute(
                'persentase_asli',
                $persentase
            );
        });


        /*
        |--------------------------------------------------------------------------
        | TOTAL TARGET
        |--------------------------------------------------------------------------
        */

        $totalTarget = $targetPajaks->sum(
            fn ($target) =>
                (float) $target->target
        );


        /*
        |--------------------------------------------------------------------------
        | TOTAL REALISASI
        |--------------------------------------------------------------------------
        */

        $totalRealisasi = $targetPajaks->sum(
            fn ($target) =>
                (float) $target->realisasi
        );


        /*
        |--------------------------------------------------------------------------
        | TOTAL SISA
        |--------------------------------------------------------------------------
        */

        $totalSisa = max(
            $totalTarget - $totalRealisasi,
            0
        );


        /*
        |--------------------------------------------------------------------------
        | PERSENTASE TOTAL
        |--------------------------------------------------------------------------
        */

        $persentaseTotal = $totalTarget > 0
            ? ($totalRealisasi / $totalTarget) * 100
            : 0;


        /*
        |--------------------------------------------------------------------------
        | JUMLAH JENIS PAJAK
        |--------------------------------------------------------------------------
        */

        $jumlahTarget = $targetPajaks->count();


        /*
        |--------------------------------------------------------------------------
        | TARGET TERCAPAI
        |--------------------------------------------------------------------------
        */

        $jumlahTercapai = $targetPajaks->filter(
            fn ($target) =>
                (float) $target->realisasi >=
                (float) $target->target
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TAHUN TERSEDIA
        |--------------------------------------------------------------------------
        */

        $tahunTersedia = TargetPajak::query()
            ->select('tahun')
            ->distinct()
            ->orderByDesc('tahun')
            ->pluck('tahun');


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'target-pajak.index',
            compact(
                'targetPajaks',
                'tahun',
                'totalTarget',
                'totalRealisasi',
                'totalSisa',
                'persentaseTotal',
                'jumlahTarget',
                'jumlahTercapai',
                'tahunTersedia'
            )
        );
    }


    public function create()
    {
        $jenisPajaks = JenisPajak::where(
            'status',
            true
        )
            ->orderBy('nama')
            ->get();

        return view(
            'target-pajak.create',
            compact('jenisPajaks')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_pajak_id' => [
                'required',
                'exists:jenis_pajaks,id',

                Rule::unique(
                    'target_pajaks',
                    'jenis_pajak_id'
                )->where(function ($query) use ($request) {

                    return $query->where(
                        'tahun',
                        $request->tahun
                    );
                }),
            ],

            'tahun' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',
            ],

            'target' => [
                'required',
                'numeric',
                'min:0',
            ],

            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        TargetPajak::create($validated);

        return redirect()
            ->route('target-pajak.index', [
                'tahun' => $validated['tahun'],
            ])
            ->with(
                'success',
                'Target pajak berhasil ditambahkan.'
            );
    }


    public function show(TargetPajak $targetPajak)
    {
        $targetPajak->load(
            'jenisPajak'
        );

        /*
        |--------------------------------------------------------------------------
        | REALISASI DETAIL
        |--------------------------------------------------------------------------
        */

        $realisasi = Pembayaran::query()
            ->join(
                'tagihans',
                'pembayarans.tagihan_id',
                '=',
                'tagihans.id'
            )
            ->where(
                'tagihans.tahun_pajak',
                $targetPajak->tahun
            )
            ->where(
                'tagihans.jenis_pajak_id',
                $targetPajak->jenis_pajak_id
            )
            ->sum(
                'pembayarans.jumlah_bayar'
            );


        $target = (float) $targetPajak->target;

        $realisasi = (float) $realisasi;

        $sisa = max(
            $target - $realisasi,
            0
        );

        $persentase = $target > 0
            ? ($realisasi / $target) * 100
            : 0;


        $targetPajak->setAttribute(
            'realisasi',
            $realisasi
        );

        $targetPajak->setAttribute(
            'sisa',
            $sisa
        );

        $targetPajak->setAttribute(
            'persentase',
            min($persentase, 100)
        );

        $targetPajak->setAttribute(
            'persentase_asli',
            $persentase
        );


        return view(
            'target-pajak.show',
            compact('targetPajak')
        );
    }


    public function edit(TargetPajak $targetPajak)
    {
        $jenisPajaks = JenisPajak::where(
            'status',
            true
        )
            ->orderBy('nama')
            ->get();

        return view(
            'target-pajak.edit',
            compact(
                'targetPajak',
                'jenisPajaks'
            )
        );
    }


    public function update(
        Request $request,
        TargetPajak $targetPajak
    ) {
        $validated = $request->validate([
            'jenis_pajak_id' => [
                'required',
                'exists:jenis_pajaks,id',

                Rule::unique(
                    'target_pajaks',
                    'jenis_pajak_id'
                )
                    ->ignore($targetPajak->id)
                    ->where(function ($query) use ($request) {

                        return $query->where(
                            'tahun',
                            $request->tahun
                        );
                    }),
            ],

            'tahun' => [
                'required',
                'integer',
                'min:2000',
                'max:2100',
            ],

            'target' => [
                'required',
                'numeric',
                'min:0',
            ],

            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        $targetPajak->update($validated);

        return redirect()
            ->route('target-pajak.index', [
                'tahun' => $validated['tahun'],
            ])
            ->with(
                'success',
                'Target pajak berhasil diperbarui.'
            );
    }


    public function destroy(
        TargetPajak $targetPajak
    ) {
        $tahun = $targetPajak->tahun;

        $targetPajak->delete();

        return redirect()
            ->route('target-pajak.index', [
                'tahun' => $tahun,
            ])
            ->with(
                'success',
                'Target pajak berhasil dihapus.'
            );
    }
}