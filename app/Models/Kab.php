<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kab extends Model
{
    use HasFactory;

    protected $table = 'kabs';

    protected $fillable = [
        'nama_kab',
        'no_kab',
        'kapasiti',
        'harga_per_malam',
        'status',
        'deskripsi',
        'kategori',
        'gambar', // Diselaraskan menggunakan nama 'gambar'
    ];
}