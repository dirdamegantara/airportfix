<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kedatangan extends Model
{
    use HasFactory;

    /**
     * 
     * @var array
     */

     protected $fillable = [
        'nama_maskapai',
        'kode_penerbangan',
        'asal',
        'waktu_kedatangan',
        'keterangan',
        'jumlah_penumpang',
        'jenis_pesawat',
        'model_pesawat',
        'kode_registrasi',
        'origin',
     ];
}
