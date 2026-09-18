<?php

namespace App\Console\Commands;

use App\Services\TagihanStatusService;
use Illuminate\Console\Command;

class UpdateTagihanStatus extends Command
{
    /**
     * Nama dan signature command.
     */
    protected $signature = 'tagihan:update-status';

    /**
     * Deskripsi command.
     */
    protected $description = 'Memperbarui status seluruh tagihan berdasarkan pembayaran dan tanggal jatuh tempo';

    /**
     * Jalankan command.
     */
    public function handle(TagihanStatusService $statusService): int
    {
        $this->info('Memperbarui status tagihan...');

        $jumlahDiubah = $statusService->updateSemua();

        $this->newLine();

        $this->info(
            "Selesai. {$jumlahDiubah} status tagihan diperbarui."
        );

        return self::SUCCESS;
    }
}