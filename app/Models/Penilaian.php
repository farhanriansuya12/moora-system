<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $fillable = [
        'id',
        'nama_pendaftar',
        'tes_pemrograman_web',
        'tes_pemrograman_mobil',
        'tes_photoshop',
        'tes_microsoft_office',
        'created_at',
        'updated_at',
    ];
}
