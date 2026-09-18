<?php

namespace App\Services;

use App\Models\Tagihan;
use Carbon\Carbon;

class TagihanStatusService
{
    /**
     * Menentukan status tagihan berdasarkan:
     *
     * 1. Total tagihan
     * 2. Total pembayaran
     * 3. Tanggal jatuh tempo
     *
     * Prioritas status:
     * LUNAS
     * ↓
     * JATUH TEMPO
     * ↓
     * SEBAGIAN
     * ↓
     * BELUM BAYAR
     */
    public function tentukanStatus(Tagihan $tagihan): string
    {
        $totalTagihan = (float) $tagihan->total_tagihan;

        $totalDibayar = (float) $tagihan
            ->pembayarans()
            ->sum('jumlah_bayar');

        /*
        |--------------------------------------------------------------------------
        | LUNAS
        |--------------------------------------------------------------------------
        |
        | Jika pembayaran sudah sama atau lebih besar
        | dari total tagihan.
        |
        */

        if ($totalDibayar >= $totalTagihan) {
            return 'lunas';
        }

        /*
        |--------------------------------------------------------------------------
        | CEK JATUH TEMPO
        |--------------------------------------------------------------------------
        |
        | Tagihan yang belum lunas dan tanggal jatuh temponya
        | sudah lewat akan berstatus jatuh_tempo.
        |
        */

        if ($tagihan->tanggal_jatuh_tempo) {
            $tanggalJatuhTempo = Carbon::parse(
                $tagihan->tanggal_jatuh_tempo
            );

            if ($tanggalJatuhTempo->isBefore(Carbon::today())) {
                return 'jatuh_tempo';
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SEBAGIAN
        |--------------------------------------------------------------------------
        |
        | Sudah ada pembayaran tetapi belum mencapai
        | total tagihan.
        |
        */

        if ($totalDibayar > 0) {
            return 'sebagian';
        }

        /*
        |--------------------------------------------------------------------------
        | BELUM BAYAR
        |--------------------------------------------------------------------------
        */

        return 'belum_bayar';
    }

    /**
     * Menghitung dan memperbarui status satu tagihan.
     *
     * Return:
     * - Status baru
     */
    public function update(Tagihan $tagihan): string
    {
        $statusBaru = $this->tentukanStatus($tagihan);

        if ($tagihan->status !== $statusBaru) {
            $tagihan->update([
                'status' => $statusBaru,
            ]);
        }

        return $statusBaru;
    }

    /**
     * Memperbarui status seluruh tagihan.
     *
     * Digunakan untuk sinkronisasi status secara massal.
     *
     * Return:
     * jumlah tagihan yang statusnya berubah.
     */
    public function updateSemua(): int
    {
        $jumlahDiubah = 0;

        Tagihan::query()
            ->select('id')
            ->chunkById(100, function ($tagihanIds) use (&$jumlahDiubah) {

                $tagihans = Tagihan::query()
                    ->whereIn(
                        'id',
                        $tagihanIds->pluck('id')
                    )
                    ->get();

                foreach ($tagihans as $tagihan) {

                    $statusLama = $tagihan->status;

                    $statusBaru = $this->tentukanStatus(
                        $tagihan
                    );

                    if ($statusLama !== $statusBaru) {

                        $tagihan->update([
                            'status' => $statusBaru,
                        ]);

                        $jumlahDiubah++;
                    }
                }
            });

        return $jumlahDiubah;
    }
}