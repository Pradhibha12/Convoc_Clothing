@extends('layouts.customer')
@push('title', get_phrase('My Returns'))
@push('meta')
@endpush
@push('css')
@endpush

@section('content')

    <!-- Order Details Area Start -->
    <section>
        <div class="container">
            <div class="row mt-3 mb-100px">
                <div class="col-xl-3 col-lg-4">
                    @include('frontend.customer_navigation')
                </div>
                <div class="col-xl-9 col-lg-8">
                    <!-- Top Area -->
                    <div class="d-flex align-items-start justify-content-between gap-2 mb-20px">
                        <div class="d-flex justify-content-between align-items-start align-items-lg-center gap-12px flex-column flex-lg-row w-100">
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('Return Details') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb">
                                  <li class="breadcrumb-item up-breadcrumb-item text-white-color"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('Return Details') }}</li>
                                </ol>
                            </nav>
                        </div>
                        <button class="btn up-icon-btn-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#up-sidebar-offcanvas" aria-controls="user-sidebar-offcanvas">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 5.25H3C2.59 5.25 2.25 4.91 2.25 4.5C2.25 4.09 2.59 3.75 3 3.75H21C21.41 3.75 21.75 4.09 21.75 4.5C21.75 4.91 21.41 5.25 21 5.25Z" fill="#242D47"></path>
                                <path d="M21 10.25H3C2.59 10.25 2.25 9.91 2.25 9.5C2.25 9.09 2.59 8.75 3 8.75H21C21.41 8.75 21.75 9.09 21.75 9.5C21.75 9.91 21.41 10.25 21 10.25Z" fill="#242D47"></path>
                                <path d="M21 15.25H3C2.59 15.25 2.25 14.91 2.25 14.5C2.25 14.09 2.59 13.75 3 13.75H21C21.41 13.75 21.75 14.09 21.75 14.5C21.75 14.91 21.41 15.25 21 15.25Z" fill="#242D47"></path>
                                <path d="M21 20.25H3C2.59 20.25 2.25 19.91 2.25 19.5C2.25 19.09 2.59 18.75 3 18.75H21C21.41 18.75 21.75 19.09 21.75 19.5C21.75 19.91 21.41 20.25 21 20.25Z" fill="#242D47"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Content Area -->
                    <!-- Content 1 -->
                    <div class="up-content-box mb-20px">
                        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-sm-nowrap">
                            <div>
                                <h2 class="in-title-16px mb-10px">{{ get_phrase('Return requested on').': '.date_formatter($request_details->created_at) }}</h2>
                                <p class="in-subtitle-14px lh-1 fw-medium text-break up-text-dark">{{ get_phrase('Order ID').' #'.$request_details->order->id + 100 }}</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="up-content-box mb-30px">
                        <div class="customer-review-single">
                            <h3 class="in-title-18px mb-20px">{{ get_phrase('Summary') }}</h3>
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
                    <div class="row g-18px">
                        <div class="col-md-6">
                            <div class="table-content-box2 mb-20px">
                                <h3 class="in-title-18px mb-20px">{{ get_phrase('Order Item') }}</h3>
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
                                                        <div class="product-view-sm">
                                                            <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-banner-sm2">
                                                                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                                                            </a>
                                                            <div>
                                                                <a href="{{ route('product', ['slug' => $product->slug]) }}" class="in-title-16px mb-12px text-link2 text-nowrap">{{ $product->title }}</a>
                                                                
                                                                <p class="in-subtitle2-16px mb-12px">{{ get_phrase('Qty') }} : {{ $order_item->quantity }}</p>
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                    {{-- <h4 class="in-title-16px">{{ $request_details->order->currency_code }} {{ $order_item->price + $order_item->discounted_amount }}</h4> --}}
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

                                                                                <h4 class="in-title-16px">
                                                                                    {{ currency($finalPrice) }}
                                                                                </h4>
                                                                                <h4 class="in-title-16px fw-medium up-text-gray">
                                                                                    <del>{{ currency($originalPrice) }}</del>
                                                                                </h4>

                                                                            @elseif ($discount->discount_type === 'flat')
                                                                                @php
                                                                                    $finalPrice = $originalPrice - $discount->discount_value;
                                                                                @endphp

                                                                                <h4 class="in-title-16px">
                                                                                    {{ currency($finalPrice) }}
                                                                                </h4>
                                                                                <h4 class="in-title-16px fw-medium up-text-gray">
                                                                                    <del>{{ currency($originalPrice) }}</del>
                                                                                </h4>
                                                                            @endif

                                                                        @else
                                                                            <h4 class="in-title-16px">
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
                        <div class="col-md-6">
                            <div class="up-shadow-box mb-20px">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                    <h4 class="in-title-18px">{{ get_phrase('Payment') }}</h4>
                                </div>
                                <div class="up-light-box">
                                    <h4 class="in-title-18px mb-3">{{ get_phrase('Total Summery') }}</h4>
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
                                        <h4 class="in-title-16px fw-medium">{{ get_phrase('Total') }}</h4>
                                        <h4 class="in-title-16px fw-medium">{{ $request_details->order->currency_code }} {{ $request_details->order->grand_total }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Area End -->

@endsection

@push('js')

@endpush