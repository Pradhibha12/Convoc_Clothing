<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'discount_type',
        'discount_value',
        'usage_limit',
        'start_date',
        'end_date',
        'status',
        'summary',
        'description',
        'thumbnail',
        'banner',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_event');
    }
}
