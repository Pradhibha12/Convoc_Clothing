@php
    $total_price = 0;
    $total_discounted_price = 0;
    $total_amount_of_vat = 0;
    $total_shipping_cost = 0;
    $total_order_amount = 0;
    $coupon_discount_amount = 0;
    $grand_total = 0;
    $processedStores = []; // Track stores for one-time shipping

    
@endphp

<style>
    .fsh-form-control {
        /* background: #fff; */
        border: 1px solid #D9D9DF;
    }
    
</style>
<div class="col-xl-8 col-lg-7">
    <div class="wow animate__fadeInUp etable" data-wow-delay=".2s">
        <!-- Table -->
        <div class="table-responsive mb-20px pb-1">
            <table class="table fsh1-table">
                <thead class="fsh-table-head">
                    <tr class="table-row-light">
                        <th class="table1-heading text-nowrap">{{ get_phrase('Products') }}</th>
                        <th class="table1-heading text-nowrap">{{ get_phrase('Price') }}</th>
                        <th class="table1-heading text-nowrap">{{ get_phrase('QuantityProducts') }}</th>
                        <th class="table1-heading text-nowrap text-center">{{ get_phrase('Total Price') }}</th>
                        <th class="table1-heading text-nowrap"></th>
                    </tr>
                </thead>
                <tbody class="fsh-table-body">
                    @foreach (App\Models\Cart_item::with(['product', 'product.discount'])->where('user_id', auth()->user()->id)->get() as $cart_item)
                        @php
                            $quantity_price = $cart_item->product->price * $cart_item->quantity;
                            $total_price += $cart_item->product->price * $cart_item->quantity;

                            if ($cart_item->product->is_discounted) {
                                
                                $discount = $cart_item->product->discount;
                                if ($discount->discount_type == 'percentage') {
                                    $total_discounted_price += ($cart_item->product->price / 100) * $discount->discount_value * $cart_item->quantity;
                                } else {
                                    $total_discounted_price += $discount->discount_value * $cart_item->quantity;
                                }
                            }

                           

                            $storeSettings = $cart_item->product->store->settings;

                            if ($storeSettings && $storeSettings->vat_type === 'percentage') {
                                $total_amount_of_vat += ($cart_item->product->price / 100) 
                                    * $storeSettings->vat_value 
                                    * $cart_item->quantity;
                            } else {
                                $total_amount_of_vat += ($storeSettings->vat_value ?? 0) 
                                    * $cart_item->quantity;
                            }

                           

                            // Shipping cost - once per store
                            $storeId = $cart_item->product->store->id;
                            if (!in_array($storeId, $processedStores)) {
                                $total_shipping_cost += $storeSettings->shipping_cost ?? 0;
                                $processedStores[] = $storeId;
                            }

                            $total_order_amount = $total_price - $total_discounted_price;
                        @endphp
                        <tr>
                            <td class="min-w-280px d-flex align-items-center gap-12px">
                                @php
                                $thumbnails = json_decode($cart_item->product->thumbnail, true);
                                $firstImage = $thumbnails[0] ?? null;
                            @endphp
                                <a href="{{ route('product', ['slug' => $cart_item->product->slug]) }}" class="cart-product-banner">

                                    <img src="{{ get_image($firstImage) }}" alt="thubnail">
                                </a>
                                <div>
                                    <a href="{{ route('product', ['slug' => $cart_item->product->slug]) }}" class="al-title-16px mb-1 product-title-link">{{ $cart_item->product->title }}</a>
                                    @include('components.item_attributes_display', ['item_attributes' => $cart_item->item_attributes])
                                   
                                    <div class="d-flex align-items-center gap-2 mt-2">
                                        @if ($cart_item->product->is_discounted)
                                            @php
                                                $discount = $cart_item->product->discount;
                                            @endphp
                                            @if ($discount->discount_type == 'percentage')
                                                <h4 class="al-title-16px">{{ currency($cart_item->product->price - ($cart_item->product->price / 100) * $discount->discount_value) }}</h4>
                                            @else
                                                <h4 class="al-title-16px">{{ currency($cart_item->product->price - $discount->discount_value) }}</h4>
                                            @endif
                                            <h4 class="al-title-16px fw-medium fsh-text-gray text-decoration-linethrough"><del>{{ currency($cart_item->product->price) }}</del></h4>
                                        @else
                                            <h4 class="al-title-16px">{{ currency($cart_item->product->price) }}</h4>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="al-title-16px fsh-text-dark text-nowrap">
                                @if ($cart_item->product->is_discounted)
                                    @php
                                        $discount = $cart_item->product->discount;
                                    @endphp
                                    @if ($discount->discount_type == 'percentage')
                                        <h4 class="al-title-16px">{{ currency($cart_item->product->price - ($cart_item->product->price / 100) * $discount->discount_value) }}</h4>
                                    @else
                                        <h4 class="al-title-16px">{{ currency($cart_item->product->price - $discount->discount_value) }}</h4>
                                    @endif
                                @else
                                    <h4 class="al-title-16px">{{ currency($cart_item->product->price) }}</h4>
                                @endif
                            </td>
                            <td>
                                <form action="">
                                    <div class="d-flex align-items-center quantity-input-wrap">
                                        <button class="quantity-btn dec" type="button" onclick="actionTo('{{ route('customer.cart_item_quantity.update', ['cart_item_id' => $cart_item->id, 'sign' => 'minus']) }}', 'post');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <path d="M12.8338 7L1.16715 7" stroke="#818195" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>         
                                        </button>
                                        <input type="number" class="quantity-of-product" id="" value="{{ $cart_item->quantity }}" readonly>
                                        <button class="quantity-btn inc" type="button" onclick="actionTo('{{ route('customer.cart_item_quantity.update', ['cart_item_id' => $cart_item->id, 'sign' => 'plus']) }}', 'post');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                <g clip-path="url(#clip0_1538_10740)">
                                                <path d="M7.00098 1.16675L7.00098 12.8334" stroke="#818195" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M12.834 7.00012L1.16732 7.00012" stroke="#818195" stroke-width="1.5" stroke-linecap="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_1538_10740">
                                                    <rect width="14" height="14" fill="white"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="al-title-16px fsh-text-dark text-nowrap text-center">
                                {{ $quantity_price }}
                            </td>
                            <td class="table-action-data">
                                <a onclick="confirmModal('{{ route('customer.cart_item.delete', ['product_id' => $cart_item->product->id]) }}', true)" href="javascript:void(0)" class="bordered-circle-iconlink">
                                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Remove" data-bs-placement="top">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                            <path d="M10.9688 13.8594C11.2794 13.8594 11.5312 13.6075 11.5312 13.2969V7.67188C11.5312 7.36126 11.2794 7.10938 10.9688 7.10938C10.6581 7.10938 10.4062 7.36126 10.4062 7.67188V13.2969C10.4062 13.6075 10.6581 13.8594 10.9688 13.8594Z" fill="#0D0E10"/>
                                            <path d="M7.03125 13.8594C7.34186 13.8594 7.59375 13.6075 7.59375 13.2969V7.67188C7.59375 7.36126 7.34186 7.10938 7.03125 7.10938C6.72064 7.10938 6.46875 7.36126 6.46875 7.67188V13.2969C6.46875 13.6075 6.72064 13.8594 7.03125 13.8594Z" fill="#0D0E10"/>
                                            <path d="M11.25 2.89062C11.5606 2.89062 11.8125 2.63874 11.8125 2.32812C11.8125 2.01751 11.5606 1.76562 11.25 1.76562H6.75C6.43939 1.76562 6.1875 2.01751 6.1875 2.32812C6.1875 2.63874 6.43939 2.89062 6.75 2.89062H11.25Z" fill="#0D0E10"/>
                                            <path d="M2.8125 3.45312C2.50189 3.45312 2.25 3.70501 2.25 4.01562C2.25 4.32624 2.50189 4.57812 2.8125 4.57812H3.375V14.9281C3.375 16.1993 4.41 17.2344 5.68125 17.2344H12.3187C13.5899 17.2344 14.625 16.1994 14.625 14.9281V4.57812H15.1875C15.4981 4.57812 15.75 4.32624 15.75 4.01562C15.75 3.70501 15.4981 3.45312 15.1875 3.45312H14.0625H3.9375H2.8125ZM13.5 4.57812V14.9281C13.5 15.5806 12.9712 16.1094 12.3187 16.1094H5.68125C5.02875 16.1094 4.5 15.5806 4.5 14.9281V4.57812H13.5Z" fill="#0D0E10"/>
                                        </svg>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@php

    $grand_total += $total_price - $total_discounted_price + $total_amount_of_vat + $total_shipping_cost;
    
    if (isset($coupon)) {
        if ($coupon->user_id != auth()->id() && $coupon->user_id > 0) {
            $coupon_alert = get_phrase('This coupon is not applicable for you.');
            session(['coupon_id' => '']);
        } elseif (!$coupon->id) {
            $coupon_alert = get_phrase('Invalid coupon code.');
            session(['coupon_id' => '']);
        } elseif ($total_order_amount < $coupon->minimum_order_amount) {
            $coupon_alert = get_phrase('Only ____ left to get the coupon offer.', currency($coupon->minimum_order_amount - $total_order_amount));
            session(['coupon_id' => '']);
        } elseif ($coupon->usage_limit === 0) {
            $coupon_alert = get_phrase('This coupon is no longer available. The usage limit was reached.');
            session(['coupon_id' => '']);
        } elseif (strtotime($coupon->start_date) > time()) {
            $coupon_alert = get_phrase('This coupon will be available from ____.', date_formatter($coupon->start_date));
            session(['coupon_id' => '']);
        } elseif (strtotime($coupon->end_date) < time()) {
            $coupon_alert = get_phrase('This coupon has expired.');
            session(['coupon_id' => '']);
        } else {
            if ($coupon->discount_type == 'percentage') {
                $coupon_discount_amount = ($total_order_amount / 100) * $coupon->discount_value;
            } else {
                $coupon_discount_amount = $coupon->discount_value;
            }
            $coupon_discount_amount = $coupon_discount_amount > $coupon->maximum_discount_amount ? $coupon->maximum_discount_amount : $coupon_discount_amount;

            $coupon_alert = get_phrase('A coupon of ____ has been applied, saving you ____.', [$coupon->code, currency($coupon_discount_amount)]);
            $grand_total = $grand_total - $coupon_discount_amount;
            session(['coupon_id' => $coupon->id]);
        }
    }
@endphp

<!-- Right Sidebar -->
<div class="col-xl-4 col-lg-5">
    <div class="gray-card-sidebar wow animate__fadeInUp" data-wow-delay=".3s">
        <h3 class="al-title-20px mb-20px lh-1">{{ get_phrase('Order Summary') }}</h3>
        <!-- List -->
        <ul class="mb-20px pb-20px fsh-border-bottom d-flex flex-column gap-20px">
            <li class="al-title-16px d-flex gap-3 align-items-start justify-content-between">
                <span class="fw-medium">{{ get_phrase('Price') }}</span>
                <span>{{ currency($total_price) }}</span>
            </li>
            <li class="al-title-16px d-flex gap-3 align-items-start justify-content-between">
                <span class="fw-medium">{{ get_phrase('Discount') }}</span>
                <span>- {{ currency($total_discounted_price) }}</span>
            </li>
            <li class="al-title-16px d-flex gap-3 align-items-start justify-content-between">
                <span class="fw-medium">{{ get_phrase('Vat') }}</span>
                <span>{{ currency($total_amount_of_vat) }}</span>
            </li>
            <li class="al-title-16px d-flex gap-3 align-items-start justify-content-between">
                <span class="fw-medium">{{ get_phrase('Shipping') }}</span>
                <span class="fsh-text-skin">{{ currency($total_shipping_cost) }}</span>
            </li>
            <li class="al-title-16px d-flex gap-3 align-items-start justify-content-between">
                <span class="fw-medium">{{ get_phrase('Coupon Applied') }}</span>
                <span>{{ currency($coupon_discount_amount) }}</span>
            </li>
        </ul>
        <div class="mb-20px pb-20px fsh-border-bottom">
            <form id="couponForm" action="{{ route('customer.coupon.applied') }}" method="post" class="ajaxForm">
                @csrf
                <label for="couponField" class="al-title-16px fw-medium mb-2 d-block">{{ get_phrase('Apply Coupon Code') }}</label>
                <div class="d-flex gap-2">
                    <input type="text" name="coupon_code" id="couponField" class="form-control fsh-form-control" placeholder="{{ get_phrase('Enter coupon code') }}" value="{{ isset($coupon) && $coupon->code ? $coupon->code : '' }}">
                    <button type="submit" class="btn fsh-btn-dark text-nowrap px-4">{{ get_phrase('Apply') }}</button>
                </div>
            </form>
        </div>
        <div class="mb-20px pb-20px fsh-border-bottom">
            <div class="d-flex gap-3 align-items-start justify-content-between mb-3">
                <h4 class="al-title-16px fw-medium">{{ get_phrase('TOTAL') }}</h4>
                <h4 class="al-title-18px">{{ currency($grand_total) }}</h4>
            </div>
            
        </div>
        @if (isset($coupon))
            @if ($coupon_discount_amount > 0)
                <div class="alert alert-success alert-dismissible fade show" role="alert" data-coupon-id="{{ $coupon->id }}">
                    <strong>{{ $coupon->code }}!</strong> {{ $coupon_alert }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeCoupon()"></button>
                </div>
            @else
                <div class="alert alert-warning alert-dismissible fade show" role="alert" data-coupon-id="{{ $coupon->id }}">
                    <strong>{{ $coupon->code }}!</strong> {{ $coupon_alert }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="removeCoupon()"></button>
                </div>
            @endif
        @endif
      
        <p class="al-subtitle-16px fw-medium mb-20px">{{get_phrase('Tax included and shipping calculated at checkout')}}</p>
        <div class="form-check form-checkbox2 mb-20px">
            <input class="form-check-input form-checkbox2-input" type="checkbox" value="" id="termscheck">
            <label class="form-check-label form-checkbox2-label" for="termscheck">
                {{get_phrase('I agree with')}} <a href="{{route('terms_and_conditions')}}" class="fw-semibold text-decoration-underline text-link">{{get_phrase('Terms & Conditions')}}</a>
            </label>
        </div>
        <a href="{{ route('proceed.to.checkout') }}" class="btn fsh-btn-dark w-100 mb-3">{{ strtoupper(get_phrase('PROCEED TO CHECKOUT')) }}</a>
        <div class="d-flex justify-content-center">
            <a href="{{ route('home') }}" class="text-link al-title-16px fw-medium text-center">{{ get_phrase('Continue Shopping') }}</a>
        </div>
    </div>
</div>

@if (request()->ajax())
    <script>
         "use strict";
        initScript();
    </script>
@endif

<script>
    'use strict';

    function removeCoupon() {
        $.ajax({
            url: "{{ route('customer.coupon.applied') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                coupon_code: ""
            },
            success: function(response) {
                try {
                    let jsonResp = typeof response === 'string' ? JSON.parse(response) : response;
                    if (typeof distributeServerResponse === 'function') {
                        distributeServerResponse(jsonResp);
                    } else {
                        location.reload();
                    }
                } catch(e) {
                    location.reload();
                }
            }
        });
    }

</script>