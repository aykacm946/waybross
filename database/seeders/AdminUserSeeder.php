<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@tanitimsitesi.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Admin kullanıcısı oluşturuldu!');
        $this->command->info('E-posta: admin@tanitimsitesi.com');
        $this->command->info('Şifre: admin123');
    }
}
