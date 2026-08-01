<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        $page_data['blogs'] = Blog::where('status', 1)->paginate(12);
        return view('frontend.blog.index', $page_data);
    }

    function blog_details($slug = ""){

        // Fetch the details of the blog using the slug
        $page_data['blog_details'] = Blog::where('slug', $slug)->firstOrFail();

        // Fetch the category of the selected blog
        if ($page_data['blog_details']) {
            $category = $page_data['blog_details']->category;

            // Fetch 3 random blogs from the same category
            $page_data['related_blogs'] = Blog::where('blog_category_id', $category->id)
                                            ->where('slug', '!=', $slug) // Exclude the current blog
                                            ->inRandomOrder()
                                            ->take(3)
                                            ->get();
        } else {
            $page_data['related_blogs'] = [];
        }
        return view('frontend.blog.blog_details', $page_data);
    }
}
