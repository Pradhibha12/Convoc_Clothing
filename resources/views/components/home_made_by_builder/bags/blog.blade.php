
{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Our Blogs Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <p class="bs-title-badge mb-26px wow animate__fadeInUp builder-editable" builder-identity="BG1" data-wow-delay=".1s">{{get_phrase('Our Blogs')}}</p>
                    <div class="blogs-section-title-area">
                        <div>
                            <h2 class="section-title blogs-section-title wow animate__fadeInUp builder-editable" builder-identity="BG2" data-wow-delay=".2s">{{get_phrase('Tips, Stories & Bag Wisdom!!')}}</h2>
                        </div>
                        <div class="blogs-section-title-right">
                            <p class="section-subtitle mb-30px wow animate__fadeInUp builder-editable" builder-identity="BG3" data-wow-delay=".3s">{{get_phrase('Dive into packing tips, travel stories, and style advice from our expert writers.')}}</p>
                            <a href="{{route('blog')}}" class="btn bs-btn-skin wow animate__fadeInUp" data-wow-delay=".4s">
                                <span class="builder-editable" builder-identity="BG4">{{get_phrase('Read More')}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20" fill="none">
                                    <path d="M1.77997 8.65667L0.436635 8.65667L0.436635 11.3433L1.77997 11.3433L1.77997 8.65667ZM21.5365 10.9499C22.0611 10.4253 22.0611 9.57472 21.5365 9.05012L12.9876 0.501199C12.463 -0.023406 11.6124 -0.0234059 11.0878 0.501199C10.5632 1.0258 10.5632 1.87635 11.0878 2.40096L18.6869 10L11.0878 17.599C10.5632 18.1236 10.5632 18.9742 11.0878 19.4988C11.6124 20.0234 12.463 20.0234 12.9876 19.4988L21.5365 10.9499ZM1.77997 10L1.77997 11.3433L20.5866 11.3433L20.5866 10L20.5866 8.65667L1.77997 8.65667L1.77997 10Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row gx-22px gy-4 justify-content-center wow animate__fadeInUp" data-wow-delay=".1s">
             @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(2) as $key=>$blog)
            
            <div class="col-md-10 col-lg-6">
                <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="bs-blog-card">
                    <div class="blog-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        <h2 class="blog-number">0{{++$key}}</h2>
                    </div>
                    <div class="blog-card-body">
                        <h3 class="blog-card-title">{{ $blog->title }}</h3>
                        <p class="blog-card-subtitle">{{ \Illuminate\Support\Str::limit($blog->summary, 80, '...') }}</p>
                        <div class="d-flex align-items-center column-gap-14px row-gap-2 flex-wrap">
                            <div class="date-comment-list-item">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 4.16667V1M20 4.16667V7.33333M20 4.16667H12.875M1 13.6667V27.9167C1 29.6656 2.41776 31.0833 4.16667 31.0833H26.3333C28.0823 31.0833 29.5 29.6656 29.5 27.9167V13.6667H1Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 13.668V7.33464C1 5.58573 2.41776 4.16797 4.16667 4.16797H7.33333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7.33325 1V7.33333" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M29.5001 13.668V7.33464C29.5001 5.58573 28.0824 4.16797 26.3334 4.16797H25.5417" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p>{{ $blog->created_at->format('d M, Y') }}</p>
                            </div>
                           
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Our Blogs Area End -->