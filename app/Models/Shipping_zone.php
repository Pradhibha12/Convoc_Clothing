<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping_zone extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    public function regions() {
        return $this->hasMany(Shipping_zone_region::class);
    }

    public function rules() {
        return $this->hasMany(Shipping_rule::class);
    }
}
