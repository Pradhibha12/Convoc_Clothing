<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
        'title',
        'status',
        'topbar',
        'header',
        'page_title',
        'primary_button',
        'secondary_button',
        'body',
        'filter',
        'html',
    ];
}
