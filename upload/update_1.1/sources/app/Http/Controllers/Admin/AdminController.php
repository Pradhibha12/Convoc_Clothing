<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\CommonController;
use App\Models\Attribute_type;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\Blog_category;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Event;
use App\Models\Order;
use App\Models\Order_status;
use App\Models\Order_update;
use App\Models\Order_return;
use App\Models\Language;
use App\Models\Language_phrase;
use App\Models\Message_thread;
use App\Models\Message;
use App\Models\Page;
use App\Models\Product;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Frontend_setting;
use App\Models\State;
use App\Models\Store;
use App\Models\User;
use App\Models\Product_attribute;
use App\Models\Product_discount;
use App\Models\Payment_gateway;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Mail;
use App\Mail\FirstEmail;
use App\Mail\FollowUpEmail;
use App\Mail\ThirdEmail;
use App\Mail\FourthEmail;
use App\Mail\FifthEmail;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Seo_field;
use App\Models\Shipping_carrier;
use App\Models\Shipping_rule;
use App\Models\Shipping_zone;
use App\Models\Shipping_zone_region;
use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
class AdminController extends Controller
{


function dashboard()
{
    $page_data['totalProduct'] = Product::where('status', 1)->get();
    $page_data['totalCustomer'] = User::where('user_type', 'customer')->get();
    $page_data['totalOrder'] = Order::get();
    $page_data['totalStore'] = Store::get();
    $page_data['stores'] = Store::get();

    // Earnings data (monthly)
    $monthlyEarnings = Payment::select(
        DB::raw('MONTH(created_at) as month'),
        DB::raw('SUM(total_amount) as total')
    )
    ->whereYear('created_at', Carbon::now()->year)
    ->groupBy('month')
    ->orderBy('month', 'asc')
    ->pluck('total', 'month')
    ->toArray();

    $months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    $monthlyTotals = [];
    for ($i = 1; $i <= 12; $i++) {
        $monthlyTotals[] = $monthlyEarnings[$i] ?? 0;
    }

    $page_data['months'] = $months;
    $page_data['monthlyTotals'] = $monthlyTotals;
    $page_data['balance'] = Payment::sum('total_amount');

    $topProducts = DB::table('order_items')
        ->select(
            'product_id',
            DB::raw('SUM(quantity) as total_quantity'),
            DB::raw('SUM(price * quantity) as total_sales')
        )
        ->groupBy('product_id')
        ->orderByDesc('total_quantity')  
        ->get();
    $productIds = $topProducts->pluck('product_id');
    $productDetails = Product::whereIn('id', $productIds)->get()->keyBy('id');

    $topProducts = $topProducts->map(function ($item) use ($productDetails) {
        $product = $productDetails[$item->product_id] ?? null;
        return (object)[
            'id' => $item->product_id,
            'title' => $product->title ?? 'Unknown Product',
            'code' => $product->code ?? 'N/A',
            'price' => $product->price ?? 0,
            'total_quantity' => $item->total_quantity,
            'total_sales' => $item->total_sales,
        ];
    });

    
    $perPage = 10;
    $currentPage = request()->get('page', 1);
    $currentItems = $topProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();
    $paginatedProducts = new LengthAwarePaginator(
        $currentItems,
        $topProducts->count(),
        $perPage,
        $currentPage,
        ['path' => request()->url(), 'query' => request()->query()]
    );

    $page_data['topProducts'] = $paginatedProducts;
    $page_data['page_title'] = get_phrase('Dashboard');

    return view('admin.dashboard.dashboard', $page_data);
}




