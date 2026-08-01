
@php
    $limit = 10;
    $reviews = App\Models\Review::where('product_id', $product_id);
    $total_reviews = $reviews->count();

    if (!isset($skip)) {
        $skip = 0;
    }
    if (!isset($sort_by)) {
        $orderBy = 'desc';
        $sort_by = 'new';
    } else {
        $orderBy = $sort_by == 'old' ? 'asc' : 'desc';
    }

    $reviews->skip($skip);

    if (isset($sort_by) && $sort_by == 'old') {
        $reviews->orderBy('created_at', $orderBy);
    } else {
        $reviews->orderBy('created_at', $orderBy);
    }
    $reviews->limit($limit);

    if ($total_reviews - ($skip + $limit) > 0) {
        $show_more = true;
    } else {
        $show_more = false;
    }

@endphp

@foreach ($reviews->get() as $review)
    <!-- Single Feedback -->
    <div class="loadedItem customer-review-single">
        <div class="mb-3 d-flex align-items-center gap-12px">
            <div class="img-circle-53px">
                <img src="{{ get_image($review->user->photo) }}" alt="">
            </div>
            <div>
                <a href="#" class="mb-7px al-title-16px fw-medium text-link">{{ $review->user->name }}</a>
                <div class="d-flex align-items-center gap-11px flex-wrap">
                    <p class="al-subtitle-14px fw-normal">{{ date_formatter($review->created_at, 1) }}</p>
                    <div class="d-flex align-items-center review-sm-stars">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= floor($review->rating))
                                <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            @elseif ($i == ceil($review->rating) && !is_int($review->rating))
                                <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-half-16.svg') }}" alt="">
                            @else
                                <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <!-- Comment -->
        <p class="al-subtitle-16px fw-medium mb-3">{{ $review->comment }}</p>
        <div class="fsh-magnific-popup mb-3 d-flex gap-12px flex-wrap" data-width="900px">
            @foreach ($review->files as $file)
                <a class="review-product-img" href="{{ get_image($file->path) }}">
                    <img src="{{ get_image($file->path) }}" alt="">
                </a>
            @endforeach
        </div>
        <div class="d-flex align-items-center row-gap-3 column-gap-4 flex-wrap">
            <!-- add 'active' class when liked -->
            <a href="javascript:;" class="icontext-sm-link" onclick="actionTo('{{ route('customer.product.review.helpful', ['review_id' => $review->id]) }}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M13.5668 18.417H10.4001C9.93346 18.417 8.9168 18.2753 8.37513 17.7336L5.85013 15.7836L6.6168 14.792L9.20013 16.792C9.40846 16.992 9.93346 17.1586 10.4001 17.1586H13.5668C14.3168 17.1586 15.1251 16.5586 15.2918 15.8836L17.3085 9.75864C17.4418 9.39197 17.4168 9.05864 17.2418 8.81697C17.0585 8.55864 16.7251 8.40864 16.3168 8.40864H12.9835C12.5501 8.40864 12.1501 8.22531 11.8751 7.90864C11.5918 7.58364 11.4668 7.15031 11.5335 6.70031L11.9501 4.02531C12.0501 3.55864 11.7335 3.03364 11.2835 2.88364C10.8751 2.73364 10.3501 2.95031 10.1668 3.21697L6.75013 8.30031L5.7168 7.60864L9.13346 2.52531C9.65846 1.74197 10.8085 1.36697 11.7085 1.70864C12.7501 2.05031 13.4168 3.20031 13.1835 4.26697L12.7751 6.89197C12.7668 6.95031 12.7668 7.03364 12.8251 7.10031C12.8668 7.14197 12.9251 7.16697 12.9918 7.16697H16.3251C17.1418 7.16697 17.8501 7.50864 18.2668 8.10031C18.6751 8.67531 18.7585 9.43364 18.4918 10.167L16.5001 16.2336C16.1918 17.442 14.9085 18.417 13.5668 18.417Z" fill="#0D0E10"/>
                    <path d="M4.48242 17.5003H3.64909C2.10742 17.5003 1.35742 16.7753 1.35742 15.292V7.1253C1.35742 5.64197 2.10742 4.91697 3.64909 4.91697H4.48242C6.02409 4.91697 6.77409 5.64197 6.77409 7.1253V15.292C6.77409 16.7753 6.02409 17.5003 4.48242 17.5003ZM3.64909 6.16697C2.74076 6.16697 2.60742 6.38364 2.60742 7.1253V15.292C2.60742 16.0336 2.74076 16.2503 3.64909 16.2503H4.48242C5.39075 16.2503 5.52409 16.0336 5.52409 15.292V7.1253C5.52409 6.38364 5.39075 6.16697 4.48242 6.16697H3.64909Z" fill="#0D0E10"/>
                </svg>
                <span>{{ get_phrase('Helpful') }} (<span class="fsh-text-dark" id="helpful-{{ $review->id }}">{{ count(json_decode($review->helpful_marked_users ?? '[]', true)) }}</span>) </span></span>
            </a>
            
        </div>
    </div>
@endforeach

<!-- See More -->
@if ($show_more)
<div>
    <a href="javascript:;" onclick="append_view('{{ route('view', ['path' => 'frontend.product.customer_reviews', 'product_id' => $product_id]) }}&sort_by='+$('#customer_review_sort_value').val()+'&skip='+document.querySelectorAll('#customer_reviews .loadedItem').length, '#customer_reviews');" class="btn fsh-btn-outline-secondary fw-medium pe-4 icon-right skip{{ $skip }}">
        <span>{{ get_phrase('Show More') }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
            <path d="M7.2824 3.96795C7.2121 4.03767 7.1563 4.12062 7.11823 4.21201C7.08015 4.30341 7.06055 4.40144 7.06055 4.50045C7.06055 4.59945 7.08015 4.69748 7.11823 4.78888C7.1563 4.88027 7.2121 4.96322 7.2824 5.03295L10.7174 8.46794C10.7877 8.53767 10.8435 8.62062 10.8816 8.71201C10.9196 8.80341 10.9392 8.90144 10.9392 9.00044C10.9392 9.09945 10.9196 9.19748 10.8816 9.28888C10.8435 9.38027 10.7877 9.46322 10.7174 9.53294L7.2824 12.9679C7.2121 13.0377 7.1563 13.1206 7.11823 13.212C7.08015 13.3034 7.06055 13.4014 7.06055 13.5004C7.06055 13.5995 7.08015 13.6975 7.11823 13.7889C7.1563 13.8803 7.2121 13.9632 7.2824 14.0329C7.42292 14.1726 7.61301 14.251 7.81115 14.251C8.00928 14.251 8.19937 14.1726 8.3399 14.0329L11.7824 10.5904C12.2037 10.1686 12.4404 9.5967 12.4404 9.00044C12.4404 8.40419 12.2037 7.83232 11.7824 7.41045L8.3399 3.96795C8.19937 3.82826 8.00928 3.74985 7.81115 3.74985C7.61301 3.74985 7.42292 3.82826 7.2824 3.96795Z" fill="#0D0E10"/>
        </svg>
    </a>
</div>

@endif

<script>
    'use strict';
    initScript();

    $('.fsh-magnific-popup').each(function() {
        $(this).magnificPopup({
            delegate: '.review-product-img',
            type: 'image',
            closeBtnInside: false,
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
            }
        });
    });

    $('.btn.skip{{ $skip - $limit }}').remove();
</script>