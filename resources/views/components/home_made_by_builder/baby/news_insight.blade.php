{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

  <!-- Start News & Insights Section  -->
    <section class="section-mb overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ni-section-title-area">
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".1s">
                            <p class="section-sm-title mb-30px builder-editable" builder-identity="BSN1"><span class="line"></span>{{get_phrase('News & Insights')}}<span class="line"></span></p>
                        </div>
                        <h2 class="section-title text-center max-w-712px mx-auto mb-3 wow animate__fadeInUp builder-editable" builder-identity="BSN2" data-wow-delay=".2s">{{get_phrase('Parenting Tips & Expert Advice!')}}</h2>
                        <p class="section-subtitle max-w-584px mx-auto text-center mb-36px wow animate__fadeInUp builder-editable" builder-identity="BSN3" data-wow-delay=".3s">{{get_phrase('Helpful articles, parenting tips, and expert advice')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".4s">
                            <a href="{{route('blog')}}" class="btn ba-btn-outline-dark">
                                <span class="builder-editable" builder-identity="BSN4">{{get_phrase('Read All Blogs')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 11 11" fill="none">
                                    <path d="M2.4375 1.14179C2.40683 1.65843 2.76563 2.08629 3.23896 2.09728L7.5956 2.19832L0.712227 9.10554C0.355865 9.46313 0.320697 10.0555 0.633679 10.4287C0.946662 10.8018 1.48931 10.8144 1.84567 10.4568L8.72918 3.54946L8.44686 8.30581C8.41615 8.8225 8.775 9.25031 9.24832 9.2613C9.72164 9.27228 10.1302 8.86233 10.1609 8.3456L10.5772 1.33062C10.592 1.08244 10.5158 0.842404 10.3655 0.663225C10.2152 0.484047 10.0031 0.380413 9.77577 0.375137L3.35 0.226058C2.87672 0.215115 2.46817 0.625067 2.4375 1.14179Z" fill="black"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-20px gy-4">
                <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-0">
                     @php 
                        $blogs = App\Models\Blog::where('status', 1)->get();
                    @endphp
                    @foreach($blogs->take(2) as $blog)
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-list-card mb-4 wow animate__fadeInUp" data-wow-delay=".1s">
                        <div class="row gx-20px gy-4">
                            <div class="col-md-5">
                                    <div class="blog-list-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="blog-list-body">
                                    <div class="blog-datetime-wrap">
                                        <p class="date">{{ $blog->created_at->format('d M, Y') }}</p>
                                        
                                    </div>
                                    <h4 class="blog-list-title">{{ $blog->title }}</h4>
                                    <p class="blog-list-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 80, '...') }}</p>
                                    <p class="blog-real-btn">
                                        <span>{{get_phrase('Read More')}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                            <path d="M15.5303 6.4483C15.8232 6.15541 15.8232 5.68053 15.5303 5.38764L10.7574 0.614668C10.4645 0.321774 9.98959 0.321774 9.6967 0.614668C9.40381 0.907561 9.40381 1.38243 9.6967 1.67533L13.9393 5.91797L9.6967 10.1606C9.40381 10.4535 9.40381 10.9284 9.6967 11.2213C9.98959 11.5142 10.4645 11.5142 10.7574 11.2213L15.5303 6.4483ZM0 5.91797V6.66797H15V5.91797V5.16797H0V5.91797Z" fill="black"/>
                                        </svg>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>
                <div class="col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-0">
                    <div class="newsletter-card wow animate__fadeInRight" data-wow-delay=".3s">
                        <div class="w-100">
                            <div class="newsletter-img">
                                <img class="img builder-editable" builder-identity="BSN5" src="{{ asset('assets/frontend/baby/images/newsletter-img.png') }}" alt="">
                            </div>
                            <h3 class="newsletter-card-title builder-editable" builder-identity="BSN6">{{get_phrase('Sign Up to Receive Recent Latest News From Us!')}}</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News & Insights Section  -->