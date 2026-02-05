<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPermasalahan;

class KategoriPermasalahanSeeder extends Seeder
{
    public function run(): void
    {
        KategoriPermasalahan::insert([
            [
                'nama_kategori' => 'Akademik',
                'deskripsi' => 'Masalah terkait nilai, belajar, tugas, dan prestasi.',
            ],
            [
                'nama_kategori' => 'Pribadi',
                'deskripsi' => 'Masalah pribadi, emosi, kepercayaan diri, dan mental.',
            ],
            [
                'nama_kategori' => 'Sosial',
                'deskripsi' => 'Masalah hubungan dengan teman, keluarga, atau lingkungan.',
            ],
            [
                'nama_kategori' => 'Karier',
                'deskripsi' => 'Masalah rencana masa depan, jurusan, dan pekerjaan.',
            ],
        ]);
    }
}
