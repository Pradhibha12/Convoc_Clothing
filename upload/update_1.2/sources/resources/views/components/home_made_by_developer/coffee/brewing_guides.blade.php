{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Brewing Guides Area Start -->
<section class="brewing-guides-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-section-title-area">
                    <p class="title-badge2 mx-auto mb-28px wow animate__fadeInUp builder-editable"
                       builder-identity="COG1" data-wow-delay=".1s">
                        {{ get_phrase('Brewing Guides') }}
                    </p>
                    <h2 class="section-title text-white text-center max-w-531px mx-auto wow animate__fadeInUp builder-editable"
                        builder-identity="COG2" data-wow-delay=".2s">
                        {{ get_phrase('Brew Like a Barista at Home!') }}
                    </h2>
                </div>
            </div>
        </div>

        @php
            $blogs = App\Models\Blog::where('status', 1)
                        ->latest()
                        ->take(3)
                        ->get();
        @endphp

        <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <div class="blog-card-main">

                    @if($blogs->count() > 0)

                        @foreach($blogs as $blog)
                            @if($loop->first)

                                <!-- Large Blog Card -->
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-lg-card">
                                    <div class="h-100 w-100">
                                        <div class="blog-lg-banner">
                                            <img class="banner"
                                                 src="{{ get_image($blog->thumbnail) }}"
                                                 alt="{{ $blog->title }}">
                                        </div>

                                        <div class="blog-lg-content">
                                            <div class="blog-lg-content-left">
                                                <p class="blog-lg-date">
                                                    {{ $blog->created_at->format('d M, Y') }}
                                                </p>
                                                <h3 class="blog-lg-title">
                                                    {{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}
                                                </h3>
                                                <p class="blog-lg-subtitle">
                                                    {{ \Illuminate\Support\Str::limit($blog->summary, 60, '...') }}
                                                </p>
                                            </div>

                                            <div class="blog-lg-arrow">
                                                <svg width="26" height="26" viewBox="0 0 36 32" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M35.3557 5.45976C35.5072 4.22638 34.6301 3.10376 33.3967 2.95232L13.2976 0.484468C12.0643 0.333028 10.9416 1.21011 10.7902 2.44349C10.6388 3.67687 11.5158 4.79949 12.7492 4.95092L30.615 7.14457L28.4214 25.0104C28.27 26.2438 29.147 27.3664 30.3804 27.5178C31.6138 27.6693 32.7364 26.7922 32.8879 25.5588L35.3557 5.45976ZM1.60205 29.812L2.98729 31.585L34.5077 6.95858L33.1225 5.18555L31.7372 3.41253L0.216812 28.039L1.60205 29.812Z"
                                                          fill="black"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <!-- Medium Blog Wrapper Start -->
                                <div class="blog-md-wrap">

                            @else

                                <!-- Medium Blog Card -->
                                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}"
                                   class="blog-md-card mb-18px">
                                    <div class="h-100 w-100">
                                        <div class="blog-md-banner">
                                            <img class="banner"
                                                 src="{{ get_image($blog->thumbnail) }}"
                                                 alt="{{ $blog->title }}">
                                        </div>

                                        <div class="blog-md-content">
                                            <div class="blog-md-content-left">
                                                <p class="blog-md-date">
                                                    {{ $blog->created_at->format('d M, Y') }}
                                                </p>
                                                <h3 class="blog-md-title">
                                                    {{ \Illuminate\Support\Str::limit($blog->title, 40, '...') }}
                                                </h3>
                                                <p class="blog-md-subtitle">
                                                    {{ \Illuminate\Support\Str::limit($blog->summary, 60, '...') }}
                                                </p>
                                            </div>

                                            <div class="blog-md-arrow">
                                                <svg width="26" height="26" viewBox="0 0 29 26" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M28.5249 5.27684C28.6595 4.1805 27.8799 3.18262 26.7836 3.04801L8.91772 0.854359C7.82139 0.719745 6.8235 1.49938 6.68889 2.59571C6.55428 3.69205 7.33391 4.68993 8.43025 4.82454L24.311 6.77445L22.3611 22.6552C22.2265 23.7515 23.0061 24.7494 24.1024 24.884C25.1988 25.0186 26.1966 24.239 26.3313 23.1427L28.5249 5.27684ZM2.02393 24.187L3.25525 25.763L27.7711 6.60912L26.5398 5.0331L25.3085 3.45708L0.792603 22.611L2.02393 24.187Z"
                                                          fill="black"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            @endif
                        @endforeach

                        </div> <!-- blog-md-wrap -->

                    
                    @endif

                </div>
            </div>

            <div class="col-12 text-center mt-4">
                <a href="{{ route('blog') }}"
                   class="btn ctsb2-btn-outline-white builder-editable"
                   builder-identity="COG4">
                    {{ get_phrase('Explore More Guides') }}
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Brewing Guides Area End -->
