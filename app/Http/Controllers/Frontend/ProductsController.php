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
        if ($category === 'corporate-wear' || $category === 'corporate-polo-t-shirt' || $sub_category === 'corporate-polo-t-shirt') {
            return redirect()->route('product', 'customized-corporate-your-company-logo-order-logo-print-582');
        }
        $selected_categories = [];
        if ($category) $selected_categories['category'] = Category::where('slug', $category)->firstOrFail();
        if ($sub_category) $selected_categories['sub_category'] = Category::where('slug', $sub_category)->firstOrFail();
        if ($sub_sub_category) $selected_categories['sub_sub_category'] = Category::where('slug', $sub_sub_category)->firstOrFail();
        if ($sub_sub_sub_category) $selected_categories['sub_sub_sub_category'] = Category::where('slug', $sub_sub_sub_category)->firstOrFail();
        $selected_category = count($selected_categories) > 0 ? end($selected_categories) : new Category();




        $query = Product::where('status', 1);
        // Category Filter & Price Sort Parameters
        $category_filter = $request->query('category_filter');
        $price_sort = $request->query('price_sort');
        $sort_by = $request->query('sort_by');

        // Backward compatibility mapping for old sort_by parameter
        if (empty($category_filter) && in_array($sort_by, ['men', 'women', 'kids', 'corporate'])) {
            $category_filter = $sort_by;
        }
        if (empty($price_sort) && in_array($sort_by, ['low-to-high', 'low_to_high', 'high-to-low', 'high_to_low', 'latest'])) {
            $price_sort = $sort_by;
        }

        // Department / Target Group Filter from Sidebar Checkboxes
        if ($request->department != '') {
            $departments = explode(',', $request->department);
            $query->where(function ($q) use ($departments) {
                foreach ($departments as $dept) {
                    $dept = strtolower(trim($dept));
                    if ($dept == 'men' || $dept == 'father') {
                        $q->orWhereIn('category_id', [48, 49, 50, 51])
                          ->orWhere('title', 'like', '%father%')
                          ->orWhere('title', 'like', '%men%')
                          ->orWhere('tags', 'like', '%men%');
                    } elseif ($dept == 'women' || $dept == 'mother') {
                        $q->orWhereIn('category_id', [52, 53, 54, 55])
                          ->orWhere('title', 'like', '%mother%')
                          ->orWhere('title', 'like', '%women%')
                          ->orWhere('tags', 'like', '%women%');
                    } elseif ($dept == 'kids') {
                        $q->orWhereIn('category_id', [6, 45, 46, 56, 59, 60, 61])
                          ->orWhere('title', 'like', '%kids%')
                          ->orWhere('title', 'like', '%boy%')
                          ->orWhere('title', 'like', '%girl%')
                          ->orWhere('tags', 'like', '%kids%');
                    } elseif ($dept == 'corporate' || $dept == 'corporate-uniforms') {
                        $q->orWhereIn('category_id', [57, 58])
                          ->orWhere('title', 'like', '%polo%')
                          ->orWhere('title', 'like', '%corporate%')
                          ->orWhere('tags', 'like', '%corporate%');
                    }
                }
            });
        }

        // Category Filter Dropdown (Overrides URL subcategory to prevent zero results when switching context)
        if (!empty($category_filter) && $category_filter !== 'all') {
            if ($category_filter === 't-shirts') {
                $cat = Category::where('slug', 't-shirts')->first();
                if ($cat) {
                    $child_ids = $this->get_all_child_category_ids($cat->id);
                    $query->whereIn('category_id', $child_ids);
                }
            } elseif ($category_filter === 'hoodies') {
                $cat = Category::where('slug', 'hoodies')->first();
                if ($cat) {
                    $child_ids = $this->get_all_child_category_ids($cat->id);
                    $query->whereIn('category_id', $child_ids);
                }
            } elseif ($category_filter === 'family') {
                $cat = Category::where('slug', 'family')->first();
                if ($cat) {
                    $child_ids = $this->get_all_child_category_ids($cat->id);
                    $query->whereIn('category_id', $child_ids);
                }
            } elseif ($category_filter === 'polo-t-shirt') {
                $cat = Category::where('slug', 'polo-t-shirt')->first();
                if ($cat) {
                    $child_ids = $this->get_all_child_category_ids($cat->id);
                    $query->whereIn('category_id', $child_ids);
                }
            } elseif ($category_filter === 'combo') {
                $cat = Category::where('slug', 'combo')->first();
                if ($cat) {
                    $child_ids = $this->get_all_child_category_ids($cat->id);
                    $query->whereIn('category_id', $child_ids);
                }
            }
        }
        
        // Size Filter
        $size_filter = $request->query('size_filter');
        if (!empty($size_filter) && $size_filter !== 'all') {
            $size_attr = Attribute::where('attribute_type_id', 1)->where('slug', $size_filter)->first();
            if ($size_attr) {
                $query->whereIn('id', function($q) use ($size_attr) {
                    $q->select('product_id')->from('product_attributes')->where('attribute_id', $size_attr->id);
                });
            }
        }

        // Color Filter
        $color_filter = $request->query('color_filter');
        if (!empty($color_filter) && $color_filter !== 'all') {
            $color_attr = Attribute::where('attribute_type_id', 3)->where('slug', $color_filter)->first();
            if ($color_attr) {
                $query->whereIn('id', function($q) use ($color_attr) {
                    $q->select('product_id')->from('product_attributes')->where('attribute_id', $color_attr->id);
                });
            }
        } elseif ($selected_category->id) {
            // Apply category filter from URL path if no explicit dropdown category_filter is set
            $child_category_ids = $this->get_all_child_category_ids($selected_category->id);
            if ($selected_category->slug === 'all-t-shirts') {
                $parent_cat = Category::where('slug', 't-shirts')->first();
                if ($parent_cat) {
                    $child_category_ids = $this->get_all_child_category_ids($parent_cat->id);
                }
            } elseif ($selected_category->slug === 'all-hoodies') {
                $parent_cat = Category::where('slug', 'hoodies')->first();
                if ($parent_cat) {
                    $child_category_ids = $this->get_all_child_category_ids($parent_cat->id);
                }
            } elseif ($selected_category->slug === 'all-combo') {
                $parent_cat = Category::where('slug', 'combo')->first();
                if ($parent_cat) {
                    $child_category_ids = $this->get_all_child_category_ids($parent_cat->id);
                }
            }
            if (count($child_category_ids) > 0) {
                $query->where(function ($query) use ($child_category_ids) {
                    $query->whereIn('category_id', $child_category_ids);
                });
            }
        }

        // Price Sort Dropdown (Separate Control)
        if ($price_sort === 'low_to_high' || $price_sort === 'low-to-high') {
            $query->orderBy('price', 'asc');
        } elseif ($price_sort === 'high_to_low' || $price_sort === 'high-to-low') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
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
