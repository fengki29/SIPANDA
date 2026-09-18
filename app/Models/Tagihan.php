<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tagihan extends Model
{
    protected $fillable = [
        'wajib_pajak_id',
        'objek_pajak_id',
        'jenis_pajak_id',
        'tahun_pajak',
        'nomor_tagihan',
        'pokok_pajak',
        'denda',
        'total_tagihan',
        'tanggal_jatuh_tempo',
        'status',
    ];

    protected $casts = [
        'tahun_pajak' => 'integer',
        'pokok_pajak' => 'decimal:2',
        'denda' => 'decimal:2',
        'total_tagihan' => 'decimal:2',
        'tanggal_jatuh_tempo' => 'date',
    ];

    public function wajibPajak(): BelongsTo
    {
        return $this->belongsTo(WajibPajak::class);
    }

    public function objekPajak(): BelongsTo
    {
        return $this->belongsTo(ObjekPajak::class);
    }

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class);
    }

    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}