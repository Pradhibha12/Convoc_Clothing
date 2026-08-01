{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Latest News Area Start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp  builder-editable" builder-identity="29" data-wow-delay=".3s">{{get_phrase('Latest News')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-100px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(3) as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="fsh-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="fsh-blog-banner mb-3">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div>
                        <p class="al-subtitle2-16px mb-12px">{{ $blog->created_at->format('d M, Y') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="al-title-20px mb-20px text-link2">{{ $blog->title }}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn fsh-btn-dark pe-4 icon-right fsh-blog-card-btn">
                            <span>{{get_phrase('READ MORE')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> 
<!-- Latest News Area End -->
