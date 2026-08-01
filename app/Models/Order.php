<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coupon_id',
        'store_id',
        'total_price',
        'total_discounted_amount',
        'total_order_amount',
        'total_shipping_cost',
        'total_amount_of_vat',
        'grand_total',
        'coupon_discount_amount',
        'payable_amount',
        'currency_code',
        'billing_address_id',
        'shipping_address_id',
        'payment_method'
    ];

    // Define relationship with OrderItem
    public function order_items()
    {
        return $this->hasMany(Order_item::class);
    }

    // Define a many-to-many relationship with Product through order_items
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_updates(){
        return $this->hasMany(Order_update::class);
    }

    public function shipping_address(){
        return $this->belongsTo(Shipping_address::class, 'shipping_address_id');
    }

    public function billing_address(){
        return $this->belongsTo(Shipping_address::class, 'billing_address_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
