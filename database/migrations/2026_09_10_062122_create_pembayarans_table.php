<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tagihan_id')
                ->constrained('tagihans')
                ->cascadeOnDelete();

            $table->string('nomor_pembayaran')->unique();

            $table->date('tanggal_pembayaran');

            $table->decimal('jumlah_bayar', 15, 2);

            $table->enum('metode_pembayaran', [
                'tunai',
                'transfer',
                'qris',
                'lainnya',
            ])->default('tunai');

            $table->string('keterangan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};