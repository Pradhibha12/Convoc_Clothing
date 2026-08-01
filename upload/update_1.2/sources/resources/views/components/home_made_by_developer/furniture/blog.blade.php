{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Blog Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-40px">
                    <h1 class="fsp-title-40px text-center wow animate__fadeInUp builder-editable" builder-identity="FB1"  data-wow-delay=".1s">{{get_phrase('Our Blog')}}</h1>
                </div>
            </div>
        </div>
        <div class="row  gy-4 section-margin wow animate__fadeInUp" data-wow-delay=".2s">
             @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(3) as $blog)
            @php 
             $category = App\Models\Blog_category::where('id', $blog->blog_category_id)->first();
            @endphp
            <div class="col-lg-4 col-md-6">
                <div class="ec-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="ec-blog-banner mb-3">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div>
                        <p class="blog-date">{{ $blog->created_at->format('d M, Y') }}/ <span class="minimize-color">{{$category->title}}</span></p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="al-title2-20px mb-20px text-link">{{ $blog->title }}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ec-btn-outline-skin ec-blog-card-btn">{{get_phrase('READ MORE')}}</a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<!-- Blog Area End -->