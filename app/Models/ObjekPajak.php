<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjekPajak extends Model
{
    protected $fillable = [
        'wajib_pajak_id',
        'nama_objek',
        'alamat_objek',
        'jenis_objek',
        'nilai_objek',
        'status',
    ];

    protected $casts = [
        'nilai_objek' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function wajibPajak(): BelongsTo
    {
        return $this->belongsTo(WajibPajak::class);
    }

    public function tagihans(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }
}