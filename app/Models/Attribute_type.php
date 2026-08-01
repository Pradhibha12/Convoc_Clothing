<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'input_type'
    ];

    public static function boot()
    {
        parent::boot();

        // Delete related entries in attribute_category pivot table when deleting an Attribute_type
        static::deleting(function ($attribute_type) {
            $attribute_type->categories()->detach();
        });
    }

    public function attributes() {
        return $this->hasMany(Attribute::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
