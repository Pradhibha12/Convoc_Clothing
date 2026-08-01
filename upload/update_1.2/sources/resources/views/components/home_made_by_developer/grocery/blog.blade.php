{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}


<!-- Latest News Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="mu-title-36px text-center builder-editable" builder-identity="1">{{get_phrase('Latest News')}}</h1>
            </div>
        </div>
        <div class="row gy-4 justify-content-center mb-30px wow animate__fadeInUp" data-wow-delay=".3s">
            @php 
                $blogs = App\Models\Blog::where('status', 1)->get();
            @endphp
            @foreach($blogs->take(2) as $blog)
            <div class="col-xl-6 col-lg-10">
                <div class="news-card">
                    <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="news-card-banner">
                        <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                    </a>
                    <div class="new-card-details">
                        <p class="mb-12px al-subtitle-16px fw-medium lh-1">{{ $blog->created_at->format('d M, Y') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="mb-12px al-title2-20px text-link">{{ $blog->title }}</a>
                        <p class="mb-20px al-subtitle3-16px">{{ \Illuminate\Support\Str::limit($blog->summary, 90, '...') }}</p>
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn ec-btn-dark pe-4 icon-right">
                            <span>{{get_phrase('Read Now')}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                <path d="M17.0303 8.96981L11.7802 3.71981C11.6388 3.58319 11.4493 3.5076 11.2527 3.50931C11.0561 3.51101 10.8679 3.58989 10.7289 3.72895C10.5898 3.868 10.511 4.05611 10.5092 4.25276C10.5075 4.44941 10.5831 4.63886 10.7198 4.78031L14.6895 8.75006H1.5C1.30109 8.75006 1.11032 8.82908 0.96967 8.96973C0.829018 9.11038 0.75 9.30115 0.75 9.50006C0.75 9.69897 0.829018 9.88974 0.96967 10.0304C1.11032 10.171 1.30109 10.2501 1.5 10.2501H14.6895L10.7198 14.2198C10.6481 14.289 10.591 14.3718 10.5517 14.4633C10.5124 14.5548 10.4917 14.6532 10.4908 14.7528C10.4899 14.8523 10.5089 14.9511 10.5466 15.0433C10.5843 15.1354 10.64 15.2192 10.7105 15.2896C10.7809 15.36 10.8646 15.4157 10.9568 15.4534C11.049 15.4911 11.1477 15.5101 11.2473 15.5092C11.3469 15.5084 11.4453 15.4877 11.5368 15.4484C11.6283 15.4091 11.7111 15.3519 11.7802 15.2803L17.0303 10.0303C17.1709 9.88967 17.2498 9.69893 17.2498 9.50006C17.2498 9.30119 17.1709 9.11046 17.0303 8.96981Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
        <div class="row section-margin wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{route('blog')}}" class="btn ec-btn-outline-dark pe-4 icon-right">
                        <span class="builder-editable" builder-identity="2">{{get_phrase('View All')}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                            <path d="M17.5303 8.46969L12.2802 3.21969C12.1388 3.08307 11.9493 3.00747 11.7527 3.00918C11.5561 3.01089 11.3679 3.08977 11.2289 3.22883C11.0898 3.36788 11.011 3.55599 11.0092 3.75264C11.0075 3.94929 11.0831 4.13874 11.2198 4.28019L15.1895 8.24994H2C1.80109 8.24994 1.61032 8.32896 1.46967 8.46961C1.32902 8.61026 1.25 8.80103 1.25 8.99994C1.25 9.19885 1.32902 9.38962 1.46967 9.53027C1.61032 9.67092 1.80109 9.74994 2 9.74994H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8716 11.0517 13.9631C11.0124 14.0546 10.9917 14.1531 10.9908 14.2526C10.9899 14.3522 11.0089 14.451 11.0466 14.5432C11.0843 14.6353 11.14 14.7191 11.2105 14.7895C11.2809 14.8599 11.3646 14.9156 11.4568 14.9533C11.549 14.991 11.6477 15.01 11.7473 15.0091C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8518 12.2802 14.7802L17.5303 9.53019C17.6709 9.38954 17.7498 9.19881 17.7498 8.99994C17.7498 8.80107 17.6709 8.61034 17.5303 8.46969Z" fill="#0F1311"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest News Area End -->