<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'tb_subject';

    protected $fillable = [
        'photo',
        'semester',
        'class',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }

    public function getPhotoUrl()
    {
        // Jika file adalah gambar, kita bisa menggunakan asset untuk menampilkannya
        if ($this->isImage()) {
            return asset('storage/' . $this->photo);
        }

        // Jika bukan gambar, kita bisa memberikan URL untuk mengunduhnya
        return asset('storage/' . $this->photo);
    }

    // Cek apakah file adalah gambar
    public function isImage()
    {
        $imageMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $mimeType = mime_content_type(storage_path('app/public/' . $this->photo));  // Mengetahui MIME type file
        return in_array($mimeType, $imageMimeTypes);
    }
}
