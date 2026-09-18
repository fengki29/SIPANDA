<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WajibPajak extends Model
{
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'no_hp',
        'jenis_wp',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function objekPajaks(): HasMany
    {
        return $this->hasMany(ObjekPajak::class);
    }

    public function tagihans(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }
}