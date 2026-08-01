{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Blog Section Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="bn-title-60px text-uppercase builder-editable" builder-identity="sb1">{{get_phrase('TOP BLOGS')}}</h1>
            </div>
        </div>
        <div class=" section-margin justify-content-center wow animate__fadeInUp" data-wow-delay=".2s">
           <div class="row gy-4">
             @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
                @foreach($blogs->take(3) as $key => $blog)
                    @if($loop->first)
                        {{-- Left big card --}}
                        <div class="col-lg-5">
                            <div class="blog-grid-card">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-grid-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-grid-details">
                                    <div class="svg-block d-flex align-items-center gap-6px mb-12px">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.9999 1.8335C5.94908 1.8335 1.83325 5.94933 1.83325 11.0002C1.83325 16.051 5.94908 20.1668 10.9999 20.1668C16.0508 20.1668 20.1666 16.051 20.1666 11.0002C20.1666 5.94933 16.0508 1.8335 10.9999 1.8335ZM14.9874 14.2727C14.8591 14.4927 14.6299 14.6118 14.3916 14.6118C14.2724 14.6118 14.1533 14.5843 14.0433 14.511L11.2016 12.8152C10.4958 12.3935 9.97325 11.4677 9.97325 10.6518V6.8935C9.97325 6.51766 10.2849 6.206 10.6608 6.206C11.0366 6.206 11.3483 6.51766 11.3483 6.8935V10.6518C11.3483 10.9818 11.6233 11.4677 11.9074 11.6327L14.7491 13.3285C15.0791 13.521 15.1891 13.9427 14.9874 14.2727Z" fill="#959595"/>
                                        </svg>
                                        <p class="al-subtitle-16px lh-1 mt-2px">{{ $blog->created_at->format('d M, Y') }}</p>
                                    </div>
                                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="text-link al-title-24px mb-3">{{ $blog->title }}</a>
                                    <p class="al-subtitle-16px mb-26px">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                    <div class="d-flex align-items-center gap-12px eBottoms">
                                        <div class="rounded-img-44px">
                                            <img src="{{ get_image($blog->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <p class="al-subtitle-14px mb-2">{{ get_phrase('Written by') }}</p>
                                            <h4 class="al-title-16px">{{ $blog->user->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Start right column --}}
                        <div class="col-lg-7">
                    @else
                            {{-- Right side stacked cards --}}
                            <div class="blog-list-card mb-20px">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-list-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-list-details">
                                    <div class="svg-block d-flex align-items-center gap-6px mb-12px">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.9999 1.8335C5.94908 1.8335 1.83325 5.94933 1.83325 11.0002C1.83325 16.051 5.94908 20.1668 10.9999 20.1668C16.0508 20.1668 20.1666 16.051 20.1666 11.0002C20.1666 5.94933 16.0508 1.8335 10.9999 1.8335ZM14.9874 14.2727C14.8591 14.4927 14.6299 14.6118 14.3916 14.6118C14.2724 14.6118 14.1533 14.5843 14.0433 14.511L11.2016 12.8152C10.4958 12.3935 9.97325 11.4677 9.97325 10.6518V6.8935C9.97325 6.51766 10.2849 6.206 10.6608 6.206C11.0366 6.206 11.3483 6.51766 11.3483 6.8935V10.6518C11.3483 10.9818 11.6233 11.4677 11.9074 11.6327L14.7491 13.3285C15.0791 13.521 15.1891 13.9427 14.9874 14.2727Z" fill="#959595"/>
                                        </svg>
                                        <p class="al-subtitle-16px lh-1 mt-2px">{{ $blog->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="text-link al-title-24px mb-3">{{ $blog->title }}</a>
                                    <p class="al-subtitle-16px mb-20px">{{ \Illuminate\Support\Str::limit($blog->summary, 70, '...') }}</p>
                                    <div class="d-flex align-items-center gap-12px eBottoms">
                                        <div class="rounded-img-44px">
                                            <img src="{{ get_image($blog->user->photo) }}" alt="">
                                        </div>
                                        <div>
                                            <p class="al-subtitle-14px mb-2">{{ get_phrase('Written by') }}</p>
                                            <h4 class="al-title-16px">{{ $blog->user->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif

                    @if($loop->last)
                        </div> {{-- close right column --}}
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</section>
<!-- Blog Section End -->