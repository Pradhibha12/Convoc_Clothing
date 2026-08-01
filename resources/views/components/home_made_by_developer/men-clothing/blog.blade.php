{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Blog Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bs-title-area">
                        <h2 class="section-title text-center mb-30px max-w-952px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MELB1" data-wow-delay=".1s">{{get_phrase('Fashion tips, seasonal styling advice menâ€™s wardrobe wisdom.')}}</h2>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".2s">
                            <a href="{{route('blog')}}" class="btn mc-btn-outline-black btn-min-218px mx-auto builder-editable" builder-identity="MELB2">{{get_phrase('Read All Blogs')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-4 wow animate__fadeInUp" data-wow-delay=".3s">
                @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
                @foreach($blogs->take(2) as $blog)
                <div class="col-md-6">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card">
                        <div>
                            <div class="blog-card-banner">
                                <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="blog">
                            </div>
                            <div class="blog-card-date-title">
                                <p class="blog-card-date">{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                            <h4 class="blog-card-title">{{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}</h4>
                            <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 120, '...') }}</p>
                            <span class="bc-read-btn">
                                <span>{{get_phrase('Read More')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                    <path d="M15.5303 6.11627C15.8232 5.82337 15.8232 5.3485 15.5303 5.05561L10.7574 0.282637C10.4645 -0.0102568 9.98959 -0.0102568 9.6967 0.282637C9.40381 0.57553 9.40381 1.0504 9.6967 1.3433L13.9393 5.58594L9.6967 9.82858C9.40381 10.1215 9.40381 10.5963 9.6967 10.8892C9.98959 11.1821 10.4645 11.1821 10.7574 10.8892L15.5303 6.11627ZM0 5.58594V6.33594H15V5.58594V4.83594H0V5.58594Z" fill="black"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Blog Area End -->