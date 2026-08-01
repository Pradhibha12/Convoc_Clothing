<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_category_id',
        'title',
        'slug',
        'summary',
        'status',
        'thumbnail',
        'banner',
        'description',
        'keywords'
    ];

    public function category() {
        return $this->belongsTo(Blog_category::class, 'blog_category_id')->withDefault();
    }
    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }
}
