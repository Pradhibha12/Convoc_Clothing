<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'icon',
        'order',
        'thumbnail',
    ];

    public function blogs() {
        return $this->hasMany(Blog::class);
    }
}
