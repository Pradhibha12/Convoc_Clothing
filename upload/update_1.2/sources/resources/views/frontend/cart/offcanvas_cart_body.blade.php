
@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp
@php
    $my_cart_items = App\Models\Cart_item::where('user_id', auth()->id())->get();
@endphp



<div class="offcanvas-header">
    <div>
        <h5 class="al-title-18px mb-12px" id="shoppingCartLabel">{{ get_phrase('Shopping Cart') }}</h5>
        <p class="al-subtitle-16px fw-medium lh-1">{{ $my_cart_items->count().' '.get_phrase('items') }}</p>
    </div>
    @if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' )
    <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
    @else
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    @endif
</div>

<div class="offcanvas-body">
    <div class="cart-products-main">
        @php $cart_total_price = 0; @endphp
         @if($my_cart_items->count() > 0)
        <ul class="product-list-sm-group mb-30px">
            
            @foreach ($my_cart_items as $my_cart_item)
                @php $product = $my_cart_item->product; @endphp
                <li class="product-list-view-sm">
                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-list-banner-sm">
                         @php
                            $thumbnails = json_decode($product->thumbnail, true);
                            $firstImage = $thumbnails[0] ?? null;
                        @endphp
                        <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                    </a>
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="al-title-16px mb-12px product-title-link">{{ $product->title }}</a> 
                       
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
                            {{-- @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp
                                @if ($discount->discount_type == 'percentage')
                                    @php $cart_total_price += (($product->price / 100) * $discount->discount_value) * $my_cart_item->quantity; @endphp
                                    <h4 class="al-title-16px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h4>
                                @else
                                    @php $cart_total_price += $discount->discount_value * $my_cart_item->quantity; @endphp
                                    <h4 class="al-title-16px">{{ currency($discount->discount_value) }}</h4>
                                @endif
                                <h4 class="al-title-16px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h4>
                            @else
                                @php $cart_total_price += $product->price * $my_cart_item->quantity; @endphp
                                <h4 class="al-title-16px">{{ currency($product->price) }}</h4>
                            @endif --}}
                            @if ($product->is_discounted)
                                @php
                                    $discount = $product->discount;
                                @endphp

                                @if ($discount->discount_type == 'percentage')
                                    @php
                                        $discount_amount = ($product->price * $discount->discount_value) / 100;
                                        $final_price = $product->price - $discount_amount;
                                        $cart_total_price += $final_price * $my_cart_item->quantity;
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <h4 class="al-title-16px">{{ currency($final_price) }}</h4>
                                        <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                    </div>
                                @else
                                    @php
                                        $final_price = $product->price - $discount->discount_value;
                                        $cart_total_price += $final_price * $my_cart_item->quantity;
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <h4 class="al-title-16px">{{ currency($final_price) }}</h4>
                                        <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                    </div>
                                @endif
                            @else
                                @php
                                    $cart_total_price += $product->price * $my_cart_item->quantity;
                                @endphp
                                <h4 class="al-title-16px">{{ currency($product->price) }}</h4>
                            @endif



                        </div>
                        <div class="d-flex align-items-center gap-10px">
                            <div class="d-flex align-items-center quantity-input-wrap">
                                <button class="quantity-btn dec" type="button" onclick="actionTo('{{ route('customer.cart_item_quantity.update', ['cart_item_id' => $my_cart_item->id, 'sign' => 'minus']) }}', 'post');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path d="M12.8338 7L1.16715 7" stroke="#818195" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>         
                                </button>
                                <input type="number" value="{{ $my_cart_item->quantity }}" class="quantity-of-product" readonly>
                                <button class="quantity-btn inc" type="button" onclick="actionTo('{{ route('customer.cart_item_quantity.update', ['cart_item_id' => $my_cart_item->id, 'sign' => 'plus']) }}', 'post');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <g clip-path="url(#clip0_1174_12883)">
                                            <path d="M7.00105 1.16675L7.00105 12.8334" stroke="#818195" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M12.8338 7.00024L1.16715 7.00024" stroke="#818195" stroke-width="1.5" stroke-linecap="round"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1174_12883">
                                            <rect width="14" height="14" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                        </svg>
                                </button>
                            </div>
                            <a href="javascript:void(0)" onclick="confirmModal('{{ route('customer.cart_item.delete', ['product_id' => $product->id]) }}', true)" class="product-remove2-btn">
                                <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Remove" data-bs-placement="left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M11.4688 13.8594C11.7794 13.8594 12.0312 13.6075 12.0312 13.2969V7.67188C12.0312 7.36126 11.7794 7.10938 11.4688 7.10938C11.1581 7.10938 10.9062 7.36126 10.9062 7.67188V13.2969C10.9062 13.6075 11.1581 13.8594 11.4688 13.8594Z" fill="#0D0E10"/>
                                        <path d="M7.53125 13.8594C7.84186 13.8594 8.09375 13.6075 8.09375 13.2969V7.67188C8.09375 7.36126 7.84186 7.10938 7.53125 7.10938C7.22064 7.10938 6.96875 7.36126 6.96875 7.67188V13.2969C6.96875 13.6075 7.22064 13.8594 7.53125 13.8594Z" fill="#0D0E10"/>
                                        <path d="M11.75 2.89062C12.0606 2.89062 12.3125 2.63874 12.3125 2.32812C12.3125 2.01751 12.0606 1.76562 11.75 1.76562H7.25C6.93939 1.76562 6.6875 2.01751 6.6875 2.32812C6.6875 2.63874 6.93939 2.89062 7.25 2.89062H11.75Z" fill="#0D0E10"/>
                                        <path d="M3.3125 3.45312C3.00189 3.45312 2.75 3.70501 2.75 4.01562C2.75 4.32624 3.00189 4.57812 3.3125 4.57812H3.875V14.9281C3.875 16.1993 4.91 17.2344 6.18125 17.2344H12.8187C14.0899 17.2344 15.125 16.1994 15.125 14.9281V4.57812H15.6875C15.9981 4.57812 16.25 4.32624 16.25 4.01562C16.25 3.70501 15.9981 3.45312 15.6875 3.45312H14.5625H4.4375H3.3125ZM14 4.57812V14.9281C14 15.5806 13.4712 16.1094 12.8187 16.1094H6.18125C5.52875 16.1094 5 15.5806 5 14.9281V4.57812H14Z" fill="#0D0E10"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        @else
            <div class="text-center cartNodata d-flex ">
                <h4 class="al-title-18px">{{ get_phrase('Your cart is currently empty.') }}</h4>
            </div>
        @endif
    </div>
</div>

<div class="offcanvas-footer">
   
    <div class="chipping-cart-bottom">
        <div class="d-flex align-items-start justify-content-between gap-2 flex-wrap mb-20px">
            <h3 class="al-title-20px">{{ get_phrase('Total') }}</h3>
            <h3 class="al-title-20px text-end">{{ currency($cart_total_price) }}</h3>
        </div>
        <p class="al-subtitle-14px lh-1 mb-3">{{ get_phrase('Tax included and shipping calculated at checkout') }}</p>
        <div class="form-check form-checkbox3 mb-30px">
            <input class="form-check-input form-checkbox3-input" type="checkbox" value="" id="termscheck2">
            <label class="form-check-label form-checkbox3-label" for="termscheck2">
                {{ get_phrase('I agree with') }} <a href="{{route('terms_and_conditions')}}" class="fsh-text-dark text-link">{{ get_phrase('Terms & Conditions') }}</a>
            </label>
        </div>
         @if($my_cart_items->count() > 0)
        <div class="d-flex gap-2 align-items-start flex-wrap">
            <a href="{{ route('proceed.to.checkout') }}" class="btn fsh-btn-dark shopping-cart-btn">{{ strtoupper(get_phrase('CHECKOUT')) }}</a>
            <a href="{{ route('customer.cart_items') }}" class="btn fsh-btn-outline-dark shopping-cart-btn">{{ strtoupper(get_phrase('VIEW CART')) }}</a>
        </div>
        @else
            <div class="d-flex gap-2 align-items-start flex-wrap">
                <style>
                    .shopping-cart-btn{
                        pointer-events: none;
                        opacity: 0.6;
                    }
                </style>
                <span class="btn fsh-btn-dark shopping-cart-btn" disabled>{{ strtoupper(get_phrase('CHECKOUT')) }}</span>
                <span class="btn fsh-btn-outline-dark shopping-cart-btn" disabled>{{ strtoupper(get_phrase('VIEW CART')) }}</span>
            </div>
        @endif
    </div>
</div>
