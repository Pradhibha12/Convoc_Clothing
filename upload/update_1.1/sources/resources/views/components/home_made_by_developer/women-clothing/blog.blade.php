{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Blog Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-section-title-area">
                        <h5 class="section-sm-title mb-22px text-center wow animate__fadeInUp builder-editable" builder-identity="WOSBI1" data-wow-delay=".1s">{{get_phrase('News & Insights')}}</h5>
                        <h2 class="section-title text-center max-w-744px mx-auto wow animate__fadeInUp builder-editable" builder-identity="WOSBI2" data-wow-delay=".2s">{{get_phrase('Tips, trends, and how-tos from our fashion editors')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row blog-card-row wow animate__fadeInUp" data-wow-delay=".3s">
                @php
                    $blogs = App\Models\Blog::where('status', 1)->latest()->get();
                 @endphp
                @foreach($blogs->take(3) as $blog)
                <div class="col-md-6 col-lg-4">
                    <div class="blog-card">
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-banner">
                            <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        </a>
                        <div>
                            <a href="javascript:;" class="blog-card-category">{{ $blog->created_at->format('d M, Y') }}</a>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-title">{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</a>
                            <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn wc-sm-btn-outline-dark">{{get_phrase('Read More')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Blog Area End -->