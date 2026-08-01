<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id', 
        'level', 
        'title', 
        'slug', 
        'icon', 
        'thumbnail', 
        'banner', 
        'description', 
        'sort'
    ];

    public static function boot()
    {
        parent::boot();

        // Default sorting global scope
        static::addGlobalScope('order', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->orderBy('sort', 'asc')->orderBy('title', 'asc');
        });

        // Delete related entries in attribute_category pivot table when deleting a Category
        static::deleting(function ($category) {
            $category->attributes()->detach();
        });
    }

    public function childs() {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function parent() {
        return $this->belongsTo(Category::class,'parent_id')->withDefault();
    }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function attribute_types()
    {
        return $this->belongsToMany(Attribute_type::class);
    }

    // Method to count all products in the category and its subcategories
    public function totalProductCount()
    {
        $totalProducts = $this->products()->where('status', 1)->count(); // Count products directly in this category

        // Recursively count products in subcategories
        foreach ($this->childs as $subcategory) {
            $totalProducts += $subcategory->totalProductCount();
        }

        return $totalProducts;
    }
}
