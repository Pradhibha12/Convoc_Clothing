@php
    if($layout == 'lg')
    {
        $title_class = 'mb-12px al-title-20px fw-bold text-link';
        $star_class_fill = 'star-yellow-16.svg';
        $star_class = 'star-yellow-stroke-16.svg';
        $rating_class = 'al-title-16px';
        $price_class = 'al-title2-24px';
        $price_del_class = 'al-title-18px ec2-text-secondary';
    } 
    elseif($layout == 'md')
    {
        $title_class = 'mb-10px al-title2-16px text-link';
        $star_class_fill = 'star-yellow-15.svg';
        $star_class = 'star-yellow-stroke-15.svg';
        $rating_class = 'al-title2-12px';
        $price_class = 'al-title2-18px';
        $price_del_class = 'al-title2-16px fw-medium ec2-text-secondary';
    } 
    else
    {
        $title_class = 'mb-2 al-title-14px fw-bold text-link';
        $star_class_fill = 'star-yellow-15.svg';
        $star_class = 'star-yellow-stroke-15.svg';
        $rating_class = 'al-title2-12px';
        $price_class = 'al-title-14px';
        $price_del_class = 'al-title-12px ec2-text-secondary';
        $layout = $layout == 'sm' ? 'md' : $layout;
    }
@endphp


