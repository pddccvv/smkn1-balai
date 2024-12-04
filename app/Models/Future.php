<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Future extends Model
{
    use HasFactory;

    protected $table = 'tb_future';

    protected $fillable = [
        'vision',
        'mission',
        'goals',
    ];

    public function getMission()
    {
        return $this->mission ? explode('|', $this->mission) : [];
    }

    public function getGoals()
    {
        return $this->goals ? explode('|', $this->goals) : [];
    }
}
