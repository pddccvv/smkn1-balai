<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    protected $table = 'tb_accreditation';

    protected $fillable = [
        'name',
        'certificate',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
