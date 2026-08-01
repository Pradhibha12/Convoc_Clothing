<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\{Attribute, Category, Product};
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    
    function get_all_child_category_ids($category_id)
    {
        $category_ids[] = $category_id;

        $category = Category::where('id', $category_id)->first();

        if (!$category) {
            return $category_ids; // return just the given id if category not found
        }

        foreach ($category->childs as $child) {
            if ($child->childs->count() > 0) {
                $category_ids = array_merge($category_ids, $this->get_all_child_category_ids($child->id));
            } else {
                $category_ids[] = $child->id;
            }
        }

        return $category_ids;
    }


    function get_category_attribute_ids($child_category_ids, $request)
    {
        $selected_attribute_ids = [];
        foreach(Category::whereIn('id', $child_category_ids)->get() as $selected_category){
            foreach ($selected_category->attribute_types as $attribute_type) {
                $attribute_type_slug = $attribute_type->slug;
                if ($request->$attribute_type_slug && $request->$attribute_type_slug != "") {
                    $selected_attributes = explode(',', $request->$attribute_type_slug);
                    $attribute_ids = Attribute::where('attribute_type_id', $attribute_type->id)
                        ->whereIn('slug', $selected_attributes)
                        ->pluck('id')
                        ->toArray();
                    $selected_attribute_ids = array_merge($selected_attribute_ids, $attribute_ids);
                }
            }
        }

        $selected_attribute_ids = array_unique($selected_attribute_ids);

        return $selected_attribute_ids;
    }

    function index(Request $request, $category = "", $sub_category = "", $sub_sub_category = "", $sub_sub_sub_category = "")
    {
        $selected_categories = [];
        if ($category) $selected_categories['category'] = Category::where('slug', $category)->firstOrFail();
        if ($sub_category) $selected_categories['sub_category'] = Category::where('slug', $sub_category)->firstOrFail();
        if ($sub_sub_category) $selected_categories['sub_sub_category'] = Category::where('slug', $sub_sub_category)->firstOrFail();
        if ($sub_sub_sub_category) $selected_categories['sub_sub_sub_category'] = Category::where('slug', $sub_sub_sub_category)->firstOrFail();
        $selected_category = count($selected_categories) > 0 ? end($selected_categories) : new Category();




        $query = Product::where('status', 1);
        // Category
        if ($selected_category->id) {
            // filtered by category
            $child_category_ids = $this->get_all_child_category_ids($selected_category->id);
            if (count($child_category_ids) > 0) {
                $query->where(function ($query) use ($child_category_ids) {
                    $query->whereIn('category_id', $child_category_ids);
                });
            }

            // filtered by category attributes
            $all_child_category_attribute_ids = $this->get_category_attribute_ids($child_category_ids, $request);
            if (count($all_child_category_attribute_ids) > 0) {
                $query->whereHas('product_attributes', function ($query) use ($all_child_category_attribute_ids) {
                    $query->where('quantity', '>', 0)->whereIn('attribute_id', $all_child_category_attribute_ids);
                });
            }
        }



        // Search
        if ($request->search != '') {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
                $query->orWhere('tags', 'like', '%' . $request->search . '%');
                $query->orWhere('summary', 'like', '%' . $request->search . '%');
            });
        }

        // Price
        if ($request->price != '') {
            $price_min_max_arr = explode(',', $request->price);
            if (!isset($price_min_max_arr[1])) $price_min_max_arr[1] = 0;

            $query->where(function ($query) use ($price_min_max_arr) {
                $query->whereBetween('price', $price_min_max_arr);
            });
        }

        // Availability
        if ($request->availability != '') {
            $availability = explode(',', $request->availability);
            $query->where(function ($query) use ($availability) {
                if (in_array('in-stock', $availability) && !in_array('out-of-stock', $availability)) {
                    $query->where('total_stock', '>', 0);
                } elseif (in_array('out-of-stock', $availability) && !in_array('in-stock', $availability)) {
                    $query->where('total_stock', 0);
                }
            });
        }

        // Rating
        if ($request->rating != '') {
            $rating = explode(',', $request->rating);
            $query->where(function ($query) use ($rating) {
                $query->whereIn('average_rating', $rating);
            });
        }

        // Product sorting
        if ($request->sort_by != '') {
            if($request->sort_by == 'low-to-high'){
                $query->orderBy('price', 'asc');
            }elseif($request->sort_by == 'high-to-low'){
                $query->orderBy('price', 'desc');
            }elseif($request->sort_by == 'best-rated'){
                $query->orderBy('average_rating', 'desc');
            }elseif($request->sort_by == 'release-date'){
                $query->orderBy('created_at', 'desc');
            }
        }


        $page_data['selected_categories'] = $selected_categories;
        $page_data['selected_category'] = $selected_category;
        $page_data['products'] = $query->paginate(12)->appends($request->query());
        return view('frontend.products.index', $page_data);
    }

    public function filter_search(Request $request)
    {
        $search = $request->input('search');
        return redirect()->route('all_products', ['search' => $search]);
    }




}
