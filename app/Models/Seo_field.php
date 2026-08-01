<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seo_field extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'item_table', 'item_id', 'route', 'meta_title', 'meta_keywords', 'meta_description', 'meta_robot', 'canonical_url', 'custom_url', 'json_ld', 'og_title', 'og_description', 'og_image'
    ];
}
