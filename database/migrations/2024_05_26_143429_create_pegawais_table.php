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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('id_pegawai');
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('no_telp');
            $table->string('divisi');
            $table->string('jabatan');
            $table->integer('gaji');
            $table->date('diterima_sejak');
            $table->integer('lama_bekerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
