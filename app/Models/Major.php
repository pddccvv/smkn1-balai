<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'tb_major';

    protected $fillable = [
        'name',
        'logo',
        'description'
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'major_id');
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'major_id');
    }
}
