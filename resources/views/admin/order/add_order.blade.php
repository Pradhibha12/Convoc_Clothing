@extends('layouts.admin')
@push('title', get_phrase('Order Add'))
@push('meta')
@endpush
@push('css')
    <style>
        .offcanvas-cart-item {
            column-gap: 14px;
        }

        .offcanvas-cart-item .image {
            min-width: 84px;
            width: 84px;
            height: 89px;
            border-radius: 8px;
            border: 1px solid #D8DADA;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .offcanvas-cart-item .image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Increment */
        .offcanvas-cart-total {
            border-radius: 4px;
            border: 1px solid #D8DADA;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 78px;
            width: 78px;
            background: var(--whiteColor);
            margin-bottom: 20px;
        }

        .offcanvas-cart-total .icon span::before {
            display: block;
        }

        .offcanvas-cart-total .icon span {
            font-size: 12px;
            color: var(--grayColor);
            transition: .3s;
        }

        .offcanvas-cart-total .icon:hover span {
            color: var(--skinColor);
        }

        .offcanvas-cart-total .icon {
            padding: 9px 8px;
            border-radius: inherit;
            background: transparent;
        }

        .offcanvas-cart-total input {
            max-width: 20px;
            width: 100%;
            text-align: center;
            border: none;
            background: transparent;
            color: var(--darkColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: 20px;
        }

        .offcanvas-cart-total input::-webkit-inner-spin-button,
        .offcanvas-cart-total input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .offcanvas-cart-total input:focus {
            box-shadow: none;
            outline: none;
        }

        .offcanvas-cartitem-details {
            column-gap: 20px;
            row-gap: 10px;
            max-width: 100%;
            width: 100%;
        }

        .offcanvas-cartitem-details .title-price .title {
            color: var(--darkColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            margin-bottom: 8px;
            max-width: 180px;
            width: 100%;
        }

        .offcanvas-cartitem-details .title-price .price {
            color: var(--darkColor);
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            display: flex;
            align-items: flex-end;
            column-gap: 6px;
        }

        .offcanvas-cartitem-details .title-price .price .old {
            color: var(--grayColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 500;
            line-height: 20px;
            text-decoration: line-through;
            margin-bottom: 1px;
        }

        .offcanvas-cart-total-remove {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
            height: 100%;
        }

        .offcanvas-cart-total-remove .remove {
            color: var(--grayColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            text-decoration: underline;
        }

        .offcanvas-cart-total-remove .remove:hover {
            color: var(--bs-pink);
        }

        .offcanvas-checkout-area .total {
            color: var(--darkColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            margin-bottom: 4px;
        }

        .offcanvas-checkout-area .amount {
            color: var(--darkColor);
            font-size: 24px;
            font-style: normal;
            font-weight: 500;
            line-height: 32px;
            margin-bottom: 8px;
        }

        .offcanvas-checkout-area .info {
            color: var(--darkColor);
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
        }

        .offcanvas-checkout-area .btn-area {
            column-gap: 14px;
        }

        @media all and (max-width: 367px) {

            /* Header Shop Cart */
            .cart-offcanvas .offcanvas-title {
                font-size: 20px;
                line-height: 30px;
            }

            .offcanvas-checkout-area .amount {
                font-size: 20px;
                line-height: 30px;
            }

            .offcanvas-cartitem-details {
                flex-direction: column;
            }

            .offcanvas-cart-total {
                margin-bottom: 10px;
            }

            .offcanvas-cart-total-remove {
                align-items: flex-start;
            }

            .offcanvas-cartitem-details {
                align-items: flex-start !important;
            }

            .offcanvas-cart-item {
                align-items: flex-start !important;
            }

        }
    </style>
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-2 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                  
                </h4>

                <a href="{{ route('admin.orders') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.order.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="ol-card p-4">
                    <div class="ol-card-body">


                        <h6 class="title mb-3">{{ get_phrase('Customer Information') }}</h6>
                        <div class="mb-3">
                            
                            <select class="ol-select2" name="user_id" onchange="load_view('{{ route('view', ['path' => 'admin.order.customer_information']) }}?user_id='+$(this).val(), '#customer-information')" id="user_id" required>
                                <option value="">{{ get_phrase('Select a customer') }}</option>
                                @foreach (App\Models\User::where('user_type', 'customer')->get() as $customer)
                                    <option @if (old('user_id') == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="customer-information">
                            @include('admin.order.add_customer_information')
                        </div>


                        <h6 class="title mb-3 mt-3">{{ get_phrase('Order Information') }}</h6>

                        <div class="mb-3">
                            <select class="ol-select2" name="status" id="status" required>
                                <option value="">{{ get_phrase('Select an order status') }}</option>
                                <option @if (old('status') == 'awaiting_pickup') selected @endif value="awaiting_pickup">{{ get_phrase('Awaiting pickup') }}</option>
                                <option @if (old('status') == 'canceled') selected @endif value="canceled">{{ get_phrase('Canceled') }}</option>
                                <option @if (old('status') == 'delivered') selected @endif value="delivered">{{ get_phrase('Delivered') }}</option>
                                <option @if (old('status') == 'delayed') selected @endif value="delayed">{{ get_phrase('Delayed') }}</option>
                                <option @if (old('status') == 'in_transit') selected @endif value="in_transit">{{ get_phrase('In transit') }}</option>
                                <option @if (old('status') == 'lost') selected @endif value="lost">{{ get_phrase('Lost') }}</option>
                                <option @if (old('status') == 'order_confirmed') selected @endif value="order_confirmed">{{ get_phrase('Order confirmed') }}</option>
                                <option @if (old('status') == 'out_for_delivery') selected @endif value="out_for_delivery">{{ get_phrase('Out for delivery') }}</option>
                                <option @if (old('status') == 'payment_received') selected @endif value="payment_received">{{ get_phrase('Payment received') }}</option>
                                <option @if (old('status') == 'pending') selected @endif value="pending">{{ get_phrase('Pending') }}</option>
                                <option @if (old('status') == 'pending_payment') selected @endif value="pending_payment">{{ get_phrase('Pending payment') }}</option>
                                <option @if (old('status') == 'processing') selected @endif value="processing">{{ get_phrase('Processing') }}</option>
                                <option @if (old('status') == 'refunded') selected @endif value="refunded">{{ get_phrase('Refunded') }}</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            
                            <textarea name="shipping_address" id="shipping_address" rows="3" class="form-control ol-form-control" placeholder="{{ get_phrase('Shipping address') }}">{{ old('shipping_address') }}</textarea>
                        </div>

                        <div class="mb-3">
                            
                            <textarea name="note" id="note" rows="3" class="form-control ol-form-control" placeholder="{{ get_phrase('Order Note') }}">{{ old('note') }}</textarea>
                        </div>

                        <hr class="my-4">

                        <h6 class="title mb-3">{{ get_phrase('Payment Information') }}</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    
                                    <select class="ol-select2" name="payment_method" id="payment_method" required>
                                        <option value="cash_on_delivery"> {{ get_phrase('Cash on delivery') }}</option>
                                        @foreach (App\Models\Payment_gateway::where('status', 1)->get() as $payment_gateway)
                                            <option @if (old('payment_method') == $payment_gateway->identifier) selected @endif value="{{ $payment_gateway->identifier }}">{{ $payment_gateway->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    
                                    <select class="ol-select2" name="payment_status" id="payment_status" required>
                                        <option value=""> {{ get_phrase('Select payment status') }}</option>
                                        <option @if (old('payment_status') == 'paid') selected @endif value="paid">{{ get_phrase('Paid') }}</option>
                                        <option @if (old('payment_status') == 'unpaid') selected @endif value="unpaid">{{ get_phrase('Unpaid') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-2">
                            <button class="btn ol-btn-primary"><i class="fi-rr-shopping-cart-check"></i> {{ get_phrase('Place order') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="ol-card p-4">
                    <div class="ol-card-body">
                        <h6 class="title mb-3">{{ get_phrase('Order Summary') }}</h6>

                        <div class="mb-3 mt-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fi-rr-search-alt"></i></span>
                                <input type="text" onkeyup="searchProduct('{{ route('view', ['path' => 'admin.order.browse_product_list']) }}?search='+$(this).val(), '#product_list')" class="form-control ol-form-control" placeholder="{{ get_phrase('Search products') }}" aria-label="{{ get_phrase('Search products') }}">
                            </div>
                        </div>

                        <div id="product_list">
                            @include('admin.order.browse_product_list')
                        </div>


                        <h6 class="title mb-3 mt-4">{{ get_phrase('Ordered products') }}</h6>
                        <div id="ordered_product_list"></div>



                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')

    <script>
         "use strict";
        function product_quantity(elem, action_type) {
            var current_val = Number($(elem).parent().find('input').val());

            if (action_type == 'plus') {
                $(elem).parent().find('input').val(current_val + 1);
            } else if (current_val > 1) {
                $(elem).parent().find('input').val(current_val - 1);
            }
        }

        var keyUpTimer = 0;

        function searchProduct(url, element) {
            clearTimeout(keyUpTimer);
            keyUpTimer = setTimeout(function() {
                $.ajax({
                    url: url,
                    success: function(response) {
                        $(element).html(response);
                    }
                });
            }, 500);
        }
    </script>

@endpush
