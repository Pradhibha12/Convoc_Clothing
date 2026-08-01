<?php

namespace App\Models;

use App\Http\Controllers\Frontend\ProductsController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'store_id',
        'brand_id',
        'status',
        'title',
        'code',
        'slug',
        'tags',
        'label',
        'quality_label',
        'summary',
        'description',
        'average_rating',
        'price',
        'total_stock',
        'thumbnail',
        'banner',
        'image_attributes',
    ];

    public function product_attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    public function product_merged_attributes()
    {
        $product_merged_attributes = [];
        foreach($this->belongsToMany(Attribute::class, 'product_attributes')->orderBy('attribute_id', 'asc')->get() as $product_attribute){
            $product_attribute_type = $product_attribute->attribute_type->toArray();
            $product_attribute = $product_attribute->toArray();

            if(!array_key_exists($product_attribute_type['id'], $product_merged_attributes)){
                $product_merged_attributes[$product_attribute_type['id']] = $product_attribute_type;
            }
            $product_merged_attributes[$product_attribute_type['id']]['attributes'][] = $product_attribute;
        }
        return $product_merged_attributes;
    }

    public function product_attribute_types()
    {
        return $this->hasManyThrough(
            Attribute_type::class,
            Product_attribute::class,
            'product_id',
            'id',
            'id',
            'attribute_type_id'
        )->distinct();
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'product_event');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discount()
    {
        return $this->hasOne(Product_discount::class)->withDefault();
    }

    public function is_discounted()
    {
        return $this->hasOne(Product_discount::class)->where('start_date', '<=', date('Y-m-d H:i:s'))->where('end_date', '>=', date('Y-m-d H:i:s'))->where('status', 1);
    }

    public function discounted_price(){
        
    }

    public function images()
    {
        return $this->hasMany(File::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function is_wishlist_item(){
        return $this->hasOne(Wishlist_item::class)->where('user_id', auth()->user()->id ?? 0);
    }

    public function is_cart_item(){
        return $this->hasOne(Cart_item::class)->where('user_id', auth()->user()->id ?? 0);
    }

    function store(){
        return $this->belongsTo(Store::class)->withDefault();
    }

    function brand(){
        return $this->belongsTo(Brand::class)->withDefault();
    }

    function related_products(){
        $category_id = $this->category_id;
        $category_ids = (new ProductsController)->get_all_child_category_ids($category_id);
        return Product::whereIn('category_id', $category_ids)
                    ->where('id', '!=', $this->id);
    }


}
