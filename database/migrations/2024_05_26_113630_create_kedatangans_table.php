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
        Schema::create('kedatangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_maskapai');
            $table->string('kode_penerbangan');
            $table->string('asal');
            $table->time('waktu_kedatangan');
            $table->string('keterangan');
            $table->integer('jumlah_penumpang');
            $table->string('jenis_pesawat');
            $table->string('model_pesawat');
            $table->string('kode_registrasi');
            $table->string('origin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kedatangans');
    }
};
