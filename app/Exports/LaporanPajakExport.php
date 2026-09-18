<?php

namespace App\Exports;

use App\Models\JenisPajak;
use App\Models\Pembayaran;
use App\Models\Tagihan;
use App\Models\TargetPajak;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanPajakExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected $tahun;
    protected $jenis;
    protected $status;

    public function __construct(
        $tahun = null,
        $jenis = null,
        $status = null
    ) {
        $this->tahun = $tahun;
        $this->jenis = $jenis;
        $this->status = $status;
    }


    // =========================
    // COLLECTION
    // =========================

    public function collection(): Collection
    {
        $query = Tagihan::with([
            'wajibPajak',
            'objekPajak',
            'jenisPajak',
            'pembayarans',
        ]);

        if ($this->tahun) {
            $query->where(
                'tahun_pajak',
                $this->tahun
            );
        }

        if ($this->jenis) {
            $query->where(
                'jenis_pajak_id',
                $this->jenis
            );
        }

        if ($this->status) {
            $query->where(
                'status',
                $this->status
            );
        }

        return $query
            ->latest()
            ->get();
    }


    // =========================
    // HEADER EXCEL
    // =========================

    public function headings(): array
    {
        return [
            'No',
            'Nomor Tagihan',
            'Tahun Pajak',
            'NIK',
            'Nama Wajib Pajak',
            'Alamat Wajib Pajak',
            'Objek Pajak',
            'Alamat Objek',
            'Jenis Pajak',
            'Tarif (%)',
            'Pokok Pajak',
            'Denda',
            'Total Tagihan',
            'Total Dibayar',
            'Sisa Tagihan',
            'Jatuh Tempo',
            'Status',
        ];
    }


    // =========================
    // MAPPING DATA
    // =========================

    public function map($tagihan): array
    {
        $totalDibayar = (float) $tagihan
            ->pembayarans
            ->sum('jumlah_bayar');

        $totalTagihan = (float) $tagihan
            ->total_tagihan;

        $sisaTagihan = max(
            0,
            $totalTagihan - $totalDibayar
        );

        return [
            $tagihan->id,

            $tagihan->nomor_tagihan,

            $tagihan->tahun_pajak,

            $tagihan->wajibPajak?->nik,

            $tagihan->wajibPajak?->nama,

            $tagihan->wajibPajak?->alamat,

            $tagihan->objekPajak?->nama_objek,

            $tagihan->objekPajak?->alamat_objek,

            $tagihan->jenisPajak?->nama,

            (float) (
                $tagihan->jenisPajak?->tarif ?? 0
            ),

            (float) $tagihan->pokok_pajak,

            (float) $tagihan->denda,

            $totalTagihan,

            $totalDibayar,

            $sisaTagihan,

            optional(
                $tagihan->tanggal_jatuh_tempo
            )->format('d-m-Y'),

            match ($tagihan->status) {

                'belum_bayar' =>
                    'Belum Bayar',

                'sebagian' =>
                    'Sebagian',

                'lunas' =>
                    'Lunas',

                'jatuh_tempo' =>
                    'Jatuh Tempo',

                default =>
                    $tagihan->status,
            },
        ];
    }
}