<div class="product-{{ $layout }}-card">
    <div class="product-{{ $layout }}-banner mb-4">
        @if ($product->is_discounted()->exists())
            @php
                $discount = $product->is_discounted;
                if ($discount->discount_type === 'percentage') {
                    $discount_text = $discount->discount_value . '% OFF';
                } else { // flat
                    $discount_text = currency($discount->discount_value) . ' FLAT';
                }
            @endphp
            <p class="product-sky-badge capitalize">{{ $discount_text }}</p>
        @endif
        @php
            $thumbnails = json_decode($product->thumbnail, true);
            $firstImage = $thumbnails[0] ?? null;
        @endphp
        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
        {{-- <div class="offer-time-{{ $layout }}-wrap">
            <div class="ec-offer-timer" data-offer-date="2025-07-12T00:00:00"></div>
        </div> --}}
        <a href="javascript:void(0)"  class="dark-light-iconbtn {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
            <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.0004 17.5059C9.75927 17.5059 9.52593 17.4748 9.33149 17.4048C6.36038 16.3859 1.63927 12.7692 1.63927 7.42586C1.63927 4.70364 3.84038 2.49475 6.54705 2.49475C7.86149 2.49475 9.09038 3.00808 10.0004 3.92586C10.9104 3.00808 12.1393 2.49475 13.4537 2.49475C16.1604 2.49475 18.3615 4.71142 18.3615 7.42586C18.3615 12.777 13.6404 16.3859 10.6693 17.4048C10.4748 17.4748 10.2415 17.5059 10.0004 17.5059ZM6.54705 3.66142C4.48593 3.66142 2.80593 5.3492 2.80593 7.42586C2.80593 12.7381 7.91593 15.6936 9.7126 16.3081C9.8526 16.3548 10.1559 16.3548 10.2959 16.3081C12.0848 15.6936 17.2026 12.7459 17.2026 7.42586C17.2026 5.3492 15.5226 3.66142 13.4615 3.66142C12.2793 3.66142 11.1826 4.21364 10.4748 5.17031C10.257 5.46586 9.75927 5.46586 9.54149 5.17031C8.81816 4.20586 7.72927 3.66142 6.54705 3.66142Z" fill="white"/>
                </svg>
            </span>
        </a>
        <a href="{{ route('product', $product->slug) }}" class="add-to-cart-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M13.5417 18.75C14.3471 18.75 15 18.0971 15 17.2917C15 16.4863 14.3471 15.8334 13.5417 15.8334C12.7363 15.8334 12.0833 16.4863 12.0833 17.2917C12.0833 18.0971 12.7363 18.75 13.5417 18.75Z" fill="#0D1927"/>
                <path d="M6.87499 18.75C7.68041 18.75 8.33332 18.0971 8.33332 17.2917C8.33332 16.4863 7.68041 15.8334 6.87499 15.8334C6.06957 15.8334 5.41666 16.4863 5.41666 17.2917C5.41666 18.0971 6.06957 18.75 6.87499 18.75Z" fill="#0D1927"/>
                <path d="M4.03332 3.28329L3.86666 5.32496C3.83332 5.71663 4.14166 6.04163 4.53332 6.04163H17.2917C17.6417 6.04163 17.9333 5.77496 17.9583 5.42496C18.0667 3.94996 16.9417 2.74996 15.4667 2.74996H5.22499C5.14166 2.38329 4.97499 2.03329 4.71666 1.74163C4.29999 1.29996 3.71666 1.04163 3.11666 1.04163H1.66666C1.32499 1.04163 1.04166 1.32496 1.04166 1.66663C1.04166 2.00829 1.32499 2.29163 1.66666 2.29163H3.11666C3.37499 2.29163 3.61666 2.39996 3.79166 2.58329C3.96666 2.77496 4.04999 3.02496 4.03332 3.28329Z" fill="#0D1927"/>
                <path d="M17.0917 7.29163H4.30833C3.95833 7.29163 3.67499 7.55829 3.64166 7.89996L3.34166 11.525C3.22499 12.95 4.34166 14.1666 5.76666 14.1666H15.0333C16.2833 14.1666 17.3833 13.1416 17.475 11.8916L17.75 7.99996C17.7833 7.61663 17.4833 7.29163 17.0917 7.29163Z" fill="#0D1927"/>
            </svg>
            <span>  {{ get_phrase('Shop Now') }} </span>
        </a>
        <a href="javascript:void(0)" onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M17.7083 7.62494C15.7833 4.59994 12.9667 2.85828 9.99999 2.85828C8.51666 2.85828 7.07499 3.29161 5.75832 4.09994C4.44166 4.91661 3.25832 6.10828 2.29166 7.62494C1.45832 8.93328 1.45832 11.0583 2.29166 12.3666C4.21666 15.3999 7.03332 17.1333 9.99999 17.1333C11.4833 17.1333 12.925 16.6999 14.2417 15.8916C15.5583 15.0749 16.7417 13.8833 17.7083 12.3666C18.5417 11.0666 18.5417 8.93328 17.7083 7.62494ZM9.99999 13.3666C8.13332 13.3666 6.63332 11.8583 6.63332 9.99994C6.63332 8.14161 8.13332 6.63328 9.99999 6.63328C11.8667 6.63328 13.3667 8.14161 13.3667 9.99994C13.3667 11.8583 11.8667 13.3666 9.99999 13.3666Z" fill="white"/>
                <path d="M9.9965 8C8.89667 8 8 8.89667 8 10.0035C8 11.1033 8.89667 12 9.9965 12C11.0963 12 12 11.1033 12 10.0035C12 8.90368 11.0963 8 9.9965 8Z" fill="white"/>
            </svg>
            <span>{{ get_phrase('Quick View') }}</span>
        </a>
    </div>
    <div class="product-{{ $layout }}-details">
        <a href="{{ route('product', $product->slug) }}" class="{{ $title_class }}">{{ $product->title }}</a>
        <p class="mb-3 al-subtitle-14px capitalize">{{$product->quality_label}}</p>
        <div class="d-flex align-items-center gap-2 flex-wrap">
             @if ($product->is_discounted()->exists())
                    @if ($product->is_discounted->discount_type == 'flat')
                        <div class="d-flex gap-2">
                            <h6 class="al-title-18px">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                            <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                        </div>
                    @else
                        @php
                            $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                        @endphp
                        <div class="d-flex gap-2">
                        <h6 class="al-title-18px"> {{ currency($product->price - $discount_amount) }}  </h6>
                            <h6 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                        </div>
                        
                    @endif
                @else
                <h6 class="al-title-18px">{{ currency($product->price) }}</h6>
            @endif
        </div>
    </div>
</div>