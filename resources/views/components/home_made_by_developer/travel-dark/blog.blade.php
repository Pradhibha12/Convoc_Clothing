{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Blog Section Start -->
<section class="blog-area">
    <div class="container">
          <div class="row mb-5">
             <div class="col-12 text-center wow animate__fadeInUp" data-wow-delay=".1s">
                    <div class="tr-section">
                        <div class="arrow-line"></div>
                        <span class="d-block builder-editable" builder-identity="TDBB1">{{get_phrase('Blogs Posts')}}</span>
                        <h2 class="mb-2 builder-editable" builder-identity="TDBB2">{{get_phrase('Travel Smarter with Our Guides')}}</h2>
                        <p class="builder-editable" builder-identity="TDBB3">{{get_phrase('Expert tips, gear reviews, and destination inspiration to help you travel lighter, smarter, and better.')}}</p>
                    </div>
                </div>
          </div>
        <div class="row g-3 wow animate__fadeInUp" data-wow-delay=".1s">
            @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(3) as $key=>$blog)
         
            @if($loop ->first)
            <div class="col-lg-12">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="tr-blog">
                    <div class="tr-big-image">
                        <img src="{{ get_image($blog->thumbnail) }}" alt="">
                    </div>
                    <div class="tr-blog-content">
                        <div class="blog-head">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/frontend/travel-dark/images/bg-cal.svg') }}" alt="">
                                <p>{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                             
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</h4>
                        <div class="blog-bottom">
                            <p>{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                            <span  class="tr-white-btn-large ">{{get_phrase('Read Now!')}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div class="col-lg-6 col-md-6 col-sm-12">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="tr-blog">
                    <div class="tr-big-image">
                        <img src="{{ get_image($blog->thumbnail) }}" alt="">
                    </div>
                    <div class="tr-blog-content">
                        <div class="blog-head">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/frontend/travel-dark/images/bg-cal.svg') }}" alt="">
                                <p>{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                             
                        </div>
                        <h4>{{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}</h4>
                        <div class="blog-bottom">
                            <p>{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                            <span  class="tr-white-btn-large ">{{get_phrase('Read Now!')}}</span>
                        </div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
        </div>
        <div class="text-center mt-2 wow animate__fadeInUp" data-wow-delay=".1s">
            <a href="{{route('blog')}}" class="tr-white-btn-large px-28px mt-5 builder-editable" builder-identity="TDBB5">{{get_phrase('Read All Blogs')}}</a>
        </div>

    </div>
</section>
<!-- Blog Section End -->