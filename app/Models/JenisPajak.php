<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPajak extends Model
{
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi',
        'tarif',
        'status',
    ];

    protected $casts = [
        'tarif' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function tagihans(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }

    public function targetPajaks(): HasMany
    {
        return $this->hasMany(TargetPajak::class);
    }
}