<?php

namespace App\Http\Controllers;

use App\Models\JenisPajak;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        $search = trim((string) $request->input('search', ''));
        $tahun = $request->input('tahun');
        $jenis = $request->input('jenis');
        $status = $request->input('status');


        /*
        |--------------------------------------------------------------------------
        | QUERY DATA TUNGGAKAN
        |--------------------------------------------------------------------------
        */

        $query = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
        ])
            ->withSum('pembayarans', 'jumlah_bayar')
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ]);


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {
            $query->where(function ($q) use ($search) {

                $q->where(
                    'nomor_tagihan',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas('wajibPajak', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })

                ->orWhereHas('objekPajak', function ($q) use ($search) {
                    $q->where('nama_objek', 'like', "%{$search}%")
                        ->orWhere('alamat_objek', 'like', "%{$search}%");
                });
            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TAHUN
        |--------------------------------------------------------------------------
        */

        if ($tahun !== null && $tahun !== '') {
            $query->where('tahun_pajak', $tahun);
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS PAJAK
        |--------------------------------------------------------------------------
        */

        if ($jenis !== null && $jenis !== '') {
            $query->where('jenis_pajak_id', $jenis);
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($status !== null && $status !== '') {
            $query->where('status', $status);
        }


        /*
        |--------------------------------------------------------------------------
        | DATA TUNGGAKAN
        |--------------------------------------------------------------------------
        */

        $tunggakans = $query
            ->orderByRaw("
                CASE
                    WHEN status = 'jatuh_tempo' THEN 1
                    WHEN status = 'sebagian' THEN 2
                    WHEN status = 'belum_bayar' THEN 3
                    ELSE 4
                END
            ")
            ->orderBy('tanggal_jatuh_tempo', 'asc')
            ->paginate(10)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | QUERY STATISTIK
        |--------------------------------------------------------------------------
        */

        $statistikQuery = Tagihan::withSum(
            'pembayarans',
            'jumlah_bayar'
        )
            ->whereIn('status', [
                'belum_bayar',
                'sebagian',
                'jatuh_tempo',
            ]);


        /*
        |--------------------------------------------------------------------------
        | SEARCH STATISTIK
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {
            $statistikQuery->where(function ($q) use ($search) {

                $q->where(
                    'nomor_tagihan',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas('wajibPajak', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                })

                ->orWhereHas('objekPajak', function ($q) use ($search) {
                    $q->where('nama_objek', 'like', "%{$search}%")
                        ->orWhere('alamat_objek', 'like', "%{$search}%");
                });
            });
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TAHUN STATISTIK
        |--------------------------------------------------------------------------
        */

        if ($tahun !== null && $tahun !== '') {
            $statistikQuery->where('tahun_pajak', $tahun);
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER JENIS STATISTIK
        |--------------------------------------------------------------------------
        */

        if ($jenis !== null && $jenis !== '') {
            $statistikQuery->where('jenis_pajak_id', $jenis);
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS STATISTIK
        |--------------------------------------------------------------------------
        */

        if ($status !== null && $status !== '') {
            $statistikQuery->where('status', $status);
        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG STATISTIK
        |--------------------------------------------------------------------------
        */

        $statistikTagihans = $statistikQuery->get();


        $totalNilaiTagihan = $statistikTagihans->sum(
            fn ($tagihan) => (float) $tagihan->total_tagihan
        );


        $totalSudahDibayar = $statistikTagihans->sum(
            fn ($tagihan) => (float) (
                $tagihan->pembayarans_sum_jumlah_bayar ?? 0
            )
        );


        $totalTunggakan = max(
            $totalNilaiTagihan - $totalSudahDibayar,
            0
        );


        $jumlahTunggakan = $statistikTagihans->count();


        $jumlahJatuhTempo = $statistikTagihans
            ->where('status', 'jatuh_tempo')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | TAHUN TERSEDIA
        |--------------------------------------------------------------------------
        */

        $tahunTersedia = Tagihan::query()
            ->whereNotNull('tahun_pajak')
            ->select('tahun_pajak')
            ->distinct()
            ->orderByDesc('tahun_pajak')
            ->pluck('tahun_pajak');


        /*
        |--------------------------------------------------------------------------
        | JENIS PAJAK
        |--------------------------------------------------------------------------
        */

        $jenisPajaks = JenisPajak::query()
            ->orderBy('nama')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('tunggakan.index', compact(
            'tunggakans',
            'totalTunggakan',
            'jumlahTunggakan',
            'jumlahJatuhTempo',
            'totalNilaiTagihan',
            'totalSudahDibayar',
            'tahunTersedia',
            'jenisPajaks'
        ));
    }
}