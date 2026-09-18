<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembayaran extends Model
{
    protected $fillable = [
        'tagihan_id',
        'petugas_id',
        'nomor_pembayaran',
        'tanggal_pembayaran',
        'jumlah_bayar',
        'metode_pembayaran',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'date',
        'jumlah_bayar' => 'decimal:2',
    ];

    public function tagihan(): BelongsTo
    {
        return $this->belongsTo(Tagihan::class);
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'petugas_id'
        );
    }
}