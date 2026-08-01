@extends('layouts.admin')
@push('title', get_phrase('Return Details'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card p-4 py-3">
        <div class="ol-card-body">
            <div class="row float-end">
                <div class="col-md-6 text-end">
                     <a href="{{ route('admin.order.return_requests') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="title fs-14px mb-1">{{ get_phrase('Requested on').' '.date_formatter($request_details->created_at) }}</h5>
                    <h6 class="up-badge-light text-break mb-10px">{{ get_phrase('Order ID').' #'.$request_details->order->id + 100 }}</h6>
                    <p class="mb-12px">{{ get_phrase('Total') }} :  {{ currency($request_details->order->payable_amount) }}</p>
                </div>
                <div class="col-md-4">
                    <div class="up-light-box mb-20px">
                        <div class="d-flex align-items-center gap-6px mb-3">
                            <span class="svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M9.99967 10.625C7.35801 10.625 5.20801 8.47496 5.20801 5.83329C5.20801 3.19163 7.35801 1.04163 9.99967 1.04163C12.6413 1.04163 14.7913 3.19163 14.7913 5.83329C14.7913 8.47496 12.6413 10.625 9.99967 10.625ZM9.99967 2.29163C8.04967 2.29163 6.45801 3.88329 6.45801 5.83329C6.45801 7.78329 8.04967 9.37496 9.99967 9.37496C11.9497 9.37496 13.5413 7.78329 13.5413 5.83329C13.5413 3.88329 11.9497 2.29163 9.99967 2.29163Z" fill="#242D47"/>
                                    <path d="M17.1585 18.9583C16.8168 18.9583 16.5335 18.675 16.5335 18.3333C16.5335 15.4583 13.6001 13.125 10.0001 13.125C6.40013 13.125 3.4668 15.4583 3.4668 18.3333C3.4668 18.675 3.18346 18.9583 2.8418 18.9583C2.50013 18.9583 2.2168 18.675 2.2168 18.3333C2.2168 14.775 5.70846 11.875 10.0001 11.875C14.2918 11.875 17.7835 14.775 17.7835 18.3333C17.7835 18.675 17.5001 18.9583 17.1585 18.9583Z" fill="#242D47"/>
                                </svg>
                            </span>
                            <h5 class="in-title-18px fw-medium">{{ get_phrase('Shipping Address') }}</h5>
                        </div>
                        <ul>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $request_details->order->shipping_address->address ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $request_details->order->shipping_address->zip_code ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $request_details->order->shipping_address->city->name  ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $request_details->order->shipping_address->state->name ?? '' }}</li>
                            <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $request_details->order->shipping_address->country->name ?? '' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="up-light-box mb-20px">
                        <div class="d-flex align-items-center gap-6px mb-3">
                            <span class="svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10.0004 11.8084C8.22539 11.8084 6.77539 10.3667 6.77539 8.58337C6.77539 6.80003 8.22539 5.3667 10.0004 5.3667C11.7754 5.3667 13.2254 6.80837 13.2254 8.5917C13.2254 10.375 11.7754 11.8084 10.0004 11.8084ZM10.0004 6.6167C8.91706 6.6167 8.02539 7.50003 8.02539 8.5917C8.02539 9.68337 8.90872 10.5667 10.0004 10.5667C11.0921 10.5667 11.9754 9.68337 11.9754 8.5917C11.9754 7.50003 11.0837 6.6167 10.0004 6.6167Z" fill="#242D47"/>
                                    <path d="M10.0004 18.9666C8.76706 18.9666 7.52539 18.5 6.55872 17.575C4.10039 15.2083 1.38372 11.4333 2.40872 6.94163C3.33372 2.86663 6.89206 1.04163 10.0004 1.04163C10.0004 1.04163 10.0004 1.04163 10.0087 1.04163C13.1171 1.04163 16.6754 2.86663 17.6004 6.94996C18.6171 11.4416 15.9004 15.2083 13.4421 17.575C12.4754 18.5 11.2337 18.9666 10.0004 18.9666ZM10.0004 2.29163C7.57539 2.29163 4.45872 3.58329 3.63372 7.21663C2.73372 11.1416 5.20039 14.525 7.43372 16.6666C8.87539 18.0583 11.1337 18.0583 12.5754 16.6666C14.8004 14.525 17.2671 11.1416 16.3837 7.21663C15.5504 3.58329 12.4254 2.29163 10.0004 2.29163Z" fill="#242D47"/>
                                </svg>
                            </span>
                            <h5 class="in-title-18px fw-medium">{{ get_phrase('Billing Address') }}</h5>
                        </div>
                        <ul>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $request_details->order->billing_address->address ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $request_details->order->billing_address->zip_code ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $request_details->order->billing_address->city->name ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $request_details->order->billing_address->state->name ?? '' }}</li>
                            <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $request_details->order->billing_address->country->name  ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .up-content-box{
            border-radius: 12px;
            background: var(--whiteColor);
            box-shadow: 0px 4px 40px 0px rgba(11, 11, 12, 0.07);
            padding: 24px;
        }
        .customer-review-single:not(:last-child){
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--borderColor);
        }
        .review-product-img {
            width: 100px;
            flex: 0 0 100px;
            height: 100px;
            border-radius: 8px;
        }
    </style>

        <div class="ol-card p-4 py-3 mt-4">
            <div class="ol-card-body">
                <h3 class="up-badge-light text-break mb-10px">{{ get_phrase('Summary') }}</h3>
                <!-- Comment -->
                <p class="in-subtitle-14px mb-3">{{ $request_details->message }}</p>
                <div class="fsh-magnific-popup mb-3 d-flex gap-12px flex-wrap" data-width="900px">
                    @foreach($request_details->images as $image)
                        <a class="review-product-img" href="{{ asset('uploads/order_return/' . $image) }}" target="_blank">
                            <img src="{{ asset('uploads/order_return/' . $image) }}" alt="Review Image">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="ol-card p-4 mb-3">
                <div class="ol-card-body">
                    <div class="mb-20px">
                        <h3 class="title fs-18px mb-20px">{{ get_phrase('Order Item') }}</h3>
                        <div class="table-responsive pb-1">
                            <table class="table product-table2">
                                <tbody>
                                    @foreach ($request_details->order->order_items as $order_item)
                                        @php
                                            $product = $order_item->product;
                                            $thumbnails = json_decode($product->thumbnail, true);
                                            $firstImage = $thumbnails[0] ?? null;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="product-view-sm d-flex align-item-center gap-3">
                                                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-banner-sm2">
                                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="thumbnail">
                                                    </a>
                                                    <div>
                                                        <a href="{{ route('product', ['slug' => $product->slug]) }}" class="in-title-16px mb-12px text-link2 text-nowrap">{{ $product->title }}</a>
                                                        
                                                        <p class="in-subtitle2-16px mb-12px">{{ get_phrase('Qty') }} : {{ $order_item->quantity }}</p>
                                                        <div class="d-flex align-items-center gap-2 flex-wrap">
                                                            
                                                            {{-- <h4 class="title fs-16px">{{ $request_details->order->currency_code }} {{ $order_item->price + $order_item->discounted_amount }}</h4> --}}
                                                            @if ($product->is_discounted && $product->is_discounted()->exists())
                                                                @php
                                                                    $discount = $product->is_discounted;
                                                                    $originalPrice = $order_item->price;
                                                                    $finalPrice = $originalPrice;
                                                                @endphp

                                                                @if ($discount->discount_type === 'percentage')
                                                                    @php
                                                                        $finalPrice = $originalPrice - ($originalPrice * $discount->discount_value / 100);
                                                                    @endphp

                                                                    <h4 class="title fs-16px">
                                                                        {{ currency($finalPrice) }}
                                                                    </h4>
                                                                    <h4 class="title fs-16px fw-medium up-text-gray">
                                                                        <del>{{ currency($originalPrice) }}</del>
                                                                    </h4>

                                                                @elseif ($discount->discount_type === 'flat')
                                                                    @php
                                                                        $finalPrice = $originalPrice - $discount->discount_value;
                                                                    @endphp

                                                                    <h4 class="title fs-16px">
                                                                        {{ currency($finalPrice) }}
                                                                    </h4>
                                                                    <h4 class="title fs-16px fw-medium up-text-gray">
                                                                        <del>{{ currency($originalPrice) }}</del>
                                                                    </h4>
                                                                @endif

                                                            @else
                                                                <h4 class="title fs-16px">
                                                                    {{ currency($order_item->price) }}
                                                                </h4>
                                                            @endif

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ol-card p-4 mb-3">
                <div class="ol-card-body">
                    <div class="mb-20px">
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <h4 class="title fs-18px">{{ get_phrase('Payment') }}</h4>
                        </div>
                        <div class="up-light-box">
                            <h4 class="title fs-16px mb-3">{{ get_phrase('Total Summery') }}</h4>
                            <ul class="pb-3 mb-3 up-border-bottom">
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Subtotal') }}</span>
                                    <span>{{ $request_details->order->currency_code }} {{ $request_details->order->total_price }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Discount') }}</span>
                                    <span>- {{ $request_details->order->currency_code }} {{ $request_details->order->total_discounted_amount }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Shipping Cost') }}</span>
                                    <span>{{ $request_details->order->currency_code }} {{ $request_details->order->total_shipping_cost }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Vat') }}</span>
                                    <span>{{ $request_details->order->currency_code }} {{ $request_details->order->total_amount_of_vat }}</span>
                                </li>
                            </ul>
                            <div class="d-flex align-items-start justify-content-between gap-3">
                                <h4 class="title fs-16px fw-medium">{{ get_phrase('Total') }}</h4>
                                <h4 class="title fs-16px fw-medium">{{ $request_details->order->currency_code }} {{ $request_details->order->grand_total }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
@push('js')
<script>
    'use strict';

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
</script>
@endpush
