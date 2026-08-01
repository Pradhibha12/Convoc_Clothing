{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Testimonials Area Start -->
<section class="testimonial-section section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial-title-area">
                    <h2 class="section-title mb-4 wow animate__fadeInUp builder-editable" builder-identity="DT1" data-wow-delay=".1s">{{get_phrase('What Our Shoppers Are Saying')}}</h2>
                    <p class="section-subtitle wow animate__fadeInUp builder-editable" builder-identity="DT2" data-wow-delay=".2s">{{get_phrase('Happy Customers makes us Happy')}}</p>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
             @php 
                $reviews = App\Models\Review::where('rating', 5)->latest()->take(10)->get(); 
            @endphp
            @foreach($reviews->take(6) as $review)
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card">
                    <div class="d-flex align-items-center gap-2 mb-20px">
                        @for($i=1; $i<=5; $i++)
                        <div class="svg-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <g clip-path="url(#clip0_101_956)">
                                    <path d="M6.1822 5.50494L1.3972 6.19869L1.31245 6.21594C1.18415 6.25 1.06719 6.3175 0.973516 6.41154C0.879839 6.50559 0.812799 6.62281 0.779243 6.75124C0.745687 6.87966 0.746817 7.0147 0.782517 7.14255C0.818217 7.2704 0.887209 7.38648 0.982446 7.47894L4.44895 10.8532L3.63145 15.6194L3.6217 15.7019C3.61384 15.8346 3.6414 15.967 3.70153 16.0856C3.76167 16.2041 3.85223 16.3045 3.96395 16.3766C4.07566 16.4486 4.20451 16.4897 4.33731 16.4955C4.4701 16.5014 4.60207 16.4718 4.7197 16.4099L8.9992 14.1599L13.2689 16.4099L13.3439 16.4444C13.4677 16.4932 13.6023 16.5082 13.7338 16.4878C13.8652 16.4674 13.9889 16.4124 14.0921 16.3284C14.1953 16.2444 14.2744 16.1345 14.3211 16.0099C14.3678 15.8853 14.3805 15.7506 14.3579 15.6194L13.5397 10.8532L17.0077 7.47819L17.0662 7.41444C17.1498 7.31152 17.2046 7.18828 17.225 7.05729C17.2454 6.92629 17.2308 6.79223 17.1825 6.66874C17.1343 6.54525 17.0541 6.43677 16.9503 6.35433C16.8465 6.27189 16.7227 6.21844 16.5914 6.19944L11.8064 5.50494L9.66745 1.16994C9.60555 1.04434 9.50973 0.938578 9.39084 0.86462C9.27194 0.790662 9.13472 0.751465 8.9947 0.751465C8.85467 0.751465 8.71745 0.790662 8.59855 0.86462C8.47966 0.938578 8.38384 1.04434 8.32195 1.16994L6.1822 5.50494Z" fill="#FF6600"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_101_956">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        @endfor
                    </div>
                    <p class="testimonial-comment mb-30px">{{$review->comment}}</p>
                    <div class="mb-30px">
                        <h5 class="ts-user-name">{{ $review->user->name }}</h5>
                        <p class="ts-user-role">{{ $review->created_at->format('F j, Y') }}</p>
                    </div>
                  
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Testimonials Area End -->
