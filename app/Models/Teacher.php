<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'tb_teachers';

    protected $fillable = [
        'name',
        'nip',
        'major_id',
        'sex',
        'photo'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
