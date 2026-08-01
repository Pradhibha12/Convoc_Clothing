<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'currency',
        'vat_type',
        'vat_value',
        'shipping_cost',
        'timezone',
        'store_email',
        'support_phone',
        'facebook_url',
        'instagram_url',
        'twitter_url',
    ];

    /**
     * Relationship: StoreSetting belongs to Store
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
