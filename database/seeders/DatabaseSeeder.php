<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Idempotent: aman dijalankan ulang (mis. php artisan db:seed setelah
     * migrate:fresh --seed) — user yang sudah ada tidak dibuat duplikat
     * dan tidak diubah.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (User::where('email', 'test@example.com')->doesntExist()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    }
}
