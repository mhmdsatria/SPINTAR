<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada super admin dengan email ini
        $existing = User::where('email', 'superadmin@example.com')->first();

        if (!$existing) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('asd123'), // Ganti dengan password yang kuat
                'role' => 'super_admin',
            ]);

            $this->command->info('✅ Super Admin berhasil dibuat.');
        } else {
            $this->command->info('ℹ️ Super Admin sudah ada, tidak dibuat ulang.');
        }
    }
}
