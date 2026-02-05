<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaporanKonseling;
use App\Models\PengajuanKonseling;

class LaporanKonselingSeeder extends Seeder
{
    public function run(): void
    {
        $pengajuan = PengajuanKonseling::firstOrFail();

        LaporanKonseling::create([
            'id_pengajuan'   => $pengajuan->id,
            'hasil_catatan'  => 'Siswa diberikan arahan belajar dan jadwal evaluasi.',
        ]);
    }
}
