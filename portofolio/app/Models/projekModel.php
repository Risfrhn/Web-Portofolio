<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\gambarProjekModel;

class projekModel extends Model
{
    use HasFactory;

    protected $table = 'detailprojek';

    protected $fillable = [
        'gambar_flyer',
        'title_1',
        'title_2',
        'desk_1',
        'gambar_1',
        'desk_2',
        'desk_3',

        'gambarIcon_1',
        'gambarIcon_2',
        'gambarIcon_3',
        'gambarIcon_4',
        'gambarIcon_5',
        
        'gambarProjek_1',
        'gambarProjek_2',
        'gambarProjek_3',
        'gambarProjek_4',
        'gambarProjek_5',
    ];

    // Tentukan kolom yang harus di-cast menjadi tipe tertentu (optional)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
