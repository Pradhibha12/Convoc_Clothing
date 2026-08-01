<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_update extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_status_id',
        'user_id',
        'message',
    ];

    // Define relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define relationship with Order status
    public function order_status()
    {
        return $this->belongsTo(Order_status::class);
    }

    // Define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
