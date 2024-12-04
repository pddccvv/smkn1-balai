<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'tb_achievements';

    protected $fillable = [
        'name',
        'member',
        'champion',
        'photo',
        'year',
        'certificate',
    ];

    public function getMembersArrayAttribute()
    {
        return explode(',', $this->member);
    }
}
