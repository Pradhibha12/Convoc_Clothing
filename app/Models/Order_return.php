<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_return extends Model
{
    use HasFactory;

    // Allow mass assignment on these fields
    protected $fillable = [
        'order_id',
        'user_id',
        'message',
        'images',
        'status',
        'refund_status',
        'refund_by',
        'proof',
    ];

    // Cast images field as array (JSON in DB)
    protected $casts = [
        'images' => 'array',
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
