<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class keahlianModel extends Model
{
    use HasFactory;

    // Menentukan nama tabel, jika tabel tidak mengikuti konvensi penamaan
    protected $table = 'skills';

    // Tentukan kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'title',
        'description',
        'icon',
    ];

    // Tentukan kolom yang tidak dapat diisi
    protected $guarded = [];
}
