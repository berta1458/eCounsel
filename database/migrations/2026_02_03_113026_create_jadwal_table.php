<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_konseling', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_pengajuan')
                ->constrained('pengajuan_konseling')
                ->onDelete('cascade');

            $table->date('tanggal_konseling');

            $table->enum('status', [
                'dijadwalkan',
                'berlangsung',
                'selesai',
                'ditolak'
            ])->default('dijadwalkan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
