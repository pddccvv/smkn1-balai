<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    use HasFactory;

    protected $table = 'tb_welcome';

    protected $fillable = [
        'headmaster',
        'nip',
        'words',
        'photo',
    ];
}
