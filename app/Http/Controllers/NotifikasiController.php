<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\TargetPajak;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index(Request $request)
    {
        $tahun = (int) $request->input(
            'tahun',
            now()->year
        );

        $hariIni = Carbon::today();
        $batasTujuhHari = Carbon::today()->addDays(7);

        /*
        |--------------------------------------------------------------------------
        | TAGIHAN BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $tagihansBelumLunas = Tagihan::with([
            'wajibPajak',
            'jenisPajak',
        ])
            ->withSum(
                'pembayarans',
                'jumlah_bayar'
            )
            ->where('tahun_pajak', $tahun)
            ->where('status', '!=', 'lunas')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | HITUNG SISA TAGIHAN
        |--------------------------------------------------------------------------
        */

        $hitungSisa = function ($tagihan) {

            $totalTagihan = (float) $tagihan->total_tagihan;

            $totalDibayar = (float) (
                $tagihan->pembayarans_sum_jumlah_bayar ?? 0
            );

            return max(
                $totalTagihan - $totalDibayar,
                0
            );
        };

        /*
        |--------------------------------------------------------------------------
        | 1. TAGIHAN JATUH TEMPO
        |--------------------------------------------------------------------------
        */

        $tagihanJatuhTempo = $tagihansBelumLunas
            ->filter(function ($tagihan) use ($hariIni) {

                return $tagihan->tanggal_jatuh_tempo
                    && Carbon::parse(
                        $tagihan->tanggal_jatuh_tempo
                    )->lt($hariIni);
            })
            ->sortByDesc(function ($tagihan) use ($hitungSisa) {
                return $hitungSisa($tagihan);
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | 2. TAGIHAN SEGERA JATUH TEMPO
        |--------------------------------------------------------------------------
        */

        $tagihanSegeraJatuhTempo = $tagihansBelumLunas
            ->filter(function ($tagihan) use (
                $hariIni,
                $batasTujuhHari
            ) {

                if (!$tagihan->tanggal_jatuh_tempo) {
                    return false;
                }

                $tanggal = Carbon::parse(
                    $tagihan->tanggal_jatuh_tempo
                );

                return $tanggal->betweenIncluded(
                    $hariIni,
                    $batasTujuhHari
                );
            })
            ->sortBy('tanggal_jatuh_tempo')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | 3. TUNGGAKAN TERBESAR
        |--------------------------------------------------------------------------
        */

        $tunggakanTerbesar = $tagihansBelumLunas
            ->map(function ($tagihan) use ($hitungSisa) {

                $tagihan->sisa_pembayaran =
                    $hitungSisa($tagihan);

                return $tagihan;
            })
            ->filter(function ($tagihan) {
                return $tagihan->sisa_pembayaran > 0;
            })
            ->sortByDesc('sisa_pembayaran')
            ->take(5)
            ->values();

        /*
        |--------------------------------------------------------------------------
        | 4. TARGET PAJAK
        |--------------------------------------------------------------------------
        */

        $targetPajaks = TargetPajak::with('jenisPajak')
            ->where('tahun', $tahun)
            ->get();

        $realisasiPerJenis = Pembayaran::query()
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
            ->selectRaw(
                'tagihans.jenis_pajak_id, SUM(pembayarans.jumlah_bayar) AS total_realisasi'
            )
            ->groupBy(
                'tagihans.jenis_pajak_id'
            )
            ->pluck(
                'total_realisasi',
                'tagihans.jenis_pajak_id'
            );

        $targetRendah = $targetPajaks
            ->map(function ($target) use ($realisasiPerJenis) {

                $realisasi = (float) (
                    $realisasiPerJenis[
                        $target->jenis_pajak_id
                    ] ?? 0
                );

                $nilaiTarget = (float) $target->target;

                $persentase = $nilaiTarget > 0
                    ? ($realisasi / $nilaiTarget) * 100
                    : 0;

                $target->realisasi =
                    $realisasi;

                $target->persentase_realisasi =
                    $persentase;

                return $target;
            })
            ->filter(function ($target) {

                return $target->target > 0
                    && $target->persentase_realisasi < 50;
            })
            ->sortBy('persentase_realisasi')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | STATISTIK NOTIFIKASI
        |--------------------------------------------------------------------------
        */

        $jumlahJatuhTempo =
            $tagihanJatuhTempo->count();

        $jumlahSegeraJatuhTempo =
            $tagihanSegeraJatuhTempo->count();

        $jumlahTunggakanBesar =
            $tunggakanTerbesar->count();

        $jumlahTargetRendah =
            $targetRendah->count();

        $totalNotifikasi =
            $jumlahJatuhTempo
            + $jumlahSegeraJatuhTempo
            + $jumlahTargetRendah;

        /*
        |--------------------------------------------------------------------------
        | TAHUN TERSEDIA
        |--------------------------------------------------------------------------
        */

        $tahunTersedia = Tagihan::query()
            ->select('tahun_pajak')
            ->whereNotNull('tahun_pajak')
            ->distinct()
            ->orderByDesc('tahun_pajak')
            ->pluck('tahun_pajak');

        return view(
            'notifikasi.index',
            compact(
                'tahun',
                'tahunTersedia',
                'totalNotifikasi',
                'jumlahJatuhTempo',
                'jumlahSegeraJatuhTempo',
                'jumlahTunggakanBesar',
                'jumlahTargetRendah',
                'tagihanJatuhTempo',
                'tagihanSegeraJatuhTempo',
                'tunggakanTerbesar',
                'targetRendah'
            )
        );
    }
}