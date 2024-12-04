<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'tb_students';

    protected $fillable = [
        'major_id',
        'class',
        'amount',
        'semester',
    ];

    public static function countStudents()
    {
        return self::sum('amount');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