    // Category
    function categories()
    {
        $page_data['categories'] = Category::with('parent')->get();
        $page_data['page_title'] = get_phrase('Category List ');
        return view('admin.category.categories', $page_data);
    }
    function category_add()
    {
        $page_data['page_title'] = get_phrase('Add new Category ');
        return view('admin.category.category_add', $page_data);
    }
    function category_store(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|numeric|min:0',
            'title' => 'required|max:255'
        ]);

        //Check the same name of category
        $category_slug = slugify($request->title);
        if (Category::where('slug', $category_slug)->where('parent_id', $request->parent_id)->count() > 0) {
            return redirect()->back()->withInput($request->input())->with('error', get_phrase('This category already exists'));
        }

        $data['parent_id'] = $request->parent_id;
        $data['title'] = $request->title;
        $data['slug'] = $category_slug;

        $data['level'] = $this->get_category_level_by_parent_id($request->parent_id);

        $data['sort'] = 0;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['description'] = $request->description;

        if ($request->icon) {
            $data['icon'] = app(CommonController::class)->upload($request->icon, 'uploads/category/icon/' . nice_file_name($request->title, $request->icon->extension()), 300);
        }
        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/category/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 800);
        }
        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/category/banner/' . nice_file_name($request->title, $request->banner->extension()), 1800);
        }

        $category = Category::create($data);

        //Manage attribute types
        $array_data = $request->toArray();
        if ($category && array_key_exists('attribute_types', $array_data) && count($array_data['attribute_types']) > 0) {
            $category->attribute_types()->sync($array_data['attribute_types']); // Attaches attribute_types with IDs 1, 2, 3 and detaches all others
        }

        return redirect(route('admin.categories'))->with('success', get_phrase('Category added successfully'));
    }
    function category_edit($id)
    {
        $page_data['category'] = Category::with('attribute_types')->where('id', $id)->first();
        $page_data['page_title'] = get_phrase('Category Edit ');
        return view('admin.category.category_edit', $page_data);
    }
    function category_update(Request $request, $id)
    {
        $current_data = Category::where('id', $id)->first();
        $request->validate([
            'parent_id' => 'required|numeric|min:0',
            'title' => 'required|max:255'
        ]);

        //Check the same name of category
        $category_slug = slugify($request->title);
        if (Category::where('slug', $category_slug)->where('parent_id', $request->parent_id)->where('id', '!=', $id)->count() > 0) {
            return redirect()->back()->withInput($request->input())->with('error', get_phrase('This category already exists'));
        }

        $data['parent_id'] = $request->parent_id;
        $data['title'] = $request->title;
        $data['slug'] = $category_slug;

        $data['level'] = $this->get_category_level_by_parent_id($request->parent_id);

        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->icon) {
            $data['icon'] = app(CommonController::class)->upload($request->icon, 'uploads/category/icon/' . nice_file_name($request->title, $request->icon->extension()), 300);
            remove_file($current_data->icon);
        }
        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/category/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 800);
            remove_file($current_data->thumbnail);
        }
        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/category/banner/' . nice_file_name($request->title, $request->banner->extension()), 1800);
            remove_file($current_data->banner);
        }

        $category = Category::find($id);
        $category->update($data);

        //Manage attribute types
        $array_data = $request->toArray();
        if ($category && array_key_exists('attribute_types', $array_data) && count($array_data['attribute_types']) > 0) {
            $category->attribute_types()->sync($array_data['attribute_types']); // Attaches attribute_types with IDs 1, 2, 3 and detaches all others
        } else {
            $category->attribute_types()->detach();; // Attaches attribute_types with IDs 1, 2, 3 and detaches all others
        }

        return redirect(route('admin.categories'))->with('success', get_phrase('Category updated successfully'));
    }

   
    public function category_delete($id)
{
    $allCategoryIds = [];

    $findChildren = function ($categoryId) use (&$findChildren, &$allCategoryIds) {
        $allCategoryIds[] = $categoryId;
        $children = Category::where('parent_id', $categoryId)->pluck('id');
        foreach ($children as $childId) {
            $findChildren($childId);
        }
    };

    $findChildren($id);

    $categories = Category::whereIn('id', $allCategoryIds)->get();
    foreach ($categories as $cat) {
        remove_file($cat->icon);
        remove_file($cat->thumbnail);
        remove_file($cat->banner);
    }
    Category::whereIn('id', $allCategoryIds)->delete();

    return redirect(route('admin.categories'))
        ->with('success', get_phrase('Category deleted successfully'));
}


    function get_category_level_by_parent_id($parent_id)
    {
        if ($parent_id == 0) {
            return 0;
        } else {
            $category_sub = Category::where('id', $parent_id)->first();
            if ($category_sub->parent_id == 0) {
                return 1;
            } else {
                $category_sub_sub = Category::where('id', $category_sub->parent_id)->first();
                if ($category_sub_sub->parent_id == 0) {
                    return 2;
                } else {
                    return 3;
                }
            }
        }
    }
    // Category End



    // Attribute type
    function attribute_types()
    {
        $page_data['attribute_types'] = Attribute_type::with('attributes')->get();
        $page_data['page_title'] = get_phrase('Attribute Types ');
        return view('admin.attribute_type.attribute_types', $page_data);
    }
    function attribute_type_add()
    {
        $page_data['page_title'] = get_phrase(' Add new attribute type ');
        return view('admin.attribute_type.attribute_type_add' , $page_data);
    }
    function attribute_type_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'input_type' => 'required|max:255'
        ]);

        $data['name'] = $request->name;
        $data['slug'] = str_replace('-', '_', app(CommonController::class)->unique_slug($request->name, 'attribute_types'));
        $data['input_type'] = $request->input_type;
        $data['created_at'] = date('Y-m-d H:i:s');

        Attribute_type::insert($data);

        return redirect(route('admin.attribute_types'))->with('success', get_phrase('Attribute type added successfully'));
    }
    function attribute_type_edit($id)
    {
        $page_data['attribute_type'] = Attribute_type::where('id', $id)->first();
         $page_data['page_title'] = get_phrase(' Edit new attribute type ');
        return view('admin.attribute_type.attribute_type_edit', $page_data);
    }
    function attribute_type_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'input_type' => 'required|max:255'
        ]);

        $data['name'] = $request->name;
        $data['slug'] = str_replace('-', '_', app(CommonController::class)->unique_slug($request->name, 'attribute_types', 'slug', $id));
        $data['input_type'] = $request->input_type;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Attribute_type::where('id', $id)->update($data);

        return redirect(route('admin.attribute_types'))->with('success', get_phrase('Attribute type updated successfully'));
    }

    function attribute_type_delete($id)
    {
        foreach (Attribute::where('attribute_type_id', $id)->get() as $attribute) {
            Attribute::where('id', $attribute->id)->delete();
            Product_attribute::where('attribute_id', $attribute->id)->delete();
        }
        Attribute_type::where('id', $id)->delete();
        return redirect(route('admin.attribute_types'))->with('success', get_phrase('Attribute deleted successfully'));
    }
    //Attribute End

    // Attribute
    function attributes(Request $request)
    {
        $attribute_type = Attribute_type::where('id', $request->id)->firstOrNew();
        $page_data['attribute_type'] = $attribute_type;
        $page_data['attributes'] = $attribute_type->attributes;
        $page_data['page_title'] = get_phrase('Back To Attribute Types ');
        return view('admin.attribute.attributes', $page_data);
    }
    function attribute_store(Request $request)
    {
        $request->validate([
            'attribute_type_id' => 'required|numeric|exists:attribute_types,id',
            'name' => 'required|max:255'
        ]);

        $data['attribute_type_id'] = $request->attribute_type_id;
        $data['name'] = $request->name;
        $data['slug'] = slugify($request->name);
        $data['input_value'] = $request->input_value;
        $data['created_at'] = date('Y-m-d H:i:s');

        Attribute::insert($data);
        return redirect(route('admin.attributes', ['id' => $request->attribute_type_id]))->with('success', get_phrase('Attribute added successfully'));
    }

    function attribute_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $data['name'] = $request->name;
        $data['slug'] = slugify($request->name);
        $data['input_value'] = $request->input_value;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Attribute::where('id', $id)->update($data);
        return redirect(route('admin.attributes', ['id' => $request->attribute_type_id]))->with('success', get_phrase('Attribute updated successfully'));
    }

    function attribute_delete(Request $request, $id)
    {
        Attribute::where('id', $id)->delete();
        Product_attribute::where('attribute_id', $id)->delete();
        return redirect(route('admin.attributes', ['id' => $request->attribute_type_id]))->with('success', get_phrase('Attribute deleted successfully'));
    }
    //Attribute End


    //Customer
    function customers()
    {
        $query = User::where('user_type', 'customer');

        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if (request()->has('status') && request()->query('status') != 'all') {
            $status = request()->query('status') == 'active' ? 1 : 0;
            $query  = $query->where('status', $status);
        }

        if (request()->has('gender') && request()->query('gender') != 'any') {
            $gender = request()->query('gender');
            $query  = $query->where('gender', $gender);
        }

        $page_data['customers'] = $query->paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase('Customer List  ');
        return view('admin.customer.customers', $page_data);
    }

    function customer_add()
    {
         $page_data['page_title'] = get_phrase('Customer Add  ');
        return view('admin.customer.customer_add', $page_data);
    }

    function customer_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => "required|min:8",
            'role_id' => 'nullable|exists:roles,id',
            'phone' => "required",
            'gender' => "in:male,female",
            'date_of_birth' => "date|date_format:Y-m-d",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = 'customer';
        $data['phone'] = $request->phone;
        $data['status'] = 1;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
        $data['created_at'] = date('Y-m-d H:i:s');

         $data['email_verified_at'] = $request->has('email_verified_at') ? now() : null;

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
        }

        User::insert($data);
        return redirect(route('admin.customers'))->with('success', get_phrase('Customer added successfully'));
    }

    function customer_edit($id)
    {
        $page_data['customer'] = User::where('id', $id)->first();
         $page_data['page_title'] = get_phrase('Customer Edit');
        return view('admin.customer.customer_edit', $page_data);
    }

    function customer_update(Request $request, $id)
    {
        $current_data = User::where('id', $id)->first();
        $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$id",
            'role_id' => 'nullable|exists:roles,id',
            'phone' => "required",
            'gender' => "in:male,female",
            'date_of_birth' => "date|date_format:Y-m-d",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
        $data['updated_at'] = date('Y-m-d H:i:s');
         $data['email_verified_at'] = $request->has('email_verified_at') ? now() : null;

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
            remove_file($current_data->photo);
        }

        User::where('id', $id)->update($data);
        return redirect(route('admin.customers'))->with('success', get_phrase('Customer updated successfully'));
    }

    function customer_delete($id)
    {
        $current_data = User::where('id', $id)->first();
        remove_file($current_data->photo);
        User::where('id', $id)->delete();

        return redirect(route('admin.customers'))->with('success', get_phrase('Customer deleted successfully'));
    }
    //Customer

    //Staff
    function staffs()
    {
        $query = User::where('user_type', 'staff');

        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if (request()->has('status') && request()->query('status') != 'all') {
            $status = request()->query('status') == 'active' ? 1 : 0;
            $query  = $query->where('status', $status);
        }

        if (request()->has('gender') && request()->query('gender') != 'any') {
            $gender = request()->query('gender');
            $query  = $query->where('gender', $gender);
        }

        $page_data['staffs'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase(' Staff List ');
        return view('admin.staff.staffs', $page_data);
    }

    function staff_add()
    {
        $page_data['roles'] = Role::get();
        $page_data['page_title'] = get_phrase(' Staff Add ');
        return view('admin.staff.staff_add', $page_data);
    }

    function staff_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => "required|min:8",
            // 'role_id' => 'nullable|exists:roles,id',
            'phone' => "required",
            'gender' => "in:male,female",
            'date_of_birth' => "date|date_format:Y-m-d",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['user_type'] = 'staff';
        // $data['role_id'] = $request->role_id;
        $data['phone'] = $request->phone;
        $data['status'] = 1;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
        $data['created_at'] = date('Y-m-d H:i:s');
         $data['email_verified_at'] = $request->has('email_verified_at') ? now() : null;

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
        }

        User::insert($data);
        return redirect(route('admin.staffs'))->with('success', get_phrase('Staff added successfully'));
    }

    function staff_edit($id)
    {
        $page_data['roles'] = Role::get();
        $page_data['staff'] = User::where('id', $id)->first();
        $page_data['page_title'] = get_phrase(' Staff Edit ');
        return view('admin.staff.staff_edit', $page_data);
    }

    function staff_update(Request $request, $id)
    {
        $current_data = User::where('id', $id)->first();
        $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$id",
            // 'role_id' => 'nullable|exists:roles,id',
            'phone' => "required",
            'gender' => "in:male,female",
            'date_of_birth' => "date|date_format:Y-m-d",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        // $data['role_id'] = $request->role_id;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
        $data['updated_at'] = date('Y-m-d H:i:s');
         $data['email_verified_at'] = $request->has('email_verified_at') ? now() : null;

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
            remove_file($current_data->photo);
        }

        User::where('id', $id)->update($data);
        return redirect(route('admin.staffs'))->with('success', get_phrase('Staff updated successfully'));
    }

    function staff_delete($id)
    {
        $current_data = User::where('id', $id)->first();
        remove_file($current_data->photo);
        User::where('id', $id)->delete();

        return redirect(route('admin.staffs'))->with('success', get_phrase('Staff deleted successfully'));
    }
    //Staff


    //Role
    function roles()
    {
        $page_data['roles'] = Role::paginate(12)->appends(request()->query());
        return view('admin.role.roles', $page_data);
    }

    function role_add()
    {
        return view('admin.role.role_add');
    }

    function role_store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:roles,name|max:255',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = slugify($request->name);
        $data['created_at'] = date('Y-m-d H:i:s');

        Role::create($data);
        return redirect(route('admin.roles'))->with('success', get_phrase('Role added successfully'));
    }

    function role_edit($id)
    {
        $page_data['role'] = Role::where('id', $id)->first();
        return view('admin.role.role_edit', $page_data);
    }

    function role_update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|max:255|unique:roles,name,$id",
        ]);

        $data['name'] = $request->name;
        $data['slug'] = slugify($request->name);
        $data['updated_at'] = date('Y-m-d H:i:s');

        Role::where('id', $id)->update($data);
        return redirect(route('admin.roles'))->with('success', get_phrase('Role updated successfully'));
    }

    function role_delete($id)
    {
        Role::where('id', $id)->delete();
        return redirect(route('admin.roles'))->with('success', get_phrase('Role deleted successfully'));
    }
    //Role

    //Blog
    function blogs()
    {
        $query = Blog::query();

        // Search filter
        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        // Status filter
        if (request()->has('status') && request()->query('status') != 'all') {
            $status = request()->query('status') === 'active' ? 1 : 0;
            $query->where('status', $status);
        }

        // Category filter (by slug)
        if (request()->has('category') && request()->query('category') != 'all') {
            $slug = request()->query('category');
            $category = Blog_category::where('slug', $slug)->first();

            if ($category) {
                $query->where('blog_category_id', $category->id);
            } else {
                // No matching category → force empty result
                $query->whereRaw('1 = 0');
            }
        }

        // Blog creator filter
        if (request()->has('creator_id') && request()->query('creator_id') != 'all') {
            $query->where('user_id', request()->query('creator_id'));
        }

        $page_data['blogs'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Blog List  ');
        return view('admin.blog.blogs', $page_data);
    }

    function blog_add()
    {
        $page_data['blog_categories'] = Blog_category::get();
        $page_data['page_title'] = get_phrase('Blog Add  ');
        return view('admin.blog.blog_add', $page_data);
    }

    function blog_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id'
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['blog_category_id'] = $request->blog_category_id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'blogs');
        $data['summary'] = $request->summary;
        $data['keywords'] = $request->keywords;
        $data['status'] = 1;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/blog/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 1600); 
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/blog/banner/' . nice_file_name($request->title, $request->banner->extension()), 1600);
        }

        Blog::insert($data);
        return redirect(route('admin.blogs'))->with('success', get_phrase('Blog added successfully'));
    }

    function blog_edit($id)
    {
        $page_data['blog_categories'] = Blog_category::get();
        $page_data['blog'] = Blog::where('id', $id)->first();
        $page_data['page_title'] = get_phrase('Blog Edit  ');
        return view('admin.blog.blog_edit', $page_data);
    }

    function blog_update(Request $request, $id)
    {
        $current_data = Blog::where('id', $id)->first();

        $request->validate([
            'title' => 'required|max:255',
            'blog_category_id' => 'required|exists:blog_categories,id'
        ]);

        $data['blog_category_id'] = $request->blog_category_id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'blogs', 'slug', $id);
        $data['summary'] = $request->summary;
        $data['keywords'] = $request->keywords;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/blog/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 1600);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/blog/banner/' . nice_file_name($request->title, $request->banner->extension()), 1600);
            remove_file($current_data->banner);
        }
        

        Blog::where('id', $id)->update($data);
        return redirect(route('admin.blogs'))->with('success', get_phrase('Blog updated successfully'));
    }

    function blog_delete($id)
    {
        $current_data = Blog::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Blog::where('id', $id)->delete();
        return redirect(route('admin.blogs'))->with('success', get_phrase('Blog deleted successfully'));
    }

    function blog_seo_update(Request $request, $id = "")
    {
        $request->validate([
            'meta_title'       => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_robot'       => 'nullable|string|max:255',
            'canonical_url'    => 'nullable|url',
            'custom_url'       => 'nullable|url',
            'og_title'         => 'nullable|string|max:255',
            'og_description'   => 'nullable|string',
            'og_image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'json_ld'          => 'nullable|string',
        ]);

        // Find or create SEO field
        $seo_field = Seo_field::firstOrNew([
            'item_table' => 'blogs',
            'item_id'    => $id,
        ]);

        $seo_field->route            = 'blog_details';
        $seo_field->meta_title       = $request->meta_title;
        $seo_field->meta_keywords    = $request->meta_keywords;
        $seo_field->meta_description = $request->meta_description;
        $seo_field->meta_robot       = $request->meta_robot;
        $seo_field->canonical_url    = $request->canonical_url;
        $seo_field->custom_url       = $request->custom_url;
        $seo_field->og_title         = $request->og_title;
        $seo_field->og_description   = $request->og_description;
        $seo_field->json_ld          = $request->json_ld;

        if ($request->og_image) {
            $og_image = app(CommonController::class)->upload($request->og_image, 'uploads/seo-content/' . nice_file_name($request->meta_title, $request->og_image->extension()), 400);

            // delete old image if exists
            if (!empty($seo_field->og_image) && file_exists(public_path('uploads/seo-content/' . $seo_field->og_image))) {
                @unlink(public_path('uploads/seo-content/' . $seo_field->og_image));
            }

            $seo_field->og_image = $og_image;
        }

        $seo_field->save();

        return redirect()->back()->with('success', 'SEO fields updated successfully.');
    }
    //Blog

    //Blog category
    function blog_categories()
    {
        $page_data['blog_categories'] = Blog_category::paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase(' Blog category list  ');
        return view('admin.blog_category.blog_categories', $page_data);
    }

    function blog_category_add()
    {
        $page_data['page_title'] = get_phrase(' Blog category Add  ');
        return view('admin.blog_category.blog_category_add', $page_data);
    }

    function blog_category_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255|unique:blog_categories,title',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'blog_categories');
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/blog_category/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        Blog_category::insert($data);
        return redirect(route('admin.blog.categories'))->with('success', get_phrase('Blog category added successfully'));
    }

    function blog_category_edit($id)
    {
        $page_data['blog_category'] = Blog_category::where('id', $id)->first();
        $page_data['page_title'] = get_phrase(' Blog category Edit ');
        return view('admin.blog_category.blog_category_edit', $page_data);
    }

    function blog_category_update(Request $request, $id)
    {
        $current_data = Blog_category::where('id', $id)->first();

        $request->validate([
            'title' => "required|max:255|unique:blog_categories,title,$id",
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'blog_categories', 'slug', $id);
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/blog_category/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        Blog_category::where('id', $id)->update($data);
        return redirect(route('admin.blog.categories'))->with('success', get_phrase('Blog category updated successfully'));
    }

    function blog_category_delete($id)
    {
        $current_data = Blog_category::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        Blog_category::where('id', $id)->delete();
        return redirect(route('admin.blog.categories'))->with('success', get_phrase('Blog category deleted successfully'));
    }
    //Blog category


    //Product
    function products()
    {
        $query = Product::query();

        // Search filter
        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where('title', 'LIKE', "%{$search}%");
        }

        // Status filter
        if (request()->has('status') && request()->query('status') != 'all') {
            $status = request()->query('status') === 'active' ? 1 : 0;
            $query->where('status', $status);
        }

        // Category filter (by slug)
        if (request()->has('category') && request()->query('category') != 'all') {
            $slug = request()->query('category');
            $category = Category::where('slug', $slug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                // No matching category → force empty result
                $query->whereRaw('1 = 0');
            }
        }

         // Store filter (using slug)
            if (request()->has('store') && request()->query('store') != 'all') {
                $storeSlug = request()->query('store');
                $store = Store::where('slug', $storeSlug)->first();

                if ($store) {
                    $query->where('store_id', $store->id);
                } else {
                    $query->whereRaw('1 = 0');
                }
            }

            // Brand filter (using name)
            if (request()->has('brand') && request()->query('brand') != 'all') {
                $brandName = request()->query('brand');
                $brand = Brand::where('name', $brandName)->first();

                if ($brand) {
                    $query->where('brand_id', $brand->id);
                } else {
                    $query->whereRaw('1 = 0');
                }
            }

        $page_data['products'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Product List');

        return view('admin.product.products', $page_data);
    }

    function product_add()
    {
        $page_data['product_categories'] = Category::get();
        $page_data['stores'] = Store::get();
        $page_data['brands'] = Brand::get();
         $page_data['page_title'] = get_phrase('Product Add');
        return view('admin.product.product_add', $page_data);
    }

    function product_store(Request $request, $action_type = '')
    {

        if ($action_type == 'quick') {
            $request->validate([
                'category_id' => 'required|exists:categories,id',
                'status' => 'nullable|in:1,0',
                'title' => 'required|max:255',
                'price' => 'required|numeric',
                'store_id' => 'required',
            ]);
            $data['user_id'] = auth()->user()->id;
            $data['title'] = $request->title;
            $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products');
            $data['code'] = app(CommonController::class)->unique_code('products', 'code');
            $data['category_id'] = $request->category_id;
            $data['status'] = $request->status;
            $data['summary'] = $request->summary;
            $data['description'] = $request->description;
            $data['price'] = $request->price;
            $data['total_stock'] = 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['store_id'] = $request->store_id;
        } else {
            $request->validate([
                'store_id' => 'required|exists:stores,id',
                'brand_id' => 'required|exists:brands,id',
                'category_id' => 'required|exists:categories,id',
                'status' => 'nullable|in:1,0',
                'title' => 'required|max:255',
                'label' => 'required|in:top-seller,best-seller,featured,trendy,new-arrival,hot,exclusive,limited-edition,bestselling,customer-favorite',
                'quality_label' => 'required|in:certified,premium,authentic,handmade,organic,sustainable',
                'price' => 'required|numeric',
                'discount_type' => 'required|in:percentage,flat',
                'discount_value' => 'required|numeric',
            ]);


            $data['user_id'] = auth()->user()->id;
            $data['title'] = $request->title;
            $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products');
            $data['code'] = app(CommonController::class)->unique_code('products', 'code');
            $data['store_id'] = $request->store_id;
            $data['brand_id'] = $request->brand_id;
            $data['category_id'] = $request->category_id;
            $data['status'] = $request->status;
            $data['label'] = $request->label;
            $data['quality_label'] = $request->quality_label;
            $data['summary'] = $request->summary;
            $data['description'] = $request->description;
            $data['unit'] = $request->unit;
            $data['total_stock'] = $request->total_stock;
            $data['price'] = $request->price;
            $data['created_at'] = date('Y-m-d H:i:s');


            $product_image = [];

            if ($request->hasFile('thumbnail')) {
                foreach ($request->file('thumbnail') as $key => $image) {

                    $image = app(CommonController::class)->upload($image, 'uploads/product/thumbnail/' . nice_file_name($key.'-'.time(), $image->extension()), 800);

                    array_push($product_image, $image);
                }
                $data['thumbnail'] = json_encode($product_image);
            }else{
                $data['thumbnail'] = $product_image;
            }

            if ($request->banner) {
                $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/product/banner/' . nice_file_name($request->title, $request->banner->extension()), 800);
            }
        }

        $product_id = Product::insertGetId($data);

        if ($product_id > 0 && $action_type != 'quick') {
            //Product attributes
            if ($request->product_attributes) {
                foreach ($request->product_attributes as $attribute_type_id => $attributes) {
                    foreach ($attributes as $attribute_id => $product_quantity) {
                        if ($product_quantity > 0) {
                            $product_attribute['product_id'] = $product_id;
                            $product_attribute['attribute_type_id'] = $attribute_type_id;
                            $product_attribute['attribute_id'] = $attribute_id;
                            $product_attribute['quantity'] = $product_quantity;
                            $product_attribute['created_at'] = date('Y-m-d H:i:s');
                            Product_attribute::insert($product_attribute);
                        }
                    }
                }
            }

            //Product discounts
            if ($request->discount_period) {
                $product_discount['product_id'] = $product_id;
                $product_discount['discount_type'] = $request->discount_type;
                $product_discount['discount_value'] = $request->discount_value;
                $product_discount['status'] = $request->discount_status;
                $discount_period = explode(' - ', $request->discount_period);
                $product_discount['start_date'] = date('Y-m-d H:i:s', strtotime($discount_period[0]));
                $product_discount['end_date'] = date('Y-m-d H:i:s', strtotime($discount_period[1]));
                $product_discount['created_at'] = date('Y-m-d H:i:s');
                Product_discount::insert($product_discount);
            }
        }

        return redirect(route('admin.products'))->with('success', get_phrase('Product added successfully'));
    }

    function product_edit($id)
    {
        $page_data['product_categories'] = Category::get();
        $page_data['product'] = Product::where('id', $id)->first();
        $page_data['stores'] = Store::get();
        $page_data['brands'] = Brand::get();
         $page_data['page_title'] = get_phrase('Manage Product ');
        return view('admin.product.product_edit', $page_data);
    }

    function product_update(Request $request, $id)
    {
        $current_data = Product::where('id', $id)->first();

        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'status' => 'nullable|in:1,0',
            'title' => 'required|max:255',
            'label' => 'required|in:top-seller,best-seller,featured,trendy,new-arrival,hot,exclusive,limited-edition,bestselling,customer-favorite',
            'quality_label' => 'required|in:certified,premium,authentic,handmade,organic,sustainable',
            'price' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);


        $data['user_id'] = auth()->user()->id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'products', 'slug', $id);
        $data['store_id'] = $request->store_id;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->status;
        $data['label'] = $request->label;
        $data['quality_label'] = $request->quality_label;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['unit'] = $request->unit;
        $data['total_stock'] = $request->total_stock;
        $data['price'] = $request->price;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $product_image = json_decode(Product::where('id', $id)->pluck('thumbnail')->toArray()[0])??[];

        if ($request->hasFile('thumbnail')) {
            foreach ($request->file('thumbnail') as $key => $image) {

               $image = app(CommonController::class)->upload($image, 'uploads/product/thumbnail/' . nice_file_name($key.'-'.time(), $image->extension()), 800);

                array_push($product_image, $image);
            }
            $data['thumbnail'] = json_encode($product_image);
        }else{
            $data['thumbnail'] = $product_image;
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/product/banner/' . nice_file_name($request->title, $request->banner->extension()), 800);
            remove_file($current_data->banner);
        }

        Product::where('id', $id)->update($data);


        //Product attributes
        if ($request->product_attributes) {
            foreach ($request->product_attributes as $attribute_type_id => $attributes) {
                foreach ($attributes as $attribute_id => $product_quantity) {
                    if ($product_quantity > 0) {
                        $product_attribute['product_id'] = $id;
                        $product_attribute['attribute_type_id'] = $attribute_type_id;
                        $product_attribute['attribute_id'] = $attribute_id;
                        $product_attribute['quantity'] = $product_quantity;

                        if (Product_attribute::where('product_id', $id)->where('attribute_id', $attribute_id)->count() > 0) {
                            $product_attribute['updated_at'] = date('Y-m-d H:i:s');
                            Product_attribute::where('product_id', $id)->where('attribute_id', $attribute_id)->update($product_attribute);
                        } else {
                            $product_attribute['created_at'] = date('Y-m-d H:i:s');
                            Product_attribute::insert($product_attribute);
                        }
                    }
                }
            }
        }

        //Product discounts
        if ($request->discount_period) {
            $product_discount['product_id'] = $id;
            $product_discount['discount_type'] = $request->discount_type;
            $product_discount['discount_value'] = $request->discount_value;
            $product_discount['status'] = $request->discount_status;
            $discount_period = explode(' - ', $request->discount_period);
            $product_discount['start_date'] = date('Y-m-d H:i:s', strtotime($discount_period[0]));
            $product_discount['end_date'] = date('Y-m-d H:i:s', strtotime($discount_period[1]));
            if (Product_discount::where('product_id', $id)->count() > 0) {
                Product_discount::where('product_id', $id)->update($product_discount);
                $product_discount['updated_at'] = date('Y-m-d H:i:s');
            } else {
                $product_discount['created_at'] = date('Y-m-d H:i:s');
                Product_discount::insert($product_discount);
            }
        }

        // Find or create SEO field
        $seo_field = Seo_field::firstOrNew([
            'item_table' => 'products',
            'item_id'    => $id,
        ]);
        
        $seo_field->route            = 'product';
        $seo_field->meta_title       = $request->meta_title;
        $seo_field->meta_keywords    = $request->meta_keywords;
        $seo_field->meta_description = $request->meta_description;
        $seo_field->meta_robot       = $request->meta_robot;
        $seo_field->canonical_url    = $request->canonical_url;
        $seo_field->custom_url       = $request->custom_url;
        $seo_field->og_title         = $request->og_title;
        $seo_field->og_description   = $request->og_description;
        $seo_field->json_ld          = $request->json_ld;

        if ($request->og_image) {
            $og_image = app(CommonController::class)->upload($request->og_image, 'uploads/seo-content/' . nice_file_name($request->meta_title, $request->og_image->extension()), 400);

            // delete old image if exists
            if (!empty($seo_field->og_image) && file_exists(public_path('uploads/seo-content/' . $seo_field->og_image))) {
                @unlink(public_path('uploads/seo-content/' . $seo_field->og_image));
            }

            $seo_field->og_image = $og_image;
        }

        $seo_field->save();


        return redirect(route('admin.products'))->with('success', get_phrase('Product updated successfully'));
    }

    function product_image_delete($id, $image)
    {
        $product = Product::where('id', $id);

        $imageToRemove = 'uploads/product/thumbnail/'.$image;
        $imageArray = json_decode($product->first()->thumbnail);
        $key = array_search($imageToRemove, $imageArray);
        if ($key !== false) {
            unset($imageArray[$key]);
        }
        $imageArray = array_values($imageArray);
        $resultJson = json_encode($imageArray);
        $product->update(['thumbnail'=>$resultJson]);
        if(file_exists('public/uploads/product/thumbnail/'.$image)){
            unlink('public/uploads/product/thumbnail/'.$image);
        }
        return 1;
    }

    function product_attribute_delete($attribute_type_id, $product_id)
    {
        foreach (Attribute::where('attribute_type_id', $attribute_type_id)->get() as $attribute) {
            Product_attribute::where('product_id', $product_id)->where('attribute_id', $attribute->id)->delete();
        }
    }
     public function product_delete($id) {
            $product = Product::find($id);
            if (!$product) {
                return redirect()->back()->with('error', get_phrase('Product not found'));
            }
            // Delete all thumbnail images (if any)
            $thumbnails = json_decode($product->thumbnail, true);
            if (is_array($thumbnails)) {
                foreach ($thumbnails as $thumb) {
                    $imagePath = public_path($thumb); 
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }
            // Delete single image files (banner, etc.) if they exist
            if (!empty($product->banner)) {
                $bannerPath = public_path($product->banner);
                if (file_exists($bannerPath)) {
                    unlink($bannerPath);
                }
            }
            // Remove related data
            Product_discount::where('product_id', $id)->delete();
            Product_attribute::where('product_id', $id)->delete();
            // Finally delete the product record
            $product->delete();
            return redirect()->back()->with('success', get_phrase('Product deleted successfully'));
        }


    //Product


    //Coupon
    function coupons()
    {
        $page_data['coupons'] = Coupon::paginate(12)->appends(request()->query());
        return view('admin.coupon.coupons', $page_data);
    }

    function coupon_add()
    {
        $page_data['customers'] = User::customers()->get();
        return view('admin.coupon.coupon_add', $page_data);
    }

    function coupon_store(Request $request)
    {

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'code' => 'required|max:15|unique:coupons,code',
            'title' => 'required|max:255',
            'discount_type' => 'required|in:flat,percentage',
            'discount_value' => 'required|numeric',
            'minimum_order_amount' => 'nullable|numeric',
            'maximum_discount_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|numeric',
            'coupon_period' => 'required',
        ]);

        if ($request->coupon_period) {
            $coupon_period = explode(' - ', $request->coupon_period);
            $start_date = date('Y-m-d H:i:s', strtotime($coupon_period[0]));
            $end_date = date('Y-m-d H:i:s', strtotime($coupon_period[1]));
        } else {
            $start_date = null;
            $end_date = null;
        }

        $data['user_id'] = $request->user_id;
        $data['code'] = $request->code;
        $data['title'] = $request->title;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['minimum_order_amount'] = $request->minimum_order_amount;
        $data['maximum_discount_amount'] = $request->maximum_discount_amount;
        $data['usage_limit'] = $request->usage_limit;
        $data['description'] = $request->description;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/coupon/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        Coupon::insert($data);
        return redirect(route('admin.coupons'))->with('success', get_phrase('Coupon added successfully'));
    }

    function coupon_edit($id)
    {
        $page_data['customers'] = User::customers()->get();
        $page_data['coupon'] = Coupon::where('id', $id)->first();
        return view('admin.coupon.coupon_edit', $page_data);
    }

    function coupon_update(Request $request, $id)
    {
        $current_data = Coupon::where('id', $id)->first();

        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'code' => "required|max:15|unique:coupons,code,$id",
            'title' => 'required|max:255',
            'discount_type' => 'required|in:flat,percentage',
            'discount_value' => 'required|numeric',
            'minimum_order_amount' => 'nullable|numeric',
            'maximum_discount_amount' => 'nullable|numeric',
            'usage_limit' => 'nullable|numeric',
            'coupon_period' => 'required',
        ]);

        if ($request->coupon_period) {
            $coupon_period = explode(' - ', $request->coupon_period);
            $start_date = date('Y-m-d H:i:s', strtotime($coupon_period[0]));
            $end_date = date('Y-m-d H:i:s', strtotime($coupon_period[1]));
        } else {
            $start_date = null;
            $end_date = null;
        }

        $data['user_id'] = $request->user_id;
        $data['code'] = $request->code;
        $data['title'] = $request->title;
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['minimum_order_amount'] = $request->minimum_order_amount;
        $data['maximum_discount_amount'] = $request->maximum_discount_amount;
        $data['usage_limit'] = $request->usage_limit;
        $data['description'] = $request->description;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/coupon/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        Coupon::where('id', $id)->update($data);
        return redirect(route('admin.coupons'))->with('success', get_phrase('Coupon updated successfully'));
    }

    function coupon_delete($id)
    {
        $current_data = Coupon::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        Coupon::where('id', $id)->delete();
        return redirect(route('admin.coupons'))->with('success', get_phrase('Coupon deleted successfully'));
    }
    //Coupon


    //Brand
    function brands()
    {
        $page_data['brands'] = Brand::paginate(12)->appends(request()->query());
          $page_data['page_title'] = get_phrase('Brand List ');
        return view('admin.brand.brands', $page_data);
    }

    function brand_add()
    {
        $page_data['page_title'] = get_phrase('Brand Add ');
        return view('admin.brand.brand_add', $page_data);
    }

    function brand_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['official_website_link'] = $request->official_website_link;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->logo) {
            $data['logo'] = app(CommonController::class)->upload($request->logo, 'uploads/brand/logo/' . nice_file_name($request->title, $request->logo->extension()), 400);
        }

        Brand::insert($data);
        return redirect(route('admin.brands'))->with('success', get_phrase('Brand added successfully'));
    }

    function brand_edit($id)
    {
        $page_data['brand'] = Brand::where('id', $id)->first();
          $page_data['page_title'] = get_phrase('Brand Edit ');
        return view('admin.brand.brand_edit', $page_data);
    }

    function brand_update(Request $request, $id)
    {
        $current_data = Brand::where('id', $id)->first();

        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['official_website_link'] = $request->official_website_link;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->logo) {
            $data['logo'] = app(CommonController::class)->upload($request->logo, 'uploads/brand/logo/' . nice_file_name($request->title, $request->logo->extension()), 400);
            remove_file($current_data->logo);
        }

        Brand::where('id', $id)->update($data);
        return redirect(route('admin.brands'))->with('success', get_phrase('Brand updated successfully'));
    }

    function brand_delete($id)
    {
        $current_data = Brand::where('id', $id)->first();
        remove_file($current_data->logo);
        Brand::where('id', $id)->delete();
        return redirect(route('admin.brands'))->with('success', get_phrase('Brand deleted successfully'));
    }
    //Brand

    //Store
    function stores()
    {
        $query = Store::query();

        // Search filter
        if (request()->filled('search')) {
            $search = request()->query('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Store owner filter
        if (request()->has('owner_id') && request()->query('owner_id') != 'all') {
            $query->where('user_id', request()->query('owner_id'));
        }

        $page_data['stores'] = $query->paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase('Store List ');

        return view('admin.store.stores', $page_data);
    }

    function store_add()
    {
        $page_data['customers'] = User::customers()->get();
          $page_data['page_title'] = get_phrase('Store Add ');
        return view('admin.store.store_add', $page_data);
    }

    function store_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        $data['user_id'] = $request->user_id;
        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'stores');
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['zip'] = $request->zip;
        $data['country'] = $request->country;
        $data['phone'] = $request->phone;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/store/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/store/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
        }

        Store::insert($data);
        return redirect(route('admin.stores'))->with('success', get_phrase('Store added successfully'));
    }

    function store_edit($id) 
    {
        $page_data['customers'] = User::customers()->get();
        $page_data['store'] = Store::where('id', $id)->first();
          $page_data['page_title'] = get_phrase('Store Edit ');
        return view('admin.store.store_edit', $page_data);
    }

    function store_update(Request $request, $id)
    {
        $current_data = Store::where('id', $id)->first();
        

        $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        $data['user_id'] = $request->user_id;
        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'stores', 'slug', $id);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['zip'] = $request->zip;
        $data['country'] = $request->country;
        $data['phone'] = $request->phone;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/store/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/store/banner/' . nice_file_name($request->title, $request->banner->extension()), 1600);
            remove_file($current_data->banner);
        }

        Store::where('id', $id)->update($data);
        return redirect(route('admin.stores'))->with('success', get_phrase('Store updated successfully'));
    }

    function store_delete($id)
    {
        $current_data = Store::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Store::where('id', $id)->delete();
        return redirect(route('admin.stores'))->with('success', get_phrase('Store deleted successfully'));
    }

    function store_settings() 
    {
        $page_data['store'] = Store::where('user_id', auth()->user()->id)->first();
          $page_data['page_title'] = get_phrase('Store settings ');
        return view('admin.store.store_settings', $page_data);
    }

    public function store_settings_update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'currency' => 'required|string|max:10',
            'vat_type'       => 'required|in:percentage,flat',
            'vat_value'      => 'required|integer|min:0',
            'shipping_cost'  => 'required|numeric|min:0|max:999999.99',
            'timezone' => 'nullable|string|max:100',
            'store_email' => 'required|email|max:255',
            'support_phone' => 'nullable|string|max:50',
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            // 'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'favicon' => 'nullable|image|mimes:ico,png|max:1024',
        ]);

        // Find store by id
        $store = Store::findOrFail($id);

        // Get or create related settings record
        $settings = $store->settings()->firstOrNew([]);

        // Assign validated data
        $settings->currency = $validated['currency'];
        $settings->vat_type       = $validated['vat_type'];
        $settings->vat_value      = $validated['vat_value'];
        $settings->shipping_cost  = $validated['shipping_cost'];
        $settings->timezone = $validated['timezone'] ?? null;
        $settings->store_email = $validated['store_email'];
        $settings->support_phone = $validated['support_phone'] ?? null;
        $settings->facebook_url = $validated['facebook_url'] ?? null;
        $settings->instagram_url = $validated['instagram_url'] ?? null;
        $settings->twitter_url = $validated['twitter_url'] ?? null;

       

        // Save settings
        $store->settings()->save($settings);

        // Redirect back with success message
        return redirect()->back()->with('success', get_phrase('Store settings updated successfully'));
    }

    function store_profile() 
    {
        $page_data['store'] = get_store_by_owner_id(auth()->user()->id);
          $page_data['page_title'] = get_phrase('Store Profile settings  ');
        return view('admin.store.store_profile', $page_data);
    }

    function store_profile_update(Request $request) 
    {
        $current_data = get_store_by_owner_id(auth()->user()->id);

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'stores', 'slug', $current_data->id);
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['state'] = $request->state;
        $data['zip'] = $request->zip;
        $data['country'] = $request->country;
        $data['phone'] = $request->phone;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/store/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/store/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
            remove_file($current_data->banner);
        }

        Store::where('id', $current_data->id)->update($data);
        return redirect(route('admin.store.profile'))->with('success', get_phrase('Store updated successfully'));
    }
    //Store


    //Country
    function countries()
    {
        $page_data['countries'] = Country::paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Country List  ');
        return view('admin.country.countries', $page_data);
    }
    //Country


    //State
    function states()
    {

        $page_data['states'] = State::paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('State List  ');
        return view('admin.state.states', $page_data);
    }

    function state_add()
    {
        $page_data['countries'] = Country::get();
        $page_data['page_title'] = get_phrase('State Add  ');
        return view('admin.state.state_add', $page_data);
    }

    function state_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $data['name'] = $request->name;
        $data['country_id'] = $request->country_id;
        $data['created_at'] = date('Y-m-d H:i:s');

        State::insert($data);
        return redirect(route('admin.states'))->with('success', get_phrase('State added successfully'));
    }

    function state_edit($id)
    {
        $page_data['countries'] = Country::get();
        $page_data['state'] = State::where('id', $id)->first();
        $page_data['page_title'] = get_phrase('State Edit');
        return view('admin.state.state_edit', $page_data);
    }

    function state_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $data['name'] = $request->name;
        $data['country_id'] = $request->country_id;
        $data['updated_at'] = date('Y-m-d H:i:s');

        State::where('id', $id)->update($data);
        return redirect(route('admin.states'))->with('success', get_phrase('State updated successfully'));
    }

    function state_delete($id)
    {
        State::where('id', $id)->delete();
        return redirect(route('admin.states'))->with('success', get_phrase('State deleted successfully'));
    }
    //State

    //City
    public function cities(Request $request)
    {
        $query = City::query();

        // Filter by search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by state
        if ($request->filled('state') && $request->state != 'all') {
            $query->where('state_id', $request->state);
        }

        $page_data['cities'] = $query->paginate(12)->appends($request->query());
        $page_data['states'] = State::all();
        $page_data['page_title'] = get_phrase('City List  ');
        return view('admin.city.cities', $page_data);
    }

    function city_add()
    {
        $page_data['countries'] = Country::get();
         $page_data['page_title'] = get_phrase('City Add  ');
        return view('admin.city.city_add', $page_data);
    }

    function city_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        $data['name'] = $request->name;
        $data['state_id'] = $request->state_id;
        $data['country_id'] = $request->country_id;
        $data['created_at'] = date('Y-m-d H:i:s');

        City::insert($data);
        return redirect(route('admin.cities'))->with('success', get_phrase('City added successfully'));
    }

    function city_edit($id)
    {
        $page_data['countries'] = Country::get();
        $page_data['city'] = City::where('id', $id)->first();
         $page_data['page_title'] = get_phrase('City Edit ');
        return view('admin.city.city_edit', $page_data);
    }

    function city_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'state_id' => 'required|exists:states,id',
            'country_id' => 'required|exists:countries,id',
        ]);

        $data['name'] = $request->name;
        $data['state_id'] = $request->state_id;
        $data['country_id'] = $request->country_id;
        $data['updated_at'] = date('Y-m-d H:i:s');

        City::where('id', $id)->update($data);
        return redirect(route('admin.cities'))->with('success', get_phrase('City updated successfully'));
    }

    function city_delete($id)
    {
        City::where('id', $id)->delete();
        return redirect(route('admin.cities'))->with('success', get_phrase('City deleted successfully'));
    }
    //City

    //Page
    function pages()
    {
        $page_data['pages'] = Page::paginate(12)->appends(request()->query());
        return view('admin.page.pages', $page_data);
    }

    function page_add()
    {
        return view('admin.page.page_add');
    }

    function page_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required:max:255',
            'status' => 'required|in:0,1',
            'button_placement' => 'required:max:255|in:header,footer',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->slug, 'pages');
        $data['content'] = upload_description_images($request->content, 'uploads/page');
        $data['status'] = $request->status;
        $data['button_placement'] = $request->button_placement;
        $data['created_at'] = date('Y-m-d H:i:s');

        Page::insert($data);
        return redirect(route('admin.pages'))->with('success', get_phrase('Page added successfully'));
    }

    function page_edit($id)
    {
        $page_data['page'] = Page::where('id', $id)->first();
        return view('admin.page.page_edit', $page_data);
    }

    function page_update(Request $request, $id)
    {
        $current_data = Page::where('id', $id)->first();

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required:max:255',
            'status' => 'required|in:0,1',
            'button_placement' => 'required:max:255|in:header,footer',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->slug, 'pages', 'slug', $id);
        $data['status'] = $request->status;
        $data['button_placement'] = $request->button_placement;
        $data['updated_at'] = date('Y-m-d H:i:s');

        remove_description_images($current_data->content);
        $data['content'] = upload_description_images($request->content, 'uploads/page');

        Page::where('id', $id)->update($data);
        return redirect(route('admin.pages'))->with('success', get_phrase('Page updated successfully'));
    }

    function page_delete($id)
    {
        $current_data = Page::where('id', $id)->first();
        remove_description_images($current_data->content);
        Page::where('id', $id)->delete();
        return redirect(route('admin.pages'))->with('success', get_phrase('Page deleted successfully'));
    }
    //Page

    //Event
    

            function events()
        {
            $page_data = [];

            if (request()->filled('eDateRange')) {
               
                $eDateRange = request()->query('eDateRange');
                $dateRange  = explode(' - ', $eDateRange);

                // Safely parse date (assuming input is m/d/Y)
                $start_date = Carbon::createFromFormat('m/d/Y', trim($dateRange[0]))->startOfDay();
                $end_date   = Carbon::createFromFormat('m/d/Y', trim($dateRange[1]))->endOfDay();
            } else {
                // Default: current month
                $start_date = Carbon::now()->startOfMonth()->startOfDay();
                $end_date   = Carbon::now()->endOfMonth()->endOfDay();
            }

            $page_data['start_date'] = $start_date;
            $page_data['end_date']   = $end_date;

            // Fetch all events overlapping with selected range
            $page_data['events'] = Event::where(function ($query) use ($start_date, $end_date) {
                    $query->whereBetween('start_date', [$start_date, $end_date])
                        ->orWhereBetween('end_date', [$start_date, $end_date])
                        ->orWhere(function ($q) use ($start_date, $end_date) {
                            $q->where('start_date', '<=', $start_date)
                                ->where('end_date', '>=', $end_date);
                        });
                })
                ->orderBy('start_date', 'asc')
                ->paginate(12)
                ->appends(request()->query());
             $page_data['page_title'] = get_phrase('Event List ');
            return view('admin.event.events', $page_data);
        }

    function event_add()
    {
         $page_data['page_title'] = get_phrase('Event Add ');
        return view('admin.event.event_add', $page_data);
    }

    function event_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            // 'event_period' => 'required',
            // 'usage_limit' => 'required|numeric',
            // 'discount_type' => 'required|in:percentage,flat',
            // 'discount_value' => 'required|numeric',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'events');
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status; 
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        $data['product_id'] = json_encode($request->product_id);

        if ($request->event_period) {
            $event_period = explode(' - ', $request->event_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($event_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($event_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/event/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 1600);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/event/banner/' . nice_file_name($request->title, $request->banner->extension()), 1600);
        }

        Event::insert($data);
        return redirect(route('admin.events'))->with('success', get_phrase('Event added successfully'));
    }

    function event_edit($id)
    {
        $page_data['event'] = Event::where('id', $id)->first();
         $page_data['page_title'] = get_phrase('Event Edit ');
        return view('admin.event.event_edit', $page_data);
    }

    function event_update(Request $request, $id)
    {
        $current_data = Event::where('id', $id)->first();

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            // 'usage_limit' => 'required|numeric',
            // 'discount_type' => 'required|in:percentage,flat',
            // 'discount_value' => 'required|numeric',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'events', 'slug', $id);
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $data['product_id'] = json_encode($request->product_id);
        
        if ($request->event_period) {
            $event_period = explode(' - ', $request->event_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($event_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($event_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/event/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 1600);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/event/banner/' . nice_file_name($request->title, $request->banner->extension()), 1600);
            remove_file($current_data->banner);
        }

        Event::where('id', $id)->update($data);
        return redirect(route('admin.events'))->with('success', get_phrase('Event updated successfully'));
    }

    function event_delete($id)
    {
        $current_data = Event::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Event::where('id', $id)->delete();
        return redirect(route('admin.events'))->with('success', get_phrase('Event deleted successfully'));
    }
    //Event

    //Order
   

    function orders(){
    $query = Order::query();

    if (request()->filled('search')) {
        $search = request()->query('search');

        // remove # if user types it (e.g. "#105")
        $cleanSearch = trim($search, '#');

        $query->where(function($q) use ($cleanSearch) {
            if (is_numeric($cleanSearch)) {
                $num = (int)$cleanSearch;
                $orderId = ($num > 100) ? $num - 100 : $num;
                $q->where('id', $orderId);
            }

            $q->orWhereHas('customer', function($q2) use ($cleanSearch) {
                $q2->where('name', 'LIKE', '%'.$cleanSearch.'%');
            });
        });
    }

    // Filter by status
    if (request()->filled('status') && request('status') !== 'all') {
        $statusIdentifier = request('status');

        $query->whereHas('order_updates', function($q) use ($statusIdentifier) {
            $q->whereHas('order_status', function($q2) use ($statusIdentifier) {
                $q2->where('identifier', $statusIdentifier);
            })
            ->whereIn('id', function($sub) {
                $sub->selectRaw('MAX(id) as id')
                    ->from('order_updates')
                    ->groupBy('order_id');
            });
        });
    }

    //  Filter by date range
    if (request()->filled('created_at')) {
        $dates = explode(' - ', request('created_at'));
        if (count($dates) == 2) {
            $startDate = \Carbon\Carbon::parse($dates[0])->startOfDay();
            $endDate = \Carbon\Carbon::parse($dates[1])->endOfDay();
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }
    }

    $page_data['orders'] = $query->paginate(12)->appends(request()->query());
     $page_data['page_title'] = get_phrase('Order List');

    return view('admin.order.orders', $page_data);
}


    function order_add()
    {
         $page_data['page_title'] = get_phrase('Order Add');
        return view('admin.order.add_order', $page_data);
    }

    function order_store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            'order_period' => 'required',
            'usage_limit' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'orders');
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($request->order_period) {
            $order_period = explode(' - ', $request->order_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($order_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($order_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/order/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/order/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
        }

        Order::insert($data);
        return redirect(route('admin.orders'))->with('success', get_phrase('Order added successfully'));
    }

    function order_details($id)
    {
        $page_data['order'] = Order::where('id', $id)->first();
        $page_data['page_title'] = get_phrase('Order Details');
        return view('admin.order.order_details', $page_data);
    }

    function order_edit($id)
    {
        $page_data['order'] = Order::where('id', $id)->first();
        return view('admin.order.edit_order', $page_data);
    }

    function order_update(Request $request, $id)
    {
        $current_data = Order::where('id', $id)->first();

        $request->validate([
            'title' => 'required|max:255',
            'status' => 'nullable|in:1,0',
            'usage_limit' => 'required|numeric',
            'discount_type' => 'required|in:percentage,flat',
            'discount_value' => 'required|numeric',
        ]);

        $data['title'] = $request->title;
        $data['slug'] = app(CommonController::class)->unique_slug($request->title, 'orders', 'slug', $id);
        $data['discount_type'] = $request->discount_type;
        $data['discount_value'] = $request->discount_value;
        $data['usage_limit'] = $request->usage_limit;
        $data['status'] = $request->status;
        $data['summary'] = $request->summary;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->order_period) {
            $order_period = explode(' - ', $request->order_period);
            $data['start_date'] = date('Y-m-d H:i:s', strtotime($order_period[0]));
            $data['end_date'] = date('Y-m-d H:i:s', strtotime($order_period[1]));
        }

        if ($request->thumbnail) {
            $data['thumbnail'] = app(CommonController::class)->upload($request->thumbnail, 'uploads/order/thumbnail/' . nice_file_name($request->title, $request->thumbnail->extension()), 400);
            remove_file($current_data->thumbnail);
        }

        if ($request->banner) {
            $data['banner'] = app(CommonController::class)->upload($request->banner, 'uploads/order/banner/' . nice_file_name($request->title, $request->banner->extension()), 400);
            remove_file($current_data->banner);
        }

        Order::where('id', $id)->update($data);
        return redirect(route('admin.orders'))->with('success', get_phrase('Order updated successfully'));
    }

    function order_timeline_update(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $order_status_id = $request->order_status_id;

        // Check if the same status is already added
        $existing = Order_update::where('order_id', $id)
                    ->where('order_status_id', $order_status_id)
                    ->first();

        if ($existing) {
            // Optional: Update the existing message (if needed)
            $existing->message = $request->message;
            $existing->user_id = $user_id;
            $existing->updated_at = now();
            $existing->save();
        } else {
            // Insert new status update
            Order_update::create([
                'order_id' => $id,
                'order_status_id' => $order_status_id,
                'user_id' => $user_id,
                'message' => $request->message,
                'created_at' => now()
            ]);
        }

        return redirect()->back()->with('success', 'Order delivery status updated');
    }

    function order_timeline_remove($id)
    {
        Order_update::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Order delivery status removed');
    }

    function order_delete($id)
    {
        $current_data = Order::where('id', $id)->first();
        remove_file($current_data->thumbnail);
        remove_file($current_data->banner);
        Order::where('id', $id)->delete();
        return redirect(route('admin.orders'))->with('success', get_phrase('Order deleted successfully'));
    }
    //Order

    // function order_return_requests()
    // {

    //     $page_data['return_requests'] = Order_return::paginate(10);
    //     return view('admin.order_return.return_requests', $page_data);
    // }

    function order_return_requests()
        {
            $query = Order_return::query();

            //  Filter by Status
            if (request()->filled('status') && request('status') !== 'all') {
                $statusIdentifier = request('status');

                $query->where('status', $statusIdentifier);

            }

            //  Filter by Date Range
            if (request()->filled('created_at')) {
                $dates = explode(' - ', request('created_at'));
                if (count($dates) == 2) {
                    $startDate = \Carbon\Carbon::parse($dates[0])->startOfDay();
                    $endDate = \Carbon\Carbon::parse($dates[1])->endOfDay();
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            }

            $page_data['return_requests'] = $query->paginate(10)->appends(request()->query());
            $page_data['page_title'] = get_phrase('Return Request List ');
            return view('admin.order_return.return_requests', $page_data);
        }


    function order_return_details(Request $request, $id = "")
    {
        $page_data['request_details'] = Order_return::where('id', $id)->first();
        $page_data['page_title'] = get_phrase('Return Details');
        return view('admin.order_return.return_details', $page_data);
    }

    function order_return_refund(Request $request, $id = "")
    {
        // print_r($request->all());
        // die();
        $return_details = Order_return::find($id);

        if ($request->image) {
            $proof = app(CommonController::class)->upload($request->image, 'uploads/order_return/proof/' . nice_file_name('prf-'.$id, $request->image->extension()), 400);
        }

        if($request->refund_by == 'offline'){
            Order_return::where('id', $id)->update([
                'status' => 'approved',
                'refund_by' => 'offline',
                'proof' => $proof
            ]);
        } else {
            $identifier = $return_details->order->payment_method;
            $payment_gateway = Payment_gateway::where('identifier', $identifier)->first();
            $model_name      = $payment_gateway->model_name;
            $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);

            $payment_history = Payment::whereJsonContains('order_id', $return_details->order->id)->first();

            $transaction_keys = $payment_history->payment_details;
            $return_amount = $return_details->order->grand_total;

            $status = $model_full_path::refund_status($transaction_keys, $return_amount);
            if ($status === true) {
                Order_return::where('id', $id)->update([
                    'status' => 'approved',
                    'refund_by' => $identifier
                ]);
            } else {
                return redirect(route('admin.order.return_requests'))->with('error', get_phrase('Payment failed! Please try again.'));
            }
        }
        
        return redirect(route('admin.order.return_requests'))->with('success', get_phrase('Order return request approved'));
    }

    function order_return_request_cancel($id = "")
    {
        Order_return::where('id', $id)->update([
            'status' => 'canceled',
        ]);

        return redirect(route('admin.order.return_requests'))->with('success', get_phrase('Order return request cancelled'));
    }

    //Order status
    function order_statuses()
    {
        $page_data['statuses'] = Order_status::orderBy('sort')->get();
         $page_data['page_title'] = get_phrase('Status List ');
        return view('admin.order_status.order_statuses', $page_data);
    }

    function order_status_sort(Request $request)
    {
        $order_statuses = json_decode($request->itemJSON);
        foreach ($order_statuses as $key => $id) {
            // Update the 'sort' field for each order status
            Order_status::where('id', $id)->update(['sort' => $key + 1]);
        }

        Session::flash('success', get_phrase('Order status sorted successfully'));
    }

    function order_status_add()
    {
        $page_data['page_title'] = get_phrase('Add New Order Status  ');
        return view('admin.order_status.add_order_status', $page_data);
    }

    function order_status_store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);


        $name = $request->name;
        $identifier = strtolower(preg_replace('/\s+/', '_', preg_replace('/[^a-zA-Z0-9 ]/', '', $name)));

        $maxOrder = Order_status::max('sort');

        $orderStatus = Order_status::create([
            'name' => $name,
            'identifier' => $identifier,
            'color' => $request->color,
            'sort' => $maxOrder + 1,
        ]);

        return redirect(route('admin.order.statuses'))->with('success', 'Order status created successfully.');
    }

    function order_status_edit($id)
    {
        $page_data['order_status'] = Order_status::where('id', $id)->first();
        $page_data['page_title'] = get_phrase('Edit new order status ');
        return view('admin.order_status.edit_order_status', $page_data);
    }

    function order_status_update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        // Fetch the current order status
        $orderStatus = Order_status::findOrFail($id);

        // Process the identifier from the name
        $name = $request->name;
        $identifier = strtolower(preg_replace('/\s+/', '_', preg_replace('/[^a-zA-Z0-9 ]/', '', $name)));

        // Update the order status
        $orderStatus->update([
            'name' => $name,
            'identifier' => $identifier,
            'color' => $request->color,
        ]);

        return redirect(route('admin.order.statuses'))->with('success', 'Order status updated successfully.');
    }

    function order_status_delete($id)
    {
        Order_status::where('id', $id)->delete();
        return redirect(route('admin.order.statuses'))->with('success', get_phrase('Order status deleted successfully'));
    }

    // Payment
    function payments()
    {
        $query = Payment::query();

        // Search filter by order_id only
        if (request()->filled('search')) {
            $search = request()->query('search');

            // remove # if user types it (e.g. "#105")
            $cleanSearch = ltrim($search, '#');

            if (is_numeric($cleanSearch)) {
                $num = (int)$cleanSearch;

                // If user typed "102" → assume UI ID (>=100) → convert back to DB ID
                if ($num > 100) {
                    $orderId = $num - 100;
                } else {
                    // Otherwise, treat as direct DB ID
                    $orderId = $num;
                }

                // Match inside string "[1,2]" → must include quotes to avoid false matches
                $query->where('order_id', 'LIKE', '%'.$orderId.'%');
            }
        }

        //  Filter by date range
            if (request()->filled('created_at')) {
                $dates = explode(' - ', request('created_at'));
                if (count($dates) == 2) {
                    $startDate = \Carbon\Carbon::parse($dates[0])->startOfDay();
                    $endDate = \Carbon\Carbon::parse($dates[1])->endOfDay();
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            }

            //  Filter by Status
            if (request()->filled('status') && request('status') !== 'all') {
                $statusIdentifier = request('status');

                $query->where('status', $statusIdentifier);

            }

        $page_data['payments'] = $query->paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase(' Payment List  ');

        return view('admin.payment.payments', $page_data);
    }

    function payment_store() {}

    function payment_delete($id)
    {
        Payment::where('id', $id)->delete();
        return redirect(route('admin.payments'))->with('success', get_phrase('Payment history deleted successfully'));
    }

    function payment_invoice($id)
    {
        $page_data['payment'] = Payment::where('id', $id)->firstOrNew(); 
        return view('admin.payment.invoice', $page_data);
    }

    function payments_offline_request(Request $request)
    {
        $page_data['payments'] = Payment::where('payment_method', 'offline')
            ->where('status', '!=', 'paid')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->appends($request->query());
         $page_data['page_title'] = get_phrase('Offline Payment   ');
        return view('admin.payment.offline_requests', $page_data);
    }

    function payment_offline_status(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|in:paid,unpaid',
        ]);
        // Find the payment record
        $payment = Payment::findOrFail($id);
        // Update the payment status
        $payment->status = $request->status;
        $payment->save();
        // Redirect back with success message
        return redirect()->back()->with('success', get_phrase('Payment status updated successfully'));
    }
    // Payment


    //Shipping zone
    function shipping_zones()
    {
        $page_data['shipping_zones'] = Shipping_zone::paginate(12)->appends(request()->query());
        $page_data['page_title'] = get_phrase('Shipping Zones ');
        return view('admin.shipping_zone.shipping_zones', $page_data);
    }

    function shipping_zone_add()
    {
        $page_data['page_title'] = get_phrase(' Add new shipping zone ');
        return view('admin.shipping_zone.shipping_zone_add', $page_data);
    }

    function shipping_zone_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_ids' => 'required',
        ]);


        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['created_at'] = date('Y-m-d H:i:s');

        $shipping_zone_id = Shipping_zone::insertGetId($data);

        foreach ($request->country_ids as $country_id) {
            Shipping_zone_region::insert(['shipping_zone_id' => $shipping_zone_id, 'country_id' => $country_id]);
        }

        return redirect(route('admin.shipping_zones'))->with('success', get_phrase('Shipping zone added successfully'));
    }

    function shipping_zone_edit($id)
    {
        $page_data['shipping_zone'] = Shipping_zone::where('id', $id)->first();
         $page_data['page_title'] = get_phrase(' Edit new shipping zone  ');
        return view('admin.shipping_zone.shipping_zone_edit', $page_data);
    }

    function shipping_zone_update(Request $request, $id)
    {
        $current_data = Shipping_zone::where('id', $id)->first();

        $request->validate([
            'name' => 'required|max:255',
            'country_ids' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Shipping_zone::where('id', $id)->update($data);

        $current_countries = $current_data->regions->pluck('country_id')->toArray();
        $updated_countries = $request->country_ids;

        foreach ($updated_countries as $country_id) {
            if (!in_array($country_id, $current_countries)) {
                Shipping_zone_region::insert(['shipping_zone_id' => $current_data->id, 'country_id' => $country_id]);
            }
        }

        foreach ($current_countries as $country_id) {
            if (!in_array($country_id, $updated_countries)) {
                Shipping_zone_region::where('shipping_zone_id', $current_data->id)->where('country_id', $country_id)->delete();
            }
        }

        return redirect(route('admin.shipping_zones'))->with('success', get_phrase('Shipping zone updated successfully'));
    }

    function shipping_zone_delete($id)
    {
        $current_data = Shipping_zone::where('id', $id)->first();

        Shipping_zone::where('id', $id)->delete();
        $current_data->regions()->delete();

        return redirect(route('admin.shipping_zones'))->with('success', get_phrase('Shipping zone deleted successfully'));
    }
    //Shipping zone


    //Shipping rule
    function shipping_rules()
    {
        $page_data['shipping_rules'] = Shipping_rule::paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase(' Shipping Rules ');
        return view('admin.shipping_rule.shipping_rules', $page_data);
    }

    function shipping_rule_add()
    {
         $page_data['page_title'] = get_phrase('Add new shipping rule  ');
        return view('admin.shipping_rule.shipping_rule_add' , $page_data);
    }

    function shipping_rule_store(Request $request)
    {
        $request->validate([
            'shipping_zone_id'   => 'required|exists:App\Models\Shipping_zone,id',
            'min_weight'   => 'nullable|min:0',
            'max_weight'   => 'nullable|min:0',
            'min_price'   => 'nullable|min:0',
            'max_price'   => 'nullable|min:0',
            'cost_type'   => 'required|in:flat,percentage',
            'cost'   => 'nullable|min:0',
        ]);

        $data['shipping_zone_id'] = $request->shipping_zone_id;
        $data['min_weight'] = $request->min_weight;
        $data['max_weight'] = $request->max_weight;
        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['cost_type'] = $request->cost_type;
        $data['cost'] = $request->cost;
        $data['created_at'] = date('Y-m-d H:i:s');

        Shipping_rule::insertGetId($data);

        return redirect(route('admin.shipping_rules'))->with('success', get_phrase('Shipping rule added successfully'));
    }

    function shipping_rule_edit($id)
    {
        $page_data['shipping_rule'] = Shipping_rule::where('id', $id)->first();
         $page_data['page_title'] = get_phrase(' Edit new shipping rule  ');
        return view('admin.shipping_rule.shipping_rule_edit', $page_data);
    }

    function shipping_rule_update(Request $request, $id)
    {
        $current_data = Shipping_rule::where('id', $id)->first();

        $request->validate([
            'shipping_zone_id'   => 'required|exists:App\Models\Shipping_zone,id',
            'min_weight'   => 'nullable|min:0',
            'max_weight'   => 'nullable|min:0',
            'min_price'   => 'nullable|min:0',
            'max_price'   => 'nullable|min:0',
            'cost_type'   => 'required|in:flat,percentage',
            'cost'   => 'nullable|min:0',
        ]);

        $data['shipping_zone_id'] = $request->shipping_zone_id;
        $data['min_weight'] = $request->min_weight;
        $data['max_weight'] = $request->max_weight;
        $data['min_price'] = $request->min_price;
        $data['max_price'] = $request->max_price;
        $data['cost_type'] = $request->cost_type;
        $data['cost'] = $request->cost;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Shipping_rule::where('id', $id)->update($data);

        return redirect(route('admin.shipping_rules'))->with('success', get_phrase('Shipping rule updated successfully'));
    }

    function shipping_rule_delete($id)
    {
        Shipping_rule::where('id', $id)->delete();
        return redirect(route('admin.shipping_rules'))->with('success', get_phrase('Shipping rule deleted successfully'));
    }
    //Shipping rule


    //Shipping carrier
    function shipping_carriers()
    {
        $page_data['shipping_carriers'] = Shipping_carrier::paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase('Shipping carrier List  ');
        return view('admin.shipping_carrier.shipping_carriers', $page_data);
    }

    function shipping_carrier_add()
    {
         $page_data['page_title'] = get_phrase(' Shipping carrier add ');
        return view('admin.shipping_carrier.shipping_carrier_add', $page_data);
    }

    function shipping_carrier_store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');

        Shipping_carrier::insert($data);
        return redirect(route('admin.shipping_carriers'))->with('success', get_phrase('Shipping carrier added successfully'));
    }

    function shipping_carrier_edit($id)
    {
        $page_data['shipping_carrier'] = Shipping_carrier::where('id', $id)->first();
         $page_data['page_title'] = get_phrase('Shipping carrier Edit  ');
        return view('admin.shipping_carrier.shipping_carrier_edit', $page_data);
    }

    function shipping_carrier_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $data['name'] = $request->name;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Shipping_carrier::where('id', $id)->update($data);
        return redirect(route('admin.shipping_carriers'))->with('success', get_phrase('Shipping carrier updated successfully'));
    }

    function shipping_carrier_delete($id)
    {
        Shipping_carrier::where('id', $id)->delete();
        return redirect(route('admin.shipping_carriers'))->with('success', get_phrase('Shipping carrier deleted successfully'));
    }
    //Shipping carrier


    // Message
    function messages(Request $request, $thread_id = "")
    {
        if ($thread_id) {
            $page_data['thread_details'] = Message_thread::where('id', $thread_id)->firstOrNew();
        } else {
            $page_data['thread_details'] = Message_thread::orderBy('updated_at', 'desc')->firstOrNew();
        }

        //mark as read
        Message::where('message_thread_id', $page_data['thread_details']->id)->where('read_status', '!=', 1)->update(['read_status' => 1]);
         $page_data['page_title'] = get_phrase('Message');

        return view('admin.message.messages', $page_data);
    }

    public function message_store(Request $request)
    {
        $validated = $request->validate([
            'message'     => 'required',
            'sender_id'   => 'required|integer|exists:App\Models\User,id',
            'receiver_id' => 'required|integer|exists:App\Models\User,id',
            'message_thread_id'   => 'required|integer',
        ]);

        $data['message']     = $request->message;
        $data['sender_id']   = $request->sender_id;
        $data['receiver_id'] = $request->receiver_id;
        $data['message_thread_id']   = $request->message_thread_id;
        $data['read_status'] = 0;
        $data['created_at']  = date('Y-m-d H:i:s');

        Message::insert($data);
        Message_thread::where('id', $request->message_thread_id)->update(['updated_at' => date('Y-m-d H:i:s')]);

        return redirect(route('admin.messages', ['thread_id' => $request->message_thread_id]))->with('success', get_phrase('Your message successfully has been sent'));
    }

    public function message_thread_store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|integer|exists:App\Models\User,id',
        ]);

        $auth       = auth()->user()->id;
        $user_id    = $request->receiver_id;
        $has_thread = Message_thread::where(function ($query) use ($auth, $user_id) {
            $query->where('user_one', $auth)->where('user_two', $user_id);
        })
            ->orWhere(function ($query) use ($auth, $user_id) {
                $query->where('user_one', $user_id)->where('user_two', $auth);
            })
            ->first();

        if (!$has_thread) {
            $data['user_one'] = auth()->user()->id;
            $data['user_two'] = $request->receiver_id;
            $data['created_at']  = date('Y-m-d H:i:s');
            $thread_id = Message_thread::insertGetId($data);
            return redirect(route('admin.messages', ['thread_id' => $thread_id]))->with('success', get_phrase('Message thread successfully created'));
        } else {
            $thread_id = $has_thread->id;
        }
        return redirect(route('admin.messages', ['thread_id' => $thread_id]));
    }

    // Message



    // Contact us
    function contacts()
    {
        Contact::where('is_read', 0)->update(['is_read' => 1]);
        $page_data['contacts'] = Contact::orderBy('created_at', 'desc')->paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase('Contact List  ');
        return view('admin.contact.contacts', $page_data);
    }

    function contact_delete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect(route('admin.contacts'))->with('success', get_phrase('Contact deleted successfully'));
    }
    // Contact us ended

    // Contact settings
    function contact_settings()
    {
         $page_data['page_title'] = get_phrase('Contact Settings  ');
        return view('admin.contact.contact_settings', $page_data);
    }

    function contact_settings_update(Request $request)
    {
        $all_data = $request->all();

        $request->validate([
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|max:255',
            'contact_message' => 'required|max:400',
            'contact_address' => 'required|max:300',
        ]);

        foreach ($all_data as $key => $value) {
            if (Setting::where('type', $key)->count() == 0) {
                Setting::insert(['type' => $key, 'description' => $value]);
            } else {
                Setting::where('type', $key)->update(['description' => $value]);
            }
        }

        return redirect(route('admin.contact.settings'))->with('success', get_phrase('Contact settings updated successfully'));
    }
    // Contact settings


    //Language
    function languages()
    {
        $page_data['languages'] = Language::paginate(12)->appends(request()->query());
         $page_data['page_title'] = get_phrase('Language List ');
        return view('admin.language.languages', $page_data);
    }

    function language_add()
    {
         $page_data['page_title'] = get_phrase('Language Add ');
        return view('admin.language.language_add', $page_data);
    }

    function language_store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'direction' => 'required|in:rtl,ltr',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'languages');
        $data['direction'] = $request->direction;
        $data['created_at'] = date('Y-m-d H:i:s');

        Language::insert($data);
        return redirect(route('admin.languages'))->with('success', get_phrase('Language added successfully'));
    }

    function language_edit($id)
    {
        $page_data['language'] = Language::where('id', $id)->first();
         $page_data['page_title'] = get_phrase('Language Edit ');
        return view('admin.language.language_edit', $page_data);
    }

    function language_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'direction' => 'required|in:rtl,ltr',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = app(CommonController::class)->unique_slug($request->name, 'languages', 'slug', $id);
        $data['direction'] = $request->direction;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Language::where('id', $id)->update($data);
        return redirect(route('admin.languages'))->with('success', get_phrase('Language updated successfully'));
    }

    function language_delete($id)
    {
        Language::where('id', $id)->delete();
        return redirect(route('admin.languages'))->with('success', get_phrase('Language deleted successfully'));
    }

    function language_phrases_edit($id)
    {
        $page_data['language'] = Language::where('id', $id)->first();
        $page_data['language_phrases'] = Language_phrase::where('language_id', $id)->get();
          $page_data['page_title'] = get_phrase(' Edit language phrases ');
        return view('admin.language.language_phrases_edit', $page_data);
    }

    function language_phrase_update(Request $request, $id)
    {
        $request->validate([
            'translated_phrase' => 'required',
        ]);

        $data['translated'] = $request->translated_phrase;
        $data['updated_at'] = date('Y-m-d H:i:s');

        $updatedRows = Language_phrase::where('id', $id)->update($data);
        if ($updatedRows > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    //Language

    function system_settings()
    {
         $page_data['page_title'] = get_phrase('System Settings  ');
        return view('admin.settings.system_settings', $page_data);
    }

    function system_settings_update(Request $request)
    {
        $all_data = $request->all();
        unset($all_data['_token']);

        $request->validate([
            'system_name' => 'required|max:255',
            'system_title' => 'required|max:255',
            'system_email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'summary' => 'required',

            'contact_facebook' => 'required',
            'contact_twitter' => 'required',
            'contact_linkedin' => 'required',
            'contact_instagram' => 'required',

            'address' => 'required|max:400',
            'active_lan_id' => 'required|numeric|min:1',
            'company_name' => 'nullable|max:255',
            'company_website_link' => 'nullable|max:300',

            'signup_email_verification' => 'required'

        ]);

        foreach ($all_data as $key => $value) {
            if (Setting::where('type', $key)->count() == 0) {
                Setting::insert(['type' => $key, 'description' => $value]);
            } else {
                Setting::where('type', $key)->update(['description' => $value]);
            }
        }

        return redirect(route('admin.system.settings'))->with('success', get_phrase('Settings data updated successfully'));
    }

    function website_settings()
    {
         $page_data['page_title'] = get_phrase('Website Settings');
        return view('admin.settings.website_settings', $page_data);
    }

    function website_settings_update(Request $request)
    {
        $all_data = $request->all();
        unset($all_data['_token']);

        $request->validate([
            'banner_title' => 'required|max:255',
            'banner_subtitle' => 'required|max:255'
        ]);

        foreach ($all_data as $key => $value) {
            if (Frontend_setting::where('type', $key)->count() == 0) {
                Frontend_setting::insert(['type' => $key, 'description' => $value]);
            } else {
                Frontend_setting::where('type', $key)->update(['description' => $value]);
            }
        }

        return redirect(route('admin.website.settings'))->with('success', get_phrase('Website setting data updated successfully'));
    }

    function website_settings_logo_update(Request $request)
    {
        $all_data = $request->all();
        unset($all_data['_token']);

        foreach ($all_data as $key => $value) {
            if ($key == 'banner_image') {
                $file_path = app(CommonController::class)->upload($request->$key, 'uploads/system', 1500);
            } else {
                $file_path = app(CommonController::class)->upload($request->$key, 'uploads/system', 300);
            }

            if (Frontend_setting::where('type', $key)->count() == 0) {
                Frontend_setting::insert(['type' => $key, 'description' => $file_path]);
            } else {
                remove_file(get_frontend_settings($key));
                Frontend_setting::where('type', $key)->update(['description' => $file_path]);
            }
            return redirect(route('admin.website.settings', ['tab' => 'website-logo']))->with('success', get_phrase('Website logo updated successfully'));
        }
        return redirect(route('admin.website.settings', ['tab' => 'website-logo']))->with('error', get_phrase('File is required'));
    }

    function website_policies_update(Request $request)
    {
        $all_data = $request->all();
        unset($all_data['_token']);

        $request->validate([
            'privacy_policy' => 'required',
        ]);

        foreach ($all_data as $key => $value) {
            if (Frontend_setting::where('type', $key)->count() == 0) {
                Frontend_setting::insert(['type' => $key, 'description' => $value]);
            } else {
                Frontend_setting::where('type', $key)->update(['description' => $value]);
            }
        }

        return redirect(route('admin.website.settings', ['tab' => 'website-policy']))->with('success', get_phrase('Website policies updated successfully'));
    }

    //Theme
    function themes()
    {
        $theme_data['themes'] = Theme::paginate(30)->appends(request()->query());
        $theme_data['page_title'] = get_phrase(' Theme List ');
        return view('admin.theme.themes', $theme_data);
    }
    


    function theme_status($id)
    {
        $query = Theme::where('id', $id);
        if ($query->first()->status == 1) {
            $query->update(['status' => 0]);
            $response = [
                'success' => get_phrase('Theme deactivated')
            ];
        } else {
            $query->update(['status' => 1]);
            $response = [
                'success' => get_phrase('Theme activated')
            ];
        }
        Theme::where('id', '!=', $id)->update(['status' => 0]);


        return json_encode($response);
    }

    function theme_edit($id)
    {
        $theme_data['theme'] = Theme::where('id', $id)->first();
         $theme_data['page_title'] = get_phrase(' Theme Edit ');
        return view('admin.theme.theme_edit', $theme_data);
    }

    

    public function theme_update(Request $request, $id)
    {
        $request->validate([
            'general' => 'required|array',
            'topbar' => 'required|array',
            'header' => 'required|array',
            'page_title' => 'required|array',
            'primary_button' => 'required|array',
            'secondary_button' => 'required|array',
            'filter' => 'required|array',
            'theme_button' => 'required|array'
        ]);

        $data['general'] = json_encode($request->general, JSON_UNESCAPED_UNICODE);
        $data['topbar'] = json_encode($request->topbar, JSON_UNESCAPED_UNICODE);
        $data['header'] = json_encode($request->header, JSON_UNESCAPED_UNICODE);
        $data['page_title'] = json_encode($request->page_title, JSON_UNESCAPED_UNICODE);
        $data['primary_button'] = json_encode($request->primary_button, JSON_UNESCAPED_UNICODE);
        $data['secondary_button'] = json_encode($request->secondary_button, JSON_UNESCAPED_UNICODE);
        $data['filter'] = json_encode($request->filter, JSON_UNESCAPED_UNICODE);
        $data['body'] = json_encode($request->body, JSON_UNESCAPED_UNICODE);
        $data['theme_button'] = json_encode($request->theme_button, JSON_UNESCAPED_UNICODE);
        $data['updated_at'] = now();

        Theme::where('id', $id)->update($data);

        return redirect(route('admin.themes'))->with('success', get_phrase('Theme updated successfully'));
    }
    //Page

    function smtp_settings()
    {
         $page_data['page_title'] = get_phrase('SMTP Settings ');
        return view('admin.settings.smtp_settings', $page_data);
    }

    function smtp_settings_update(Request $request)
    {
        $all_data = $request->all();
        unset($all_data['_token']);

        $request->validate([
            'smtp_host' => 'required|max:300',
            'smtp_port' => 'required|max:255',
            'smtp_from_email' => 'required',
            'smtp_user' => 'required',
            'smtp_pass' => 'required',
        ]);

        foreach ($all_data as $key => $value) {
            if (Setting::where('type', $key)->count() == 0) {
                Setting::insert(['type' => $key, 'description' => $value]);
            } else {
                Setting::where('type', $key)->update(['description' => $value]);
            }
        }

        return redirect(route('admin.smtp.settings'))->with('success', get_phrase('SMTP Settings updated successfully'));
    }



    function seo_settings($active_tab = "")
    {
        $page_data['seo_fields'] = Seo_field::where('item_table', null)->get();
        $page_data['active_tab'] = !empty($active_tab) ? slugify($active_tab) : 'home';
         $page_data['page_title'] = get_phrase('SEO Settings ');
        return view('admin.settings.seo_settings', $page_data);
    }

    function seo_settings_update(Request $request, $id)
    {
        if (!empty($request->all())) {
            $seo_field = Seo_field::where('id', $id)->first();
            $seo_field->meta_title = $request->meta_title;
            $seo_field->meta_keywords = $request->meta_keywords;
            $seo_field->meta_description = $request->meta_description;
            $seo_field->meta_robot = $request->meta_robot;
            $seo_field->canonical_url = $request->canonical_url;
            $seo_field->custom_url = $request->custom_url;
            $seo_field->og_title = $request->og_title;
            $seo_field->og_description = $request->og_description;
            $seo_field->json_ld = $request->json_ld;

           if (isset($request->og_image)) {
                // Delete old image if exists
                if (!empty($seo_field->og_image)) {
                    remove_file($seo_field->og_image);
                }
                $originalFileName = $seo_field->id . '-' . $request->og_image->getClientOriginalName();
                // Upload new image
                $file_path = app(CommonController::class)->upload(
                    $request->og_image,
                    'uploads/seo-content/' . $originalFileName,
                    600
                );
                // Save new image path
                $seo_field->og_image = $file_path;
            }

            $seo_field->save();

            return redirect(route('admin.seo.settings', ['active_tab' => $seo_field->route]))->with('success', 'SEO updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Seo update failed');
        }
    }


    public function about()
    {
        $purchase_code    = get_settings('purchase_code');
        $returnable_array = array(
            'purchase_code_status' => get_phrase('Not found'),
            'support_expiry_date'  => get_phrase('Not found'),
            'customer_name'        => get_phrase('Not found'),
        );

        $personal_token = "gC0J1ZpY53kRpynNe4g2rWT5s4MW56Zg";
        $url            = "https://api.envato.com/v3/market/author/sale?code=" . $purchase_code;
        $curl           = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:' . $purchase_code . '.json';
        $ch_verify  = curl_init($verify_url . '?code=' . $purchase_code);

        curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec($ch_verify);
        curl_close($ch_verify);

        $response = json_decode($cinit_verify_data, true);

        if (is_array($response) && isset($response['verify-purchase']) && count($response['verify-purchase']) > 0) {

            $item_name     = $response['verify-purchase']['item_name'];
            $purchase_time = $response['verify-purchase']['created_at'];
            $customer      = $response['verify-purchase']['buyer'];
            $licence_type  = $response['verify-purchase']['licence'];
            $support_until = $response['verify-purchase']['supported_until'];
            $customer      = $response['verify-purchase']['buyer'];

            $purchase_date = date("d M, Y", strtotime($purchase_time));

            $todays_timestamp         = strtotime(date("d M, Y"));
            $support_expiry_timestamp = strtotime($support_until);

            $support_expiry_date = date("d M, Y", $support_expiry_timestamp);

            if ($todays_timestamp > $support_expiry_timestamp) {
                $support_status = 'expired';
            } else {
                $support_status = 'valid';
            }

            $returnable_array = array(
                'purchase_code_status' => $support_status,
                'support_expiry_date'  => $support_expiry_date,
                'customer_name'        => $customer,
                'product_license'      => 'valid',
                'license_type'         => $licence_type,
            );
        } else {
            $returnable_array = array(
                'purchase_code_status' => 'invalid',
                'support_expiry_date'  => 'invalid',
                'customer_name'        => 'invalid',
                'product_license'      => 'invalid',
                'license_type'         => 'invalid',
            );
        }

        $data['application_details'] = $returnable_array;
         $data['page_title'] = get_phrase('System information ');
        return view('admin.settings.about', $data);
    }

    function save_valid_purchase_code($action_type, Request $request)
    {
        if ($action_type == 'update') {
            $data['description'] = $request->purchase_code;

            $status = $this->curl_request($data['description']);
            if ($status) {
                Setting::where('type', 'purchase_code')->update($data);
                session()->flash('success', get_phrase('Purchase code has been updated'));
                echo 1;
            } else {
                echo 0;
            }
        } else {
            return view('admin.settings.save_purchase_code');
        }
    }

    function curl_request($code = '')
    {
        $purchase_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url            = "https://api.envato.com/v3/market/author/sale?code=" . $purchase_code;
        $curl           = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:' . $purchase_code . '.json';
        $ch_verify  = curl_init($verify_url . '?code=' . $purchase_code);

        curl_setopt($ch_verify, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch_verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch_verify, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_verify, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec($ch_verify);
        curl_close($ch_verify);

        $response = json_decode($cinit_verify_data, true);

        if (is_array($response) && count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Profile
    function profile()
    {
        $page_data['user'] = User::where('id', Auth()->user()->id)->first();
         $page_data['page_title'] = get_phrase('Profile');
        return view('admin.profile.profile', $page_data);
    }

    function profile_update(Request $request)
    {
        $current_data = auth()->user();
        $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|unique:users,email,$current_data->id",
            'phone' => "required",
            'gender' => "in:male,female",
            'date_of_birth' => "date|date_format:Y-m-d",
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['city_id'] = $request->city_id;
        $data['zip'] = $request->zip;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = date('Y-m-d H:i:s', strtotime($request->date_of_birth));
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($request->photo) {
            $data['photo'] = app(CommonController::class)->upload($request->photo, 'uploads/user/' . nice_file_name($request->name, $request->photo->extension()), 400);
            remove_file($current_data->photo);
        }

        User::where('id', $current_data->id)->update($data);
        return redirect(route('admin.profile'))->with('success', get_phrase('Profile updated successfully'));
    }

    function profile_password_update(Request $request)
    {
        $request->validate([
            'current_password' => 'required|max:50',
            'new_password' => 'required|max:50',
            'confirm_password' => 'required|max:50',
        ]);

        $old_pass_check = Auth::attempt(['email' => auth()->user()->email, 'password' => $request->current_password]);

        if (!$old_pass_check) {
            return redirect(route('admin.profile'))->with('error', 'Current password is wrong');
        }

        if ($request->new_password != $request->confirm_password) {
            return redirect(route('admin.profile'))->with('error', 'Confirm password is not matched with the new password');
        }

        $password = Hash::make($request->new_password);
        User::where('id', auth()->user()->id)->update(['password' => $password]);

        return redirect(route('admin.profile'))->with('success', get_phrase('Password changed successfully'));
    }

    public function payment_settings()
    {
         $page_data['page_title'] = get_phrase('Payment Settings');
        return view("admin.settings.payment_setting", $page_data);
    }

    public function payment_settings_update(Request $request)
    {
        $data = $request->all();
        array_shift($data);

        if ($request->top_part == 'top_part') {
            foreach ($data as $key => $item) {
                Setting::where('type', $key)->update(['description' => $item]);
            }
        } else {
            if ($request->identifier == 'paypal') {
                $paypal = [
                    'sandbox_client_id' => $data['sandbox_client_id'],
                    'sandbox_secret_key' => $data['sandbox_secret_key'],
                    'production_client_id' => $data['production_client_id'],
                    'production_secret_key' => $data['production_secret_key'],
                ];
                $paypal = json_encode($paypal);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $paypal;
            } elseif ($request->identifier == 'stripe') {
                $stripe = [
                    'public_key' => $data['public_key'],
                    'secret_key' => $data['secret_key'],
                    'public_live_key' => $data['public_live_key'],
                    'secret_live_key' => $data['secret_live_key'],
                ];
                $stripe = json_encode($stripe);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $stripe;
            } elseif ($request->identifier == 'razorpay') {
                $razorpay = [
                    'public_key' => $data['public_key'],
                    'secret_key' => $data['secret_key'],

                ];
                $razorpay = json_encode($razorpay);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $razorpay;
            } elseif ($request->identifier == 'flutterwave') {
                $flutterwave = [
                    'public_key' => $data['public_key'],
                    'secret_key' => $data['secret_key'],
                    'public_live_key' => $data['public_live_key'],
                    'secret_live_key' => $data['secret_live_key'],
                ];
                $flutterwave = json_encode($flutterwave);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $flutterwave;
            } elseif ($request->identifier == 'paytm') {
                $paytm = [
                    'paytm_merchant_key' => $data['paytm_merchant_key'] ?? '',
                    'paytm_merchant_mid' => $data['paytm_merchant_mid'] ?? '',
                    'paytm_merchant_website' => $data['paytm_merchant_website'] ?? '',
                    'industry_type_id' => $data['industry_type_id'] ?? '',
                    'channel_id' => $data['channel_id'] ?? '',
                ];
                $paytm = json_encode($paytm);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $paytm;
            } elseif ($request->identifier == 'offline') {
                $offline = [
                    'bank_information' => $data['bank_information'],

                ];
                $offline = json_encode($offline);
                $data = array_splice($data, 0, 4);

                $data['keys'] = $offline;
                unset($data['bank_information']);
            } elseif ($request->identifier == 'paystack') {
                $paystack = [
                    'secret_test_key' => $data['secret_test_key'],
                    'public_test_key' => $data['public_test_key'],
                    'secret_live_key' => $data['secret_live_key'],
                    'public_live_key' => $data['public_live_key'],
                ];
                $paystack = json_encode($paystack);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $paystack;
            } elseif ($request->identifier == 'ccavenue') {
                $ccavenue = [
                    'ccavenue_merchant_id' => $data['ccavenue_merchant_id'],
                    'ccavenue_working_key' => $data['ccavenue_working_key'],
                    'ccavenue_access_code' => $data['ccavenue_access_code'],
                ];
                $ccavenue = json_encode($ccavenue);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $ccavenue;
            } elseif ($request->identifier == 'pagseguro') {
                $pagseguro = [
                    'api_key' => $data['api_key'],
                    'secret_key' => $data['secret_key'],
                    'other_parameter' => $data['other_parameter'],
                ];
                $pagseguro = json_encode($pagseguro);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $pagseguro;
            } elseif ($request->identifier == 'iyzico') {
                $iyzico = [
                    'api_test_key' => $data['api_test_key'],
                    'secret_test_key' => $data['secret_test_key'],
                    'api_live_key' => $data['api_live_key'],
                    'secret_live_key' => $data['secret_live_key'],
                ];
                $iyzico = json_encode($iyzico);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $iyzico;
            } elseif ($request->identifier == 'xendit') {
                $xendit = [
                    'api_key' => $data['api_key'],
                    'secret_key' => $data['secret_key'],
                    'other_parameter' => $data['other_parameter'],
                ];
                $xendit = json_encode($xendit);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $xendit;
            } elseif ($request->identifier == 'payu') {
                $payu = [
                    'pos_id' => $data['pos_id'],
                    'second_key' => $data['second_key'],
                    'client_id' => $data['client_id'],
                    'client_secret' => $data['client_secret'],
                ];
                $payu = json_encode($payu);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $payu;
            } elseif ($request->identifier == 'skrill') {
                $skrill = [
                    'skrill_merchant_email' => $data['skrill_merchant_email'],
                    'secret_passphrase' => $data['secret_passphrase']
                ];
                $skrill = json_encode($skrill);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $skrill;
            } elseif ($request->identifier == 'doku') {
                $doku = [
                    'client_id' => $data['client_id'] ?? '',
                    'secret_test_key' => $data['secret_test_key'] ?? '',
                    'public_test_key' => $data['public_test_key'] ?? '',
                    'secret_live_key' => $data['secret_live_key'] ?? '',
                    'public_live_key' => $data['public_live_key'] ?? ''
                ];
                $doku = json_encode($doku);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $doku;
            } elseif ($request->identifier == 'maxicash') {
                $maxicash = [
                    'merchant_id' => $data['merchant_id'],
                    'merchant_password' => $data['merchant_password']
                ];
                $maxicash = json_encode($maxicash);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $maxicash;
            } elseif ($request->identifier == 'cashfree') {
                $cashfree = [
                    'client_id' => $data['client_id'],
                    'client_secret' => $data['client_secret']
                ];
                $cashfree = json_encode($cashfree);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $cashfree;
            } elseif ($request->identifier == 'aamarpay') {
                $aamarpay = [
                    'store_id' => $data['store_id'],
                    'signature_key' => $data['signature_key'],
                    'store_live_id' => $data['store_live_id'],
                    'signature_live_key' => $data['signature_live_key']
                ];
                $aamarpay = json_encode($aamarpay);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $aamarpay;
            } elseif ($request->identifier == 'tazapay') {
                $tazapay = [
                    'public_key' => $data['public_key'],
                    'api_key' => $data['api_key'],
                    'api_secret' => $data['api_secret']
                ];
                $tazapay = json_encode($tazapay);
                $data = array_splice($data, 0, 4);
                $data['keys'] = $tazapay;
            } elseif ($request->identifier == 'sslcommerz') {
                $sslcommerz = [
                    'store_key'      => $data['store_key'],
                    'store_password'      => $data['store_password'],
                    'store_live_key'      => $data['store_live_key'],
                    'store_live_password'      => $data['store_live_password'],
                    'sslcz_testmode'      => $data['sslcz_testmode'],
                    'store_live_password'      => $data['store_live_password'],
                    'is_localhost'      => $data['is_localhost'],
                    'sslcz_live_testmode'      => $data['sslcz_live_testmode'],
                    'is_live_localhost'      => $data['is_live_localhost']
                ];
                $sslcommerz       = json_encode($sslcommerz);
                $data         = array_splice($data, 0, 4);
                $data['keys'] = $sslcommerz;
            }

            Payment_gateway::where('identifier', $request->identifier)->update($data);
        }

        Session::flash('success', get_phrase('Payment settings update successfully'));
        return redirect(route('admin.payment.settings', ['tab' => $request->identifier]));
    }


    
    function download_invoice($id) {
            $order = Order::with('order_items.product')->findOrFail($id);

        if (request()->has('download') && request('download') == 'pdf') {
            $pdf = Pdf::loadView('admin.order.invoice', ['order' => $order]);
            $fileName = 'invoice_' . $order->id . '.pdf';
            return $pdf->download($fileName);
        }
        return view('admin.order.invoice', compact('order'));
    }


    public function vendor_application()
    {
          $page_data['page_title'] = get_phrase('Application List ');
        return view('admin.store.application', $page_data);
    }

  

    public function vendor_application_approve($id)
    {
        $query = Application::where('id', $id);
        $application = $query->first();

        if (!$application) {
            Session::flash('error', get_phrase('Application not found'));
            return redirect()->back();
        }

        // Approve the application
        $update_status = $query->update(['status' => 1]);

        if ($update_status) {

            // Mark user as vendor
            $user = User::find($application->user_id);
            if ($user) {
                $user->update(['is_vendor' => 1]);
            }

            // Create or update store record
            $store = Store::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name'        => $application->store_name,
                    'slug'        => app(CommonController::class)->unique_slug($application->store_name, 'stores'),
                    'address'     => null,
                    'city'        => null,
                    'state'       => null,
                    'country'     => null,
                    'phone'       => $application->phone,
                    'description' => $application->store_description,
                    'created_at'  => now(),
                ]
            );

            // Create or update store settings with default/null values
            $store->settings()->firstOrCreate([], [
                'currency'       => get_settings('system_currency'),
                'vat_type'       => 'percentage',
                'vat_value'      => 0,
                'shipping_cost'  => 0,
                'timezone'       => 'UTC',
                'store_email'    => $user->email ?? null,
                'support_phone'  => $application->phone,
                'facebook_url'   => null,
                'instagram_url'  => null,
                'twitter_url'    => null,
            ]);

            Session::flash('success', get_phrase('Application approved successfully and vendor store created.'));
        }

        return redirect()->back();
    }


    public function vendor_application_delete($id)
    {
        Application::where('id', $id)->delete();
        Session::flash('success', get_phrase('Application delete successfully'));
        return redirect()->back();
    }








}


