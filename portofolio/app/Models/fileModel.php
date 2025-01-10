<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fileModel extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = ['CV_name', 'path'];
}
