<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'item_attributes',
        'quantity',
        'price',
        'discount_amount',
    ];

    // Define relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
