<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Konselor;
use App\Models\User;

class KonselorSeeder extends Seeder
{
    public function run(): void
    {
        $userKonselor = User::where('role', 'konselor')->first();

        Konselor::create([
            'id_user' => $userKonselor->id,
            'nip'     => '20444',
            'nama'    => 'Intan Saraswati, S.Pd',
        ]);
    }
}
