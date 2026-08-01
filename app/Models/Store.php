<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'phone',
        'latitude',
        'longitude',
        'description',
        'thumbnail',
        'banner',
        'admin_revenue',
        'vendor_revenue'
    ];

    public function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function reviews()
    {
        // Use hasManyThrough to access reviews via products
        return $this->hasManyThrough(Review::class, Product::class);
    }

    public function getAverageRatingAttribute()
    {
        // Use preloaded reviews if available to avoid repeated queries
        $reviews = $this->reviews;

        if ($reviews->isEmpty()) {
            return 0;
        }

        return round($reviews->avg('rating'), 1);
    }

    public function getTotalReviewsAttribute()
    {
        // Use preloaded reviews if available to avoid repeated queries
        return $this->reviews->count();
    }

    public function settings()
    {
        return $this->hasOne(StoreSetting::class);
    }
}
