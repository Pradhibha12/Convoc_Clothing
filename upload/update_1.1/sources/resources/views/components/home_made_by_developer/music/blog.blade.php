{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

   <!-- Blog Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-section-title-area">
                        <h2 class="section-title text-center mb-18px max-w-765px mx-auto wow animate__fadeInUp builder-editable" builder-identity="MBOL1" data-wow-delay=".1s">{{get_phrase('Tips and Tutorials for Every Musician')}}</h2>
                        <p class="section-subtitle text-center max-w-582px mx-auto blog-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="MBOL2" data-wow-delay=".2s">{{get_phrase('Tips, tutorials, and gear guides for every stage of your journey.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('blog')}}" class="btn mi-btn-outline-dark builder-editable" builder-identity="MBOL3">{{get_phrase('Read All Blogs')}}</a>
                        </div>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-12">
                    @php 
                        $blogs = App\Models\Blog::where('status', 1)->get();
                    @endphp
                    @foreach($blogs->take(3) as $blog)
                        @if($loop->iteration == 2) 
                            {{-- second blog reverse layout hobe --}}
                            <div class="blog-post-wrap flex-wrap-reverse wow animate__fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                                <div class="blog-post-body">
                                    <div class="blog-post-body-inner">
                                        <p class="blog-post-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-title">
                                            {{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
                                        </a>
                                        <p class="blog-post-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-read-btn">
                                            <span>{{ get_phrase('Read Now') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                                <path d="M22.7079 11.0343C23.2263 10.5159 23.2263 9.67546 22.7079 9.15706L14.2601 0.709242C13.7417 0.190842 12.9012 0.190842 12.3828 0.709242C11.8644 1.22764 11.8644 2.06813 12.3828 2.58653L19.892 10.0957L12.3828 17.6049C11.8644 18.1233 11.8644 18.9638 12.3828 19.4822C12.9012 20.0006 13.7417 20.0006 14.2601 19.4822L22.7079 11.0343ZM0.530151 10.0957V11.4231H21.7693V10.0957V8.76826H0.530151V10.0957Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                            </div>
                        @else
                            {{-- 1st + 3rd blog normal layout hobe --}}
                            <div class="blog-post-wrap wow animate__fadeInUp" data-wow-delay=".{{ $loop->iteration }}s">
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-banner">
                                    <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                                </a>
                                <div class="blog-post-body">
                                    <div class="blog-post-body-inner">
                                        <p class="blog-post-date">{{ $blog->created_at->format('d M, Y') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-post-title">
                                            {{ \Illuminate\Support\Str::limit($blog->title, 60, '...') }}
                                        </a>
                                        <p class="blog-post-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-read-btn">
                                            <span>{{ get_phrase('Read Now') }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
                                                <path d="M22.7079 11.0343C23.2263 10.5159 23.2263 9.67546 22.7079 9.15706L14.2601 0.709242C13.7417 0.190842 12.9012 0.190842 12.3828 0.709242C11.8644 1.22764 11.8644 2.06813 12.3828 2.58653L19.892 10.0957L12.3828 17.6049C11.8644 18.1233 11.8644 18.9638 12.3828 19.4822C12.9012 20.0006 13.7417 20.0006 14.2601 19.4822L22.7079 11.0343ZM0.530151 10.0957V11.4231H21.7693V10.0957V8.76826H0.530151V10.0957Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- Blog Area End  -->