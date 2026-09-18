<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('target_pajaks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jenis_pajak_id')
                ->constrained('jenis_pajaks')
                ->cascadeOnDelete();

            $table->year('tahun');

            $table->decimal('target', 15, 2);

            $table->text('keterangan')->nullable();

            $table->timestamps();

            $table->unique([
                'jenis_pajak_id',
                'tahun',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('target_pajaks');
    }
};