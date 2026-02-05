<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => '23999', // NIS
            'password' => Hash::make('12345678'),
            'role'     => 'siswa',
        ]);

        User::create([
            'username' => '20444', // NIP
            'password' => Hash::make('87654321'),
            'role'     => 'konselor',
        ]);
    }
}
