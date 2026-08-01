{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Get Inspired in the Kitchen Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end gap-4 mb-40px">
                    <div class="blog-title-area">
                        <h2 class="section-title mb-4 wow animate__fadeInUp builder-editable" builder-identity="DB1" data-wow-delay=".1s">{{get_phrase('Get Inspired in the Kitchen')}}</h2>
                        <p class="section-subtitle wow animate__fadeInUp builder-editable" builder-identity="DB2" data-wow-delay=".2s">{{get_phrase('Try simple recipes using our fresh picks.')}}</p>
                    </div>
                    <a href="{{route('blog')}}" class="btn dr-btn-outline-secondary wow animate__fadeInUp builder-editable" builder-identity="DB3" data-wow-delay=".3s">{{get_phrase('View All')}}</a>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
            @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(4) as $blog)
            @php 
                $category = App\Models\Blog_category::where('id', $blog->blog_category_id)->first();
            @endphp 
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="dr-blog-card">
                    <div class="blog-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </div>
                    <div class="blog-card-body">
                        <div class="blog-date-category">
                            <p class="dr-blog-date">{{ $blog->created_at->format('d M, Y') }}</p>
                            <h4 class="dr-blog-category">{{$category->title}}</h4>
                        </div>
                        <p class="dr-blog-title">{{ $blog->title }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Get Inspired in the Kitchen Area End -->