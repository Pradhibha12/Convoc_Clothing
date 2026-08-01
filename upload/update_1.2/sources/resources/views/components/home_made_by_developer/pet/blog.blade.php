{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Blog Area Start -->
<section class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-section-title-area">
                    <h2 class="section-title mb-14px blog-section-title text-center wow animate__fadeInUp builder-editable" builder-identity="PB1" data-wow-delay=".1s">{{get_phrase('Smart Reads for Pet Parents')}}</h2>
                    <p class="section-subtitle blog-section-subtitle text-center mb-30px wow animate__fadeInUp builder-editable" builder-identity="PB2" data-wow-delay=".2s">{{get_phrase('Insights, fun stories, and how-tos for every pet parent.')}}</p>
                    <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                        <a href="{{route('blog')}}" class="btn pt-btn-skin builder-editable" builder-identity="PB3">{{get_phrase('View All Blog Posts')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-20px gy-5 justify-content-center wow animate__fadeInUp" data-wow-delay=".4s">
            @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(2) as $key=>$blog)
            @php 
            
               $blogCategory = App\Models\Blog_category::where('id', $blog->blog_category_id)->first(); 
            @endphp
            <div class="col-lg-6 col-md-10">
                <div class="pt-blog-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        <h3 class="blog-number-badge">0{{++$key}}</h3>
                    </a>
                    <div>
                        <a href="javascript:;" class="blog-card-category">{{$blogCategory->title}}</a>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="blog-card-title">{{ $blog->title }}</a>
                        <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 80, '...') }}</p>
                        <div class="d-flex align-items-center column-gap-4 row-gap-2 flex-wrap mb-30px">
                            <div class="blog-iconText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="33" viewBox="0 0 31 33" fill="none">
                                    <path d="M20 4.7819V1.61523M20 4.7819V7.94857M20 4.7819H12.875M1 14.2819V28.5319C1 30.2809 2.41776 31.6986 4.16667 31.6986H26.3333C28.0823 31.6986 29.5 30.2809 29.5 28.5319V14.2819H1Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 14.2832V7.94987C1 6.20097 2.41776 4.7832 4.16667 4.7832H7.33333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.33301 1.61523V7.94857" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M29.5003 14.2832V7.94987C29.5003 6.20097 28.0826 4.7832 26.3337 4.7832H25.542" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text">{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                            
                        </div>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ptb5-btn-skin">{{get_phrase('Read More')}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Area End -->