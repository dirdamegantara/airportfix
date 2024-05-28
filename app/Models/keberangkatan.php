<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keberangkatan extends Model
{
    use HasFactory;

    
    /**
     * 
     * @var array
     */

     protected $fillable = [
        'nama_maskapai',
        'kode_penerbangan',
        'tujuan',
        'waktu_keberangkatan',
        'keterangan',
        'jumlah_penumpang',
        'jenis_pesawat',
        'model_pesawat',
        'kode_registrasi',
        'origin',
     ];
}
