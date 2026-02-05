<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\User;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $userSiswa = User::where('role', 'siswa')->first();

        User::create([
            'id_user' => $userSiswa->id,
            'nis'     => '23999',
            'nama'    => 'Berta Yuanita',
            'kelas'   => 'XII-RPA',
            'jurusan'   => 'Rekayasa Perangkat Lunak',
        ]);
    }
}
