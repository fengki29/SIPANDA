<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TargetPajak extends Model
{
    protected $fillable = [
        'jenis_pajak_id',
        'tahun',
        'target',
        'keterangan',
    ];

    protected $casts = [
        'tahun' => 'integer',
        'target' => 'decimal:2',
    ];

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class);
    }
}