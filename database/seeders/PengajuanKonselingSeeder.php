<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PengajuanKonseling;
use App\Models\Siswa;
use App\Models\Konselor;
use App\Models\KategoriPermasalahan;

class PengajuanKonselingSeeder extends Seeder
{
    public function run(): void
    {
        $userSiswa    = Siswa::firstOrFail();
        $userKonselor = Konselor::firstOrFail();
        $kategori = KategoriPermasalahan::firstOrFail();

        PengajuanKonseling::create([
            'id_siswa'     => $userSiswa->id,
            'id_konselor'      => $userKonselor->id,
            'id_kategori'  => $kategori->id,
            'deskripsi_masalah'    => 'Saya mengalami kesulitan fokus belajar dan nilai menurun.',
            'tanggal_pengajuan' => now()->addDays(2),
            'status'       => 'menunggu',
        ]);
    }
}
