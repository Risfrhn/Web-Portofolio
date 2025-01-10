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
        'link_projek',

        'gambarIcon_1',
        'gambarIcon_2',
        'gambarIcon_3',
        'gambarIcon_4',
        'gambarIcon_5',
        'gambarIcon_6',
        'gambarIcon_7',
        'gambarIcon_8',
        'gambarIcon_9',
        
        'gambarProjek_1',
        'gambarProjek_2',
        'gambarProjek_3',
        'gambarProjek_4',
        'gambarProjek_5',
        'gambarProjek_6',
        'gambarProjek_7',
        'gambarProjek_8',
        'gambarProjek_9',
    ];

    // Tentukan kolom yang harus di-cast menjadi tipe tertentu (optional)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
