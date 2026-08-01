<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'state_id',
    ];

    public function country() {
        return $this->belongsTo(Country::class)->withDefault();
    }
    public function state() {
        return $this->belongsTo(State::class)->withDefault();
    }
}
