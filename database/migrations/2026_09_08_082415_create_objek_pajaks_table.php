<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('objek_pajaks', function (Blueprint $table) {
        $table->id();

        $table->foreignId('wajib_pajak_id')
            ->constrained('wajib_pajaks')
            ->cascadeOnDelete();

        $table->string('nama_objek');
        $table->text('alamat_objek');
        $table->string('jenis_objek');
        $table->decimal('nilai_objek', 15, 2)->nullable();
        $table->boolean('status')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objek_pajaks');
    }
};
