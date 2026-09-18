<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wajib_pajak_id')
                ->constrained('wajib_pajaks')
                ->cascadeOnDelete();

            $table->foreignId('objek_pajak_id')
                ->constrained('objek_pajaks')
                ->cascadeOnDelete();

            $table->foreignId('jenis_pajak_id')
                ->constrained('jenis_pajaks')
                ->cascadeOnDelete();

            $table->year('tahun_pajak');

            $table->string('nomor_tagihan')->unique();

            $table->decimal('pokok_pajak', 15, 2);

            $table->decimal('denda', 15, 2)->default(0);

            $table->decimal('total_tagihan', 15, 2);

            $table->date('tanggal_jatuh_tempo');

            $table->enum('status', [
                'belum_bayar',
                'sebagian',
                'lunas',
                'jatuh_tempo',
            ])->default('belum_bayar');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};