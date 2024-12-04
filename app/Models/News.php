<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'tb_news';
    protected $primaryKey = 'news_id';

    protected $fillable = [
        'title',
        'content',
        'author',
        'thumbnail',
        'published_at',
    ];
}
