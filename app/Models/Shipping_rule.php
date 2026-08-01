<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_rule extends Model
{
    protected $fillable = [
        'shipping_zone_id',
        'min_weight',
        'max_weight',
        'min_price',
        'max_price',
        'cost_type',
        'cost',
    ];

    public function shipping_zone() {
        return $this->belongsTo(Shipping_zone::class);
    }
}
