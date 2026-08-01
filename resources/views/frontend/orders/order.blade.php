@extends('layouts.customer')
@push('title', get_phrase('My Orders'))
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
                        <h1 class="in-title-24px text-white-color">{{ get_phrase('Order Details') }}</h1>
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
                    <div class="up-shadow-box d-flex align-items-center justify-content-between gap-3 flex-wrap mb-20px">
                        <div>
                            <h5 class="in-title-16px mb-10px">{{ get_phrase('Requested on').' '.date_formatter($order->created_at) }}</h5>
                            <h6 class=" in-title-16px text-break mb-10px">{{ get_phrase('Order ID').' #'.$order->id + 100 }}</h6>
                            <p class="in-subtitle2-16px mb-12px">{{ get_phrase('Total') }} : {{ currency($order->payable_amount) }}</p>
                        </div>
                        <div class="up-light-box mb-20px">
                            <div class="d-flex align-items-center gap-6px mb-3">
                                <span class="svg-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M9.99967 10.625C7.35801 10.625 5.20801 8.47496 5.20801 5.83329C5.20801 3.19163 7.35801 1.04163 9.99967 1.04163C12.6413 1.04163 14.7913 3.19163 14.7913 5.83329C14.7913 8.47496 12.6413 10.625 9.99967 10.625ZM9.99967 2.29163C8.04967 2.29163 6.45801 3.88329 6.45801 5.83329C6.45801 7.78329 8.04967 9.37496 9.99967 9.37496C11.9497 9.37496 13.5413 7.78329 13.5413 5.83329C13.5413 3.88329 11.9497 2.29163 9.99967 2.29163Z" fill="#242D47"/>
                                        <path d="M17.1585 18.9583C16.8168 18.9583 16.5335 18.675 16.5335 18.3333C16.5335 15.4583 13.6001 13.125 10.0001 13.125C6.40013 13.125 3.4668 15.4583 3.4668 18.3333C3.4668 18.675 3.18346 18.9583 2.8418 18.9583C2.50013 18.9583 2.2168 18.675 2.2168 18.3333C2.2168 14.775 5.70846 11.875 10.0001 11.875C14.2918 11.875 17.7835 14.775 17.7835 18.3333C17.7835 18.675 17.5001 18.9583 17.1585 18.9583Z" fill="#242D47"/>
                                    </svg>
                                </span>
                                <h5 class="in-title-16px fw-medium">{{ get_phrase('Shipping Address') }}</h5>
                            </div>
                            <ul>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $order->shipping_address->address ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $order->shipping_address->zip_code ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $order->shipping_address->city->name ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $order->shipping_address->state->name  ?? ''}}</li>
                                <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $order->shipping_address->country->name ?? '' }}</li>
                            </ul>
                        </div>
                        <div class="up-light-box mb-20px">
                            <div class="d-flex align-items-center gap-6px mb-3">
                                <span class="svg-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M10.0004 11.8084C8.22539 11.8084 6.77539 10.3667 6.77539 8.58337C6.77539 6.80003 8.22539 5.3667 10.0004 5.3667C11.7754 5.3667 13.2254 6.80837 13.2254 8.5917C13.2254 10.375 11.7754 11.8084 10.0004 11.8084ZM10.0004 6.6167C8.91706 6.6167 8.02539 7.50003 8.02539 8.5917C8.02539 9.68337 8.90872 10.5667 10.0004 10.5667C11.0921 10.5667 11.9754 9.68337 11.9754 8.5917C11.9754 7.50003 11.0837 6.6167 10.0004 6.6167Z" fill="#242D47"/>
                                        <path d="M10.0004 18.9666C8.76706 18.9666 7.52539 18.5 6.55872 17.575C4.10039 15.2083 1.38372 11.4333 2.40872 6.94163C3.33372 2.86663 6.89206 1.04163 10.0004 1.04163C10.0004 1.04163 10.0004 1.04163 10.0087 1.04163C13.1171 1.04163 16.6754 2.86663 17.6004 6.94996C18.6171 11.4416 15.9004 15.2083 13.4421 17.575C12.4754 18.5 11.2337 18.9666 10.0004 18.9666ZM10.0004 2.29163C7.57539 2.29163 4.45872 3.58329 3.63372 7.21663C2.73372 11.1416 5.20039 14.525 7.43372 16.6666C8.87539 18.0583 11.1337 18.0583 12.5754 16.6666C14.8004 14.525 17.2671 11.1416 16.3837 7.21663C15.5504 3.58329 12.4254 2.29163 10.0004 2.29163Z" fill="#242D47"/>
                                    </svg>
                                </span>
                                <h5 class="in-title-16px fw-medium">{{ get_phrase('Billing Address') }}</h5>
                            </div>
                            <ul>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $order->billing_address->address ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $order->billing_address->zip_code ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $order->billing_address->city->name ?? ''}}</li>
                                <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $order->billing_address->state->name ?? '' }}</li>
                                <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $order->billing_address->country->name ?? '' }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row g-18px">
                        <div class="col-md-6">
                            <div class="up-shadow-box">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                    <h4 class="in-title-18px">{{ get_phrase('Timeline') }}</h4>
                                    <a href="javascript:;" onclick="ajaxModal('{{ route('view', ['path' => 'frontend.orders.cancel_order', 'id' => $order->id]) }}', '{{ get_phrase('Order cancel request') }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Cancel Order') }}" class="btn up-sm-btn-dark">
                                        <span>{{ get_phrase('Cancel Order') }}</span>
                                    </a>
                                </div>
                              
                                <div class="col">
                                    @php
                                        $orderStatuses = App\Models\Order_update::where('order_id', $order->id)->get();

                                        // Check if Delivered status exists
                                        $deliveredStatus = $orderStatuses->firstWhere('order_status.name', 'Delivered');

                                        // Remove Delivered from the loop list
                                        $orderStatuses = $orderStatuses->reject(function ($status) {
                                            return $status->order_status->name === 'Delivered';
                                        });
                                    @endphp

                                    <div class="delivery-processing-card">
                                        @foreach ($orderStatuses as $status)
                                            <div class="delivery-processing-step">
                                                <div class="processing-step-circle {{ check_order_process_status($order->id, $status->order_status_id) ? 'complete' : '' }}"></div>
                                                <div>
                                                    <h4 class="in-title-14px fw-medium mb-2">{{ $status->order_status->name }}</h4>
                                                    <span class="in-subtitle-14px fw-medium">{{ $status->message }}</span>
                                                    <p class="in-subtitle-14px lh-1">{{ date_formatter($status->updated_at ?? $status->created_at) }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- Always show Delivered step --}}
                                        <div class="delivery-processing-step">
                                            <div class="processing-step-circle {{ $deliveredStatus ? 'complete' : '' }}"></div>
                                            <div>
                                                <h4 class="in-title-14px fw-medium mb-2">{{ get_phrase('Delivered') }}</h4>
                                                <p class="in-subtitle-14px lh-1">
                                                    {{ $deliveredStatus ? date_formatter($deliveredStatus->updated_at ?? $deliveredStatus->created_at) : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
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
                                            <span>{{ $order->currency_code }} {{ $order->total_price }}</span>
                                        </li>
                                        <li class="between-items-list">
                                            <span>{{ get_phrase('Discount') }}</span>
                                            <span>- {{ $order->currency_code }} {{ $order->total_discounted_amount }}</span>
                                        </li>
                                        <li class="between-items-list">
                                            <span>{{ get_phrase('Shipping Cost') }}</span>
                                            <span>{{ $order->currency_code }} {{ $order->total_shipping_cost }}</span>
                                        </li>
                                        <li class="between-items-list">
                                            <span>{{ get_phrase('Vat') }}</span>
                                            <span>{{ $order->currency_code }} {{ $order->total_amount_of_vat }}</span>
                                        </li>
                                    </ul>
                                    <div class="d-flex align-items-start justify-content-between gap-3">
                                        <h4 class="in-title-16px fw-medium">{{ get_phrase('Total') }}</h4>
                                        <h4 class="in-title-16px fw-medium">{{ $order->currency_code }} {{ $order->grand_total }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="table-content-box2 mb-20px">
                                <h3 class="in-title-18px mb-20px">{{ get_phrase('Order Item') }}</h3>
                                <div class="table-responsive pb-1">
                                    <table class="table product-table2">
                                        <tbody>
                                            @foreach ($order->order_items as $order_item)
                                                @php
                                                    $product = $order_item->product;

                                                     $thumbnails = json_decode($product->thumbnail, true);
                                                     $firstImage = $thumbnails[0] ?? null; 
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="product-view-sm">
                                                            <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-banner-sm2">
                                                                <img class="banner" src="{{ get_image($firstImage) }}" alt="thumbnail">
                                                            </a>
                                                            <div>
                                                                <a href="{{ route('product', $product->slug) }}" class="in-title-16px mb-12px text-link2 text-nowrap">{{ $product->title }}</a>
                                                                {{-- <p class="in-subtitle2-16px mb-12px">Size: Black / S</p> --}}
                                                                <p class="in-subtitle2-16px mb-12px">{{ get_phrase('Qty') }} : {{ $order_item->quantity }}</p>
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">

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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Area End -->

@endsection

@push('js')

@endpush
