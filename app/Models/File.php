<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'review_id',
        'path',
        'type',
        'name',
        'extension',
        'size',
    ];
}
