<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sertifikatModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel, jika tabel tidak mengikuti konvensi penamaan
    protected $table = 'sertifikat';

    // Tentukan kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'gambar_1',
        'title',
        'description',
    ];

    // Tentukan kolom yang tidak dapat diisi
    protected $guarded = [];
}
