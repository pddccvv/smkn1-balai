<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tb_gallery';

    protected $fillable = [
        'type',
        'file',
    ];

    protected $casts = [
        'file' => 'array',
    ];
}
