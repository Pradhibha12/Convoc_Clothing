@extends('layouts.payment')
@push('title', get_phrase('Payment'))
@push('meta')
@endpush
@push('css')
@endpush



@section('content')

@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $primary_button = json_decode($active_theme->primary_button, true);
     $filter = json_decode($active_theme->filter, true);
@endphp
@if (isset($body['background-color']))
    <style>
        /* background color */
        body {
            background-color: {{ $body['background-color'] }} !important;
        }
    </style>
@endif
@if (isset($font_family['font_family']))
    <style>
        /* background color */
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        
        .category-nav-link {
            font-family: {{ $font_family['font_family'] }};
        }
    </style>
@endif

@if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' || $active_theme->identifier == 'coffee')
    @if (isset($body['color']) && isset($primary_button['background-color']) && isset($primary_button['color']))
        <style>
            /*  color */
            .text-muted,
            .text-dark {
                color: {{ $body['color'] }} !important;
            }
            .bg-light,
            .btn-light {
               background-color: {{ $primary_button['background-color'] }} !important;
               color: {{ $primary_button['color'] }} !important;
              }
          
            /*  color */
        </style>
    @endif

    {{-- @if (isset($filter['background-color']) ) --}}
    <style>
        .payment-gateway-selector {
           margin-bottom: 4px;
        }
        /*  color */
    </style>

    {{-- @endif --}}

