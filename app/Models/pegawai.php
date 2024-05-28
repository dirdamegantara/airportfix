<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;

    /**
     * 
     * @var array
     */

     protected $fillable = [
        'id_pegawai',
        'nama_lengkap',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telp',
        'divisi',
        'jabatan',
        'gaji',
        'diterima_sejak',
        'lama_bekerja',
     ];
}
