<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 
        'status', 
        'discount_type', 
        'discount_value', 
        'start_date', 
        'end_date', 
        'maximum_time_use'
    ];
}
