<?php

namespace App\Providers;

use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\TargetPajak;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $tahun = now()->year;
            $hariIni = Carbon::today();
            $batasTujuhHari = Carbon::today()->addDays(7);

            $tagihansBelumLunas = Tagihan::query()
                ->withSum('pembayarans', 'jumlah_bayar')
                ->where('tahun_pajak', $tahun)
                ->where('status', '!=', 'lunas')
                ->get();

            $jumlahJatuhTempo = $tagihansBelumLunas
                ->filter(function ($tagihan) use ($hariIni) {
                    if (!$tagihan->tanggal_jatuh_tempo) {
                        return false;
                    }

                    return Carbon::parse($tagihan->tanggal_jatuh_tempo)
                        ->lt($hariIni);
                })
                ->count();

            $jumlahSegeraJatuhTempo = $tagihansBelumLunas
                ->filter(function ($tagihan) use ($hariIni, $batasTujuhHari) {
                    if (!$tagihan->tanggal_jatuh_tempo) {
                        return false;
                    }

                    $tanggal = Carbon::parse($tagihan->tanggal_jatuh_tempo);

                    return $tanggal->betweenIncluded(
                        $hariIni,
                        $batasTujuhHari
                    );
                })
                ->count();

            $realisasiPerJenis = Pembayaran::query()
                ->join(
                    'tagihans',
                    'tagihans.id',
                    '=',
                    'pembayarans.tagihan_id'
                )
                ->where('tagihans.tahun_pajak', $tahun)
                ->selectRaw(
                    'tagihans.jenis_pajak_id, SUM(pembayarans.jumlah_bayar) AS total_realisasi'
                )
                ->groupBy('tagihans.jenis_pajak_id')
                ->pluck('total_realisasi', 'tagihans.jenis_pajak_id');

            $jumlahTargetRendah = TargetPajak::query()
                ->where('tahun', $tahun)
                ->get()
                ->filter(function ($target) use ($realisasiPerJenis) {
                    $realisasi = (float) ($realisasiPerJenis[$target->jenis_pajak_id] ?? 0);
                    $nilaiTarget = (float) $target->target;

                    if ($nilaiTarget <= 0) {
                        return false;
                    }

                    return (($realisasi / $nilaiTarget) * 100) < 50;
                })
                ->count();

            $jumlahNotifikasi =
                $jumlahJatuhTempo
                + $jumlahSegeraJatuhTempo
                + $jumlahTargetRendah;

            $view->with('jumlahNotifikasi', $jumlahNotifikasi);
        });
    }
}
