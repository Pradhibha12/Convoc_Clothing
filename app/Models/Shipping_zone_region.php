<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_zone_region extends Model
{
    protected $fillable = [
        'shipping_zone_id',
        'country_id',
    ];

    public function zone() {
        return $this->belongsTo(Shipping_zone::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
