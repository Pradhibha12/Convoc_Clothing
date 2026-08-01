@extends('layouts.vendor')
@push('title', get_phrase('Order Edit'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')


    <div class="ol-card p-4 mt-2 py-3">
        <div class="ol-card-body">
           <div class="row float-end">
                <div class="col-md-6 text-end">
                     <a href="{{ route('vendor.orders') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-arrow-alt-left"></span>
                        <span>{{ get_phrase('Back') }}</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="title fs-14px mb-1">{{ get_phrase('Requested on').' '.date_formatter($order->created_at) }}</h5>
                    <h6 class="up-badge-light text-break mb-10px">{{ get_phrase('Order ID').' #'.$order->id + 100 }}</h6>
                    <p class="mb-12px">{{ get_phrase('Total') }} :  {{ currency($order->payable_amount) }}</p>
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
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $order->shipping_address->address ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $order->shipping_address->zip_code ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $order->shipping_address->city->name ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $order->shipping_address->state->name ?? '' }}</li>
                            <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $order->shipping_address->country->name  ?? ''}}</li>
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
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Address') }} : {{ $order->billing_address->address ?? ''}}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('Zip code') }} : {{ $order->billing_address->zip_code  ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('City') }} : {{ $order->billing_address->city->name ?? '' }}</li>
                            <li class="secondary-dotted-list text-break">{{ get_phrase('State') }} : {{ $order->billing_address->state->name  ?? ''}}</li>
                            <li class="secondary-dotted-list">{{ get_phrase('Country') }} : {{ $order->billing_address->country->name ?? '' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                        <h3 class="title fs-18px mb-3">{{ get_phrase('Timeline') }}</h3>
                        <a href="#" onclick="ajaxModal('{{ route('view', ['path' => 'store.order.order_status_update', 'id' => $order->id]) }}', '{{ get_phrase('Update order status') }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Update timeline') }}" class="btn up-sm-btn-dark">
                            <span>{{ get_phrase('Update') }}</span>
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
                                        <h4 class="title fs-16px fw-medium">{{ $status->order_status->name }}</h4>
                                        <span class="fs-14px fw-medium">{{ $status->message }}</span>
                                        <p class="in-subtitle-14px lh-1 mt-1">{{ date_formatter($status->updated_at ?? $status->created_at) }}</p>
                                    </div>
                                    {{-- Delete icon --}}
                                    <a href="#" onclick="confirmModal('{{ route('vendor.order.timeline_remove', ['id' => $status->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="delete-icon" title="Delete">
                                        <i class="fi-rr-trash"></i>
                                    </a>
                                </div>
                            @endforeach

                            {{-- Always show Delivered step --}}
                            <div class="delivery-processing-step">
                                <div class="processing-step-circle {{ $deliveredStatus ? 'complete' : '' }}"></div>
                                <div>
                                    <h4 class="title fs-16px fw-medium mb-2">{{ get_phrase('Delivered') }}</h4>
                                    <p class="in-subtitle-14px lh-1">
                                        {{ $deliveredStatus ? date_formatter($deliveredStatus->updated_at ?? $deliveredStatus->created_at) : '' }}
                                    </p>
                                </div>
                                @if($deliveredStatus)
                                    {{-- Delete icon --}}
                                    <a href="javascript:;" onclick="confirmModal('{{ route('vendor.order.timeline_remove', ['id' => $deliveredStatus->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="delete-icon" title="Delete">
                                        <i class="fi-rr-trash"></i>
                                    </a>
                                @endif
                            </div>
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
                            <a href="{{ route('vendor.order.invoice', ['id'=> $order->id, 'download'=>'pdf']) }}" class="btn up-sm-btn-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M4.92958 5.39012L4.92958 5.39011L4.92862 5.3902C3.61385 5.5143 2.6542 5.93621 2.02459 6.70753C1.39588 7.47773 1.10332 8.58786 1.10332 10.0733V10.16C1.10332 11.8024 1.45436 12.9867 2.22713 13.7595C2.99991 14.5323 4.18424 14.8833 5.82665 14.8833H10.1733C11.8157 14.8833 13 14.5323 13.7728 13.7612C14.5456 12.9901 14.8967 11.8091 14.8967 10.1733V10.0866C14.8967 8.59113 14.5991 7.47419 13.9602 6.70226C13.3204 5.92932 12.3457 5.51089 11.0111 5.39684C10.7022 5.36756 10.4461 5.59606 10.4169 5.89512C10.3874 6.19725 10.6157 6.46052 10.9151 6.48974L10.9158 6.4898C11.9763 6.57928 12.6917 6.86831 13.1444 7.43131C13.5984 7.99603 13.7967 8.84663 13.7967 10.08V10.1666C13.7967 11.5198 13.5567 12.4208 12.9921 12.9855C12.4275 13.5501 11.5265 13.79 10.1733 13.79H5.82665C4.47345 13.79 3.57245 13.5501 3.00784 12.9855C2.44324 12.4208 2.20332 11.5198 2.20332 10.1666V10.08C2.20332 8.85326 2.39823 8.00578 2.84423 7.44096C3.28876 6.878 3.99097 6.58584 5.03125 6.48976L5.03139 6.48975C5.33896 6.46046 5.5591 6.18928 5.52975 5.88845C5.50032 5.58673 5.22199 5.36819 4.92958 5.39012Z" fill="white" stroke="white" stroke-width="0.1"/>
                                    <path d="M7.45 9.91998C7.45 10.2209 7.69905 10.47 8 10.47C8.30051 10.47 8.55 10.228 8.55 9.91998V1.33331C8.55 1.03237 8.30095 0.783313 8 0.783313C7.69905 0.783313 7.45 1.03237 7.45 1.33331V9.91998Z" fill="white" stroke="white" stroke-width="0.1"/>
                                    <path d="M7.61153 11.0554C7.7214 11.1652 7.86101 11.2167 8.00022 11.2167C8.13943 11.2167 8.27904 11.1652 8.38891 11.0554L10.6222 8.82202C10.8351 8.60916 10.8351 8.2575 10.6222 8.04464C10.4094 7.83178 10.0577 7.83178 9.84487 8.04464L8.00022 9.88929L6.15558 8.04464C5.94272 7.83178 5.59106 7.83178 5.3782 8.04464C5.16534 8.2575 5.16534 8.60916 5.3782 8.82202L7.61153 11.0554Z" fill="white" stroke="white" stroke-width="0.1"/>
                                </svg>
                                <span>{{ get_phrase('Invoice') }}</span>
                            </a>
                        </div>
                        <div class="up-light-box">
                            <h4 class="title fs-16px mb-3">{{ get_phrase('Total Summery') }}</h4>
                            <ul class="pb-3 mb-3 up-border-bottom">
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Subtotal') }}</span>
                                    <span>{{ $order->currency_code }} {{ number_format($order->total_price,2) }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Discount') }}</span>
                                    <span>- {{ $order->currency_code }} {{ number_format($order->total_discounted_amount ,2) }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Shipping Cost') }}</span>
                                    <span>{{ $order->currency_code }} {{ number_format($order->total_shipping_cost ,2) }}</span>
                                </li>
                                <li class="between-items-list">
                                    <span>{{ get_phrase('Vat') }}</span>
                                    <span>{{ $order->currency_code }} {{ number_format($order->total_amount_of_vat ,2) }}</span>
                                </li>
                            </ul>
                            <div class="d-flex align-items-start justify-content-between gap-3">
                                <h4 class="title fs-16px fw-medium">{{ get_phrase('Total') }}</h4>
                                <h4 class="title fs-16px fw-medium">{{ $order->currency_code }} {{ number_format($order->grand_total ,2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ol-card p-4">
                <div class="ol-card-body">
                    <div class="mb-20px">
                        <h3 class="title fs-18px mb-20px">{{ get_phrase('Order Item') }}</h3>
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
                                                <div class="product-view-sm d-flex align-item-center gap-3">
                                                    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-banner-sm2">
                                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="thumbnail">
                                                    </a>
                                                    <div>
                                                        <a href="{{ route('product', ['slug' => $product->slug]) }}" class="in-title-16px mb-12px text-link2 text-nowrap">{{ $product->title }}</a>
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
    </div>

    
@endsection
@push('js')
@endpush
