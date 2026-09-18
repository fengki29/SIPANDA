<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'fengkiadmin@gmail.com',
            ],
            [
                'name' => 'Fengki Admin',
                'password' => Hash::make('fengki29'),
                'role' => 'admin',
            ]
        );
    }
}