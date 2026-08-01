<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'product_id', 
        'code', 
        'name', 
        'discount_type', 
        'discount_value', 
        'minimum_order_amount', 
        'maximum_discount_amount', 
        'usage_limit',
        'start_date', 
        'end_date', 
        'description', 
        'thumbnail', 
    ];

    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    
}
