<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Graduation extends Model
{
    use HasFactory;

    protected $table = 'tb_graduation';

    protected $fillable = [
        'pdf',
        'major_id',
        'year',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function getPdfUrl()
    {
        return url('storage/' . $this->pdf);
    }
}