@endif

    @if (session('app_url'))
        @include('payment.go_back_to_mobile_app')
    @endif
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-6">
                        <h5 class="title text-capitalize text-dark">{{ get_phrase('Make Payment') }}</h5>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ $payment_details['cancel_url'] }}" class="float-end btn btn-light text-dark text-14px fw-600 d-flex align-items-center mb-2">
                            <i class="fi-br-cross-small mt-1 me-1"></i>
                            <span class="d-none d-sm-inline-block">{{ get_phrase('Cancel Payment') }}</span>
                        </a>
                    </div>
                </div>

                 @php
                    //Only Admin Payout Condition 
                    $allowed_gateways = ['stripe', 'paypal', 'razorpay', 'flutterwave'];

                    $paymentDetails = session('payment_details');
                    $isAdmin = auth()->check() && auth()->user()->role_id == 1;

                    $isPayout = isset($paymentDetails['success_method']['model_name'])
                                && $paymentDetails['success_method']['model_name'] === 'VendorPayment';
                    if ($isAdmin && $isPayout) {
                        $payment_gateways = \App\Models\Payment_gateway::where('status', 1)
                            ->whereIn('identifier', $allowed_gateways)
                            ->get();
                    } else {
                        $payment_gateways = \App\Models\Payment_gateway::where('status', 1)->get();
                    }
                @endphp

                @if(!$isAdmin || !$isPayout)

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted  py-3">{{ get_phrase('Products') }}</p>
                    </div>
                </div>
                @foreach ($cart_items as $key => $item)
                    <div class="row border-top">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 my-2">
                                <span class="d-inline-block w-30px h-30px bg-success-30 text-success text-12px text-center pt-6px radius-6px">{{ ++$key }}</span>
                                <div>
                                    <h6 class="text-dark text-14px">{{ $item->product->title }}</h6>
                                    {{-- <small class="text-muted allipsis-line-1">{{ \Illuminate\Support\Str::words($item->product->summary, 10, '...') }}</small> --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-6 text-end py-3">
                            @if ($item->product->is_discounted)
                                @php $discount = $item->product->discount; @endphp
                                <del class="text-10px">{{ currency($item->product->price * $item->quantity) }}</del>
                                @if ($discount->discount_type == 'percentage')
                                    <span class="text-12px text-dark">{{ currency(($item->product->price -($item->product->price / 100) * $discount->discount_value) * $item->quantity) }}</span>
                                @else
                                    <span class="text-12px text-dark">{{ currency(($item->product->price - $discount->discount_value) * $item->quantity) }}</span>
                                @endif
                            @else
                                <span class="text-12px text-dark">{{ currency($item->product->price * $item->quantity) }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="row border-top">
                    <div class="col-6">
                        <h6 class="text-dark text-14px py-3">{{ get_phrase('Vat') }}</h6>
                    </div>

                    <div class="col-6 text-end py-3">
                        <span class="text-dark">{{ currency($payment_details['total_amount_of_vat']) }}</span>
                    </div>
                </div>
                @if ($payment_details['coupon_discount_amount'] > 0 || session('coupon_id') > 0)
                    <div class="row border-top">
                        <div class="col-6">
                            <h6 class="text-dark text-14px py-3">{{ get_phrase('Coupon discount') }}</h6>
                        </div>

                        <div class="col-6 text-end py-3">
                            <span class="text-dark">{{ currency($payment_details['coupon_discount_amount']) }}</span>
                        </div>
                    </div>
                @endif
                

                <div class="row mb-4 border-top pt-4">
                    <div class="col-6">
                        <h6 class="title text-capitalize text-dark mb-2">{{ get_phrase('Select address') }}</h6>
                        <p class="text-muted">{{ get_phrase('Select address where you want to receive the product') }}</p>
                    </div>
                    <div class="col-6 text-end">
                        <a onclick="ajaxModal('{{ route('view', ['path' => 'frontend.shipping_addresses.add', 'return_route' => 'payment']) }}', '{{ get_phrase('Add a new shipping address') }}')" href="#" class="float-end btn btn-light text-dark text-14px fw-600 d-flex align-items-center">
                            <i class="fi-br-plus mt-1 me-1"></i>
                            <span class="d-none d-sm-inline-block">{{ get_phrase('Add new address') }}</span>
                        </a>
                    </div>
                </div>


                <div class="row mb-5">
                    @foreach (App\Models\Shipping_address::where('user_id', auth()->user()->id)->get() as $shipping_address)
                        <div class="col-md-4">
                            <label onclick="handleShippingAddress(this, '{{$shipping_address->id}}')" for="shipping_address{{ $shipping_address->id }}" class="d-flex align-items-center justify-content-between gap-2 border p-3 radius-10px hover-me address-selector selector @if($shipping_address->is_primary) selected @endif">
                                <div>
                                    <h6 class="text-dark text-14px mb-1">
                                        {{ $shipping_address->title }}
                                        <a  onclick="ajaxModal('{{ route('view', ['path' => 'frontend.shipping_addresses.edit', 'id' => $shipping_address->id, 'return_route' => 'payment']) }}', '{{ get_phrase('Edit your shipping address') }}')" class="ms-2 px-2 show-me" href="#"><i class="fi-br-pencil text-12px"></i></a>
                                    </h6>
                                    
                                    <small class="text-muted allipsis-line-1">
                                        <span class="text-dark">{{get_phrase('Country')}}:</span> {{ $shipping_address->country->name }}
                                    </small>
                                    <br>
                                    <small class="text-muted allipsis-line-1">
                                        <span class="text-dark">{{get_phrase('City')}}:</span> {{ $shipping_address->city->name }}
                                    </small>
                                    <br>
                                    <small class="text-muted allipsis-line-1">
                                        <span class="text-dark">{{get_phrase('State')}}:</span> {{ $shipping_address->state->name }}
                                    </small>
                                    <br>
                                    <small class="text-muted allipsis-line-1">
                                        <span class="text-dark">{{get_phrase('Zip code')}}:</span> {{ $shipping_address->zip_code }}
                                    </small>
                                    <br>
                                    <small class="text-muted allipsis-line-1">
                                        <span class="text-dark">{{get_phrase('Full address')}}:</span> {{ $shipping_address->address }}
                                    </small>
                                </div>
                                <input type="radio" name="shipping_address_id" id="shipping_address{{ $shipping_address->id }}" value="{{ $shipping_address->id }}" @if($shipping_address->is_primary) checked @endif required>
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="row border-top">
                    <div class="col-6">
                        <h6 class="text-dark text-14px py-3">{{ get_phrase('Shipping cost') }}</h6>
                    </div>

                    <div class="col-6 text-end py-3">
                        <span class="text-dark">{{ currency($payment_details['total_shipping_cost']) }}</span>
                    </div>
                </div>
                @endif

                


                <div class="row border-top py-4">
                    @if($isAdmin && $isPayout)
                        <p class="title text-capitalize text-dark">
                            {{ get_phrase('Pay for Vendor payout') }}
                        </p>
                    @endif
                    <div class="col-md-12 text-end py-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn bg-success-30 text-success text-14px">{{ get_phrase('Payable amount') }}</button>
                            <button type="button" class="btn bg-light text-dark text-14px fw-600">
                                {{ currency($payment_details['payable_amount']) }}
                            </button>
                        </div>
                    </div>
                </div>

                @include('payment.payment_gateway')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function handleShippingAddress(elem, shipping_address_id){
            if(!$(elem).hasClass('selected')){
                $('.address-selector').removeClass('selected');
                $(elem).addClass('selected');
    
                actionTo("{{route('payment.set_shipping_address')}}/"+shipping_address_id);
            }
        }
    </script>
@endpush
