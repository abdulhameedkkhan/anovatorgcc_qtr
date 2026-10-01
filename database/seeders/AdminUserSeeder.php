<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@anovatorgcc.com'],
            [
                'name' => 'Anovator Admin',
                'password' => 'Admin@12345',
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
