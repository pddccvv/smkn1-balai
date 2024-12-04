<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizational extends Model
{
    use HasFactory;

    protected $table = 'tb_organizational';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
    ];
}
