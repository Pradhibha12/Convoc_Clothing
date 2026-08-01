@extends('layouts.admin')
@push('title', get_phrase('Pos | Sell'))
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/pos.css') }}" />
@endpush
<style>
    .ol-body-content {
        background: #f8f9ff;
    }
</style>
@section('content')
    <style>
        .category-select.ol-select2~.select2-container {
            min-width: 253px;
            width: 100% !important;

        }

        .category-select.ol-select2~.select2-container .select2-selection--single .select2-selection__rendered {
            color: #6b708a;
            font-size: 13px;
        }

        .new-sale-btn {
            display: flex;
            width: 180px;
            height: 48px;
            padding: 13px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 8px;
            border-radius: 10px;
            border: 1px solid #DFE7FD;
            background: #FFF;
            box-shadow: 0 4px 24px 0 rgba(75, 132, 188, 0.08);
        }

        .new-sale-btn:hover {
            background: #1B84FF;
            color: #FFF;
        }

        .active-btn {
            background: #1B84FF;
            color: #FFF;

        }

        .cart-container-section {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            max-height: calc(100vh - 80px - 345px);
            scroll-behavior: smooth;
        }


        .cart-container-section {
            padding-top: 16px;
            /* padding-bottom: 66px; */
            padding-bottom: 16px;

        }

        @media all and (max-width: 1540px) {

            .rectangle-product-modal {
                top: 100%;
                right: unset;
                transform: translateX(0) translateY(0);
                left: 3px;
            }

            .rectangle-product-modal::after {
                display: none;
            }
        }

        #cart-container,
        #tile-view-container,
        #product-view-container,
        #ajax-message,
        #printIframe {
            display: none;
        }
    </style>
    <div class="position-relative mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8" id="table-body">
                <div class="d-flex align-items-center justify-content-between gap-3 flex-column flex-sm-row">
                    <div class="d-flex align-items-center gap-1 flex-wrap flex-sm-nowrap">

                        <div class="search-input flex-grow-1 h-100">

                            <input type="text" name="custom_search" id="custom-search-box"
                                placeholder="{{ get_phrase('Search Items') }}" class="ol-form-control form-control h-100" />
                            <input type="hidden" id="search-context" value="tile" data-category-id="">

                            <span class="search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M17.9417 17.0583L14.7409 13.8575C15.8109 12.5883 16.4583 10.9525 16.4583 9.16667C16.4583 5.14583 13.1875 1.875 9.16667 1.875C5.14583 1.875 1.875 5.14583 1.875 9.16667C1.875 13.1875 5.14583 16.4583 9.16667 16.4583C10.9525 16.4583 12.5884 15.8108 13.8575 14.7408L17.0583 17.9417C17.18 18.0633 17.34 18.125 17.5 18.125C17.66 18.125 17.82 18.0642 17.9417 17.9417C18.1859 17.6983 18.1859 17.3025 17.9417 17.0583ZM3.125 9.16667C3.125 5.835 5.835 3.125 9.16667 3.125C12.4983 3.125 15.2083 5.835 15.2083 9.16667C15.2083 12.4983 12.4983 15.2083 9.16667 15.2083C5.835 15.2083 3.125 12.4983 3.125 9.16667Z"
                                        fill="#6B707D" />
                                </svg>
                            </span>
                        </div>


                        <div class="search-input flex-grow-1 h-100">

                            <input type="text" name="product_barcode" id="product-barcode-search"
                                placeholder="{{ get_phrase('Scan Barcode') }}" class="ol-form-control form-control h-100" />

                            <span class="search-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path
                                        d="M17.9417 17.0583L14.7409 13.8575C15.8109 12.5883 16.4583 10.9525 16.4583 9.16667C16.4583 5.14583 13.1875 1.875 9.16667 1.875C5.14583 1.875 1.875 5.14583 1.875 9.16667C1.875 13.1875 5.14583 16.4583 9.16667 16.4583C10.9525 16.4583 12.5884 15.8108 13.8575 14.7408L17.0583 17.9417C17.18 18.0633 17.34 18.125 17.5 18.125C17.66 18.125 17.82 18.0642 17.9417 17.9417C18.1859 17.6983 18.1859 17.3025 17.9417 17.0583ZM3.125 9.16667C3.125 5.835 5.835 3.125 9.16667 3.125C12.4983 3.125 15.2083 5.835 15.2083 9.16667C15.2083 12.4983 12.4983 15.2083 9.16667 15.2083C5.835 15.2083 3.125 12.4983 3.125 9.16667Z"
                                        fill="#6B707D" />
                                </svg>
                            </span>
                        </div>



                        <form id="filterForm">
                            <div class="d-flex align-items-center gap-2">
                                <select id="category_id" name="category_id"
                                    class="form-select ol-select2 ol-form-control category-select">
                                    <option value="all">{{ get_phrase('All Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>

                    <a id="back-button" class="nav-link-btn d-none" data-href="{{ route('admin.pos.sales.category') }}">
                        <i class="fi-rr-arrow-alt-left"></i>
                        {{ get_phrase('Back') }}
                    </a>
                </div>


                <div id="tile-view-container">
                    <!-- AJAX-loaded content will appear here -->
                </div>

                <div id="tile-container">
                    <div class="row g-3 mt-2">
                        @foreach ($categories as $category)
                            <div class="col-sm-6 col-md-6 col-xl-4 col-xxl-3 cursor-pointer">
                                <div class="custom-grid-card show-product-page"
                                    style="background: {{ sprintf('#%02X%02X%02X', mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255)) }};"
                                    data-href="{{ route('admin.pos.sales.product.view', $category->id) }}">
                                    <h4 class="card-title">{{ $category->title }}</h4>
                                    <p class="card-subtitle">{{ $category->totalProductCount() }}
                                        {{ get_phrase('items') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="product-view-container">
                    <!-- AJAX-loaded content will appear here -->

                </div>
            </div>

            <div class="col-md-4">
                <div class="order-slip">
                    <div class="order-slip-top">
                        <div class="d-flex justify-content-between align-items-center order-main-tile">
                            <div>
                                <h5 class="modal-title">{{ get_phrase('New Order') }}</h5>
                                <p id="total_count_items_text" class="modal-title-sub">0 {{ get_phrase('Items') }}</p>
                            </div>
                            <a type="button" class="order-delete-buttom" onclick="clearCustomerInfo()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 5.25H17.441C16.54 5.25 16.502 5.136 16.255 4.396L16.053 3.789C15.746 2.869 14.889 2.25 13.919 2.25H10.081C9.11099 2.25 8.253 2.868 7.947 3.789L7.745 4.396C7.498 5.137 7.46 5.25 6.559 5.25H3C2.586 5.25 2.25 5.586 2.25 6C2.25 6.414 2.586 6.75 3 6.75H4.298L5.065 18.249C5.213 20.474 6.57701 21.75 8.80701 21.75H15.194C17.423 21.75 18.787 20.474 18.936 18.249L19.703 6.75H21C21.414 6.75 21.75 6.414 21.75 6C21.75 5.586 21.414 5.25 21 5.25ZM9.37 4.263C9.473 3.956 9.75799 3.75 10.081 3.75H13.919C14.242 3.75 14.528 3.956 14.63 4.263L14.832 4.87C14.876 5.001 14.92 5.128 14.968 5.25H9.03C9.078 5.127 9.12301 5 9.16701 4.87L9.37 4.263ZM17.438 18.149C17.343 19.582 16.629 20.25 15.193 20.25H8.806C7.37 20.25 6.657 19.583 6.561 18.149L5.801 6.75H6.558C6.683 6.75 6.787 6.737 6.899 6.729C6.933 6.734 6.964 6.75 6.999 6.75H16.999C17.035 6.75 17.065 6.734 17.099 6.729C17.211 6.737 17.315 6.75 17.44 6.75H18.197L17.438 18.149ZM14.75 11V16C14.75 16.414 14.414 16.75 14 16.75C13.586 16.75 13.25 16.414 13.25 16V11C13.25 10.586 13.586 10.25 14 10.25C14.414 10.25 14.75 10.586 14.75 11ZM10.75 11V16C10.75 16.414 10.414 16.75 10 16.75C9.586 16.75 9.25 16.414 9.25 16V11C9.25 10.586 9.586 10.25 10 10.25C10.414 10.25 10.75 10.586 10.75 11Z"
                                        fill="#6B707D" />
                                </svg>
                            </a>
                        </div>
                        <div class="d-flex align-items-end gap-2 pb-3 border-bottom">
                            <div class="custom-dprop-btn">
                                <label class="form-label ol-form-label">{{ get_phrase('Select Customer') }}</label>
                                <select id="customer_select_dropdown" name="customer_id" class="ol-select2 ol-form-control">
                                    @php
                                        $customers = App\Models\User::where('user_type', 'customer')->get();
                                    @endphp
                                    <option value="walking_customer">{{ get_phrase('Walking Customer') }}</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- <hr> --}}
                        <!-- Blade Template -->
                        <div id="cart-container" class="cart-container-section">

                            <div class="items-list d-none" data-id="" data-base-price="">

                                <div class="d-flex align-items-center gap-2 position-relative">
                                    <div
                                        class="rectangle-product-modal aling-items-center d-flex justify-content-center gap-2 d-none">
                                        <div class="product-items-plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M19.75 12C19.75 12.414 19.414 12.75 19 12.75H12.75V19C12.75 19.414 12.414 19.75 12 19.75C11.586 19.75 11.25 19.414 11.25 19V12.75H5C4.586 12.75 4.25 12.414 4.25 12C4.25 11.586 4.586 11.25 5 11.25H11.25V5C11.25 4.586 11.586 4.25 12 4.25C12.414 4.25 12.75 4.586 12.75 5V11.25H19C19.414 11.25 19.75 11.586 19.75 12Z"
                                                    fill="#6B707D" />
                                            </svg>
                                        </div>
                                        <div class="product-items-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M19 12.75H5C4.586 12.75 4.25 12.414 4.25 12C4.25 11.586 4.586 11.25 5 11.25H19C19.414 11.25 19.75 11.586 19.75 12C19.75 12.414 19.414 12.75 19 12.75Z"
                                                    fill="#6B707D" />
                                            </svg>
                                        </div>
                                        <div class="product-items-plus-minus-remove">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M21 5.25H17.441C16.54 5.25 16.502 5.136 16.255 4.396L16.053 3.789C15.746 2.869 14.889 2.25 13.919 2.25H10.081C9.11099 2.25 8.253 2.868 7.947 3.789L7.745 4.396C7.498 5.137 7.46 5.25 6.559 5.25H3C2.586 5.25 2.25 5.586 2.25 6C2.25 6.414 2.586 6.75 3 6.75H4.298L5.065 18.249C5.213 20.474 6.57701 21.75 8.80701 21.75H15.194C17.423 21.75 18.787 20.474 18.936 18.249L19.703 6.75H21C21.414 6.75 21.75 6.414 21.75 6C21.75 5.586 21.414 5.25 21 5.25ZM9.37 4.263C9.473 3.956 9.75799 3.75 10.081 3.75H13.919C14.242 3.75 14.528 3.956 14.63 4.263L14.832 4.87C14.876 5.001 14.92 5.128 14.968 5.25H9.03C9.078 5.127 9.12301 5 9.16701 4.87L9.37 4.263ZM17.438 18.149C17.343 19.582 16.629 20.25 15.193 20.25H8.806C7.37 20.25 6.657 19.583 6.561 18.149L5.801 6.75H6.558C6.683 6.75 6.787 6.737 6.899 6.729C6.933 6.734 6.964 6.75 6.999 6.75H16.999C17.035 6.75 17.065 6.734 17.099 6.729C17.211 6.737 17.315 6.75 17.44 6.75H18.197L17.438 18.149ZM14.75 11V16C14.75 16.414 14.414 16.75 14 16.75C13.586 16.75 13.25 16.414 13.25 16V11C13.25 10.586 13.586 10.25 14 10.25C14.414 10.25 14.75 10.586 14.75 11ZM10.75 11V16C10.75 16.414 10.414 16.75 10 16.75C9.586 16.75 9.25 16.414 9.25 16V11C9.25 10.586 9.586 10.25 10 10.25C10.414 10.25 10.75 10.586 10.75 11Z"
                                                    fill="#6B707D" />
                                            </svg>
                                        </div>
                                    </div>
                                    <label class="items-title"></label>
                                    <input type="hidden" class="items-count" name="items_count[]" value=""
                                        readonly>
                                    <p class="items-count"></p>
                                </div>
                                <input type="hidden" class="items_id" id="items_count_id" name="items_id[]"
                                    value="">
                                <input type="hidden" class="items-price" value="{{ currency(0) }}" readonly>
                                <input type="hidden" class="items-vat" value="items_vat[]" readonly>

                                <p class="items-price">{{ currency(0) }}</p>
                            </div>
                        </div>

                        <input type="hidden" name="category_id" id="category_id" value="">
                        <input type="hidden" name="total_items" id="total_count_items_input" value="">
                    </div>

                    <div id="itemsDiscountSection" class="items-discount-section">
                        <div class="items-discount-list">
                            <label class="items-discount-title" id="label_display_tax">{{ get_phrase('Tax') }}</label>
                            <input class="items-discount-price" type="hidden" id="display_tax" name="items_tax"
                                value="0" readonly>
                            <input class="items-discount-price" type="text" id="hidden_tax" value="$0" readonly>

                        </div>
                        <div class="items-discount-list">
                            <label class="items-discount-title"
                                id="label_display_discount">{{ get_phrase('Discount (0%)') }}</label>
                            <input class="items-discount-price" type="hidden" id="display_discount"
                                name="items_discount" value="-0" readonly>
                            <input class="items-discount-price" type="text" id="hidden_discount" value="$0"
                                readonly>

                        </div>

                        <div class="discount-sectino">
                            <div class="btn-discount" onclick="itemsDiscountModal()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M4 20.7508C3.808 20.7508 3.616 20.6778 3.47 20.5308C3.177 20.2378 3.177 19.7627 3.47 19.4697L19.47 3.46975C19.763 3.17675 20.238 3.17675 20.531 3.46975C20.824 3.76275 20.824 4.23779 20.531 4.53079L4.53101 20.5308C4.38401 20.6778 4.192 20.7508 4 20.7508ZM20.75 17.5008C20.75 15.7088 19.292 14.2508 17.5 14.2508C15.708 14.2508 14.25 15.7088 14.25 17.5008C14.25 19.2928 15.708 20.7508 17.5 20.7508C19.292 20.7508 20.75 19.2928 20.75 17.5008ZM19.25 17.5008C19.25 18.4658 18.465 19.2508 17.5 19.2508C16.535 19.2508 15.75 18.4658 15.75 17.5008C15.75 16.5358 16.535 15.7508 17.5 15.7508C18.465 15.7508 19.25 16.5358 19.25 17.5008ZM9.75 6.50076C9.75 4.70876 8.292 3.25076 6.5 3.25076C4.708 3.25076 3.25 4.70876 3.25 6.50076C3.25 8.29276 4.708 9.75076 6.5 9.75076C8.292 9.75076 9.75 8.29276 9.75 6.50076ZM8.25 6.50076C8.25 7.46576 7.465 8.25076 6.5 8.25076C5.535 8.25076 4.75 7.46576 4.75 6.50076C4.75 5.53576 5.535 4.75076 6.5 4.75076C7.465 4.75076 8.25 5.53576 8.25 6.50076Z"
                                        fill="#6B707D" />
                                </svg>
                            </div>
                            <button onclick="createCheckoutModal()" class="btn-checkout">
                                <span class="btn-checkout-title">{{ get_phrase('Checkout') }}</span>
                                <input type="text" class="total-price-count" id="items-total-price-count"
                                    value="{{ currency(0) }}" readonly>
                                <input type="hidden" class="total-price-count" id="main-total-price-count"
                                    value="{{ currency(0) }}" readonly>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="createCheckoutSuccessModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="createCheckoutSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered custom-modal-size">
            <div class="modal-content">
                <div class="modal-body position-relative">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="#" class="custom-tile-xmark-buttom">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <path
                                    d="M15.7369 14.482C16.0842 14.8292 16.0842 15.3921 15.7369 15.7393C15.5639 15.9123 15.3364 16 15.1089 16C14.8813 16 14.6538 15.9135 14.4808 15.7393L7.99868 9.25716L1.51654 15.7393C1.34353 15.9123 1.116 16 0.888477 16C0.660951 16 0.433426 15.9135 0.260411 15.7393C-0.0868037 15.3921 -0.0868037 14.8292 0.260411 14.482L6.74254 7.99987L0.260411 1.51777C-0.0868037 1.17056 -0.0868037 0.607626 0.260411 0.260411C0.607626 -0.0868037 1.17052 -0.0868037 1.51774 0.260411L7.99987 6.74258L14.482 0.260411C14.8292 -0.0868037 15.3921 -0.0868037 15.7393 0.260411C16.0865 0.607626 16.0865 1.17056 15.7393 1.51777L9.25718 7.99987L15.7369 14.482Z"
                                    fill="#6B707D" />
                            </svg>
                        </a>
                    </div>

                    <div class="main-success-section">
                        <div class="success-message-section">
                            <span class="success-icon">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="60" height="60" rx="30" fill="#F2FFF0" />
                                    <rect x="10" y="10" width="40" height="40" rx="20" fill="#39CA6C" />
                                    <path d="M36.875 25.625L28.125 34.3746L23.75 30" stroke="white" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <h1 class="payble-amount-section">{{ currency() }}<span id="successTotalAmount"></span>
                            </h1>
                            <p class="success-message-section">{{ get_phrase('Payment Successful!') }}</p>
                            <p class="change-amount-section">{{ get_phrase('Change Amount') }} {{ currency() }}<span
                                    id="successTotalPaybleAmount"></span></p>
                        </div>

                        <div class="invoice-message-section">
                            <p class="change-amount-section mb-2">{{ get_phrase('Select a method to get invoice') }}</p>

                            <div class="print-section">
                                <button class="print-button-section">{{ get_phrase('Print') }}</button>
                                <button class="email-button-section">{{ get_phrase('Send via E-mail') }}</button>
                            </div>
                        </div>

                        <div class="invoice-email-section d-none d-flex align-items-center justify-content-center gap-2 mt-4"
                            id="invoice-print-none">
                            <a class="send-invoice-button" id="printButton" href="#"
                                onclick="return false;">{{ get_phrase('Submit') }}</a>
                            <a href="{{ route('admin.pos.sales.index') }}"
                                class="new-sale-btn">{{ get_phrase('New Sale') }}</a>
                        </div>


                        <form action="#" method="POST">
                            @csrf
                            <div class="invoice-email-section d-none" id="invoice-email-none">
                                <input type="hidden" value="" id="successOrderId" name="order_id">

                                <input type="text" class="input-email-form" name="mail"
                                    placeholder="{{ get_phrase('E-mail (required)') }}">
                                <div class="mt-4 d-flex align-items-center justify-content-center gap-2">
                                    <button type="submit"
                                        class="send-invoice-button">{{ get_phrase('Send Invoice') }}</button>
                                    <a href="{{ route('admin.pos.sales.index') }}"
                                        class="new-sale-btn">{{ get_phrase('New Sale') }}</a>
                                </div>
                            </div>
                        </form>


                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="placeholder-content-spinner d-none">
        <div class="d-flex justify-content-center align-items-center mt-5">
            <div class="spinner-border text-primary spinner-border-lg" role="status">
                <span class="visually-hidden">{{ get_phrase('Loading...') }}</span>
            </div>
        </div>
        <p class="py-4 text-center">{{ get_phrase('Loading please wait...') }}</p>
    </div>

    <iframe id="printIframe"></iframe>

    <div id="ajax-message"></div>
    @include('admin.pos.product_discount_modal')
    @include('admin.pos.checkout_modal')
@endsection
@push('js')

    <script>
        "use strict";
        $(document).on('click', '.show-product-page', function() {
            let url = $(this).data('href');
            const loader = $('.placeholder-content-spinner').html();

            // show loader instantly
            $("#product-view-container").html(loader).show();
            $("#tile-view-container, #tile-container").hide();
            $('#back-button').removeClass('d-none');

            // AJAX call
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $("#product-view-container").html(response);
                    $("#search-context").val('product');

                    let categoryId = url.split('/').pop(); // assuming URL ends with category_id
                    $("#search-context").data('category-id', categoryId);
                },
                error: function() {
                    alert("Something went wrong.");
                }
            });
        });
    </script>

    <script>
        "use strict";
        $(document).on('click', '#back-button', function(e) {
            e.preventDefault();

            let url = $(this).data('href');
            const loader = $('.placeholder-content-spinner').html();

            // Loader
            $("#tile-view-container").html(loader).show();
            $("#product-view-container").hide();
            $("#tile-container").hide();
            $('#back-button').addClass('d-none');

            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $("#tile-view-container").html(response).show();
                    $('#search-context').val('tile');
                    $('#search-context').removeData('category-id');
                },
                error: function() {
                    $("#tile-view-container").html(
                        '<div class="text-danger">Something went wrong. Try again.</div>');
                }
            });
        });
    </script>

    <script>
        "use strict";
        $(document).ready(function() {
            $('#customerCreateForm').on('submit', function(e) {
                e.preventDefault();

                let formData = {
                    name: $('#modal_name').val(),
                    email: $('#modal_email').val(),
                    address: $('#modal_address').val(),
                    number: $('#modal_number').val(),
                    _token: '{{ csrf_token() }}'
                };

                $.ajax({
                    url: "#",
                    method: "POST",
                    data: formData,

                    success: function(response) {
                        if (response.success) {
                            $('#customerCreateModal').modal('hide');
                            $('#customerCreateForm')[0].reset();

                            $('#customer_select_dropdown option[value="' + response.customer
                                .id + '"]').remove();

                            $('#customer_select_dropdown option[value="walking_customer"]')
                                .after(
                                    `<option value="${response.customer.id}" selected>${response.customer.customer_name}</option>`
                                );

                            $('#customer_select_dropdown option').prop('selected', false);
                            $('#customer_select_dropdown option[value="' + response.customer
                                .id + '"]').prop('selected', true);

                            $('#customer_select_dropdown').trigger('change');
                        } else {
                            alert("Something went wrong. Try again.");
                        }
                    },

                    error: function(xhr) {
                        alert("Error occurred. Check input and try again.");
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        "use strict";
        $(document).ready(function() {
            $('#checkoutForm').on('submit', function(e) {
                e.preventDefault();

                let form = $(this);
                let url = "{{ route('admin.pos.order.store') }}";

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(),

                    success: function(response) {
                        console.log('Success:', response);

                        form.trigger('reset');

                        const checkoutModal = bootstrap.Modal.getInstance(document
                            .getElementById('createCheckoutModal'));
                        if (checkoutModal) {
                            checkoutModal.hide();
                        }

                        // Get numeric values
                        let payableAmount = parseFloat(response.order_details
                            .items_total_payble_amount);
                        let totalAmount = parseFloat(response.order_details.items_total_amount);
                        let discountAmount = payableAmount - totalAmount;

                        // Optional: round to 2 decimal places
                        discountAmount = discountAmount.toFixed(2);
                        totalAmount = totalAmount.toFixed(2);

                        // Set text

                        $('#successTotalPaybleAmount').text(discountAmount);
                        $('#successTotalAmount').text(totalAmount);

                        // let customerId = response.order_details.customer_id;
                        let orderId = response.order_id;
                        // $('#successCustomerId').text(customerId);
                        $('#successOrderId').val(orderId);

                        let printUrl = "{{ route('admin.order.store', ['__ID__']) }}";
                        printUrl = printUrl.replace('__ID__', orderId);
                        $('#printButton').attr('onclick', "exportFile('" + printUrl + "')");


                        // Show success modal
                        const successModal = new bootstrap.Modal(document.getElementById(
                            'createCheckoutSuccessModal'));
                        successModal.show();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', xhr.responseText);
                        warning('Something went wrong. Please try again.');
                    }
                });
            });
        });
    </script>

    <script>
        "use strict";

        function createCheckoutModal() {
            // Step 1: Check if any items selected
            const itemsIdList = Array.from(document.querySelectorAll('input.items_id')).map(i => i.value).filter(Boolean);
            const itemsCountList = Array.from(document.querySelectorAll('input.items-count')).map(i => i.value).filter(
                Boolean);

            if (itemsIdList.length === 0) {

                $('#ajax-message')
                    .html('<div class="custom-alert error">No item selected</div>')
                    .fadeIn();

                setTimeout(function() {
                    $('#ajax-message').fadeOut();
                }, 3000);
                return;
            }

            // Step 2: Collect values from form
            const customerId = $('#customer_select_dropdown').val();
            const categoryId = getValue('category_id');
            const totalItems = getValue('total_count_items_input');
            const itemsTax = getValue('display_tax');


            const itemsDiscount = getValue('display_discount');
            const totalAmountStr = getValue('items-total-price-count');
            const totalMainAmountStr = getValue('main-total-price-count');



            // Step 3: Parse and round total amount
            const totalMainAmountNum = parseFloat(totalMainAmountStr.replace(/[^0-9.-]+/g, ""));
            const totalAmountNum = parseFloat(totalAmountStr.replace(/[^0-9.-]+/g, ""));
            const roundedAmount = Math.ceil(totalAmountNum / 50) * 50;
            const formattedRoundedAmount = formatCurrency(roundedAmount);
            const formattedTotalAmount = formatCurrency(totalAmountNum);

            // Step 4: Set values in modal fields
            setValue('checkout_category_id', categoryId);
            setValue('checkout_total_count_items_input', totalItems);
            setValue('checkout_items_tax', itemsTax);
            setValue('checkout_items_discount', itemsDiscount);
            setValue('checkout_customer_id', customerId);


            setValue('checkout_modal_main_total_amount', totalMainAmountNum);
            setValue('checkout_modal_total_amount', formattedTotalAmount);
            setValue('checkout_modal_total_amount_price', formattedTotalAmount);
            setValue('checkout_modal_total_price_round', formattedRoundedAmount);
            setValue('checkout_modal_total_price', formattedRoundedAmount);

            document.getElementById('checkout_modal_total_price_show').innerText = formattedTotalAmount;


            setValue('checkout_items_id', itemsIdList.join(','));
            setValue('checkout_items_count', itemsCountList.join(','));

            // Step 5: Hide warning initially
            const errorSection = document.getElementById('amount_check_section');
            if (errorSection) errorSection.style.display = 'none';

            // Step 6: Handle cash input validation
            const addCashInput = document.getElementById('checkout_modal_total_price_add_cash');
            // const priceChecking = document.getElementById('checkout_modal_total_price_checking');
            const confirmBtn = document.getElementById('ConfirmCheckoutBtn');

            if (addCashInput) {
                addCashInput.value = '';
                addCashInput.oninput = null;

                addCashInput.addEventListener('input', function() {
                    const addCash = parseFloat(this.value);
                    const baseAmount = parseFloat(getValue('checkout_modal_total_amount_price').replace(
                        /[^0-9.-]+/g, ""));
                    const isRounded = !isNaN(addCash) && (addCash % 50 === 0);


                    if (this.value === '') {
                        this.classList.remove('border-danger');
                        if (confirmBtn) confirmBtn.disabled = false;
                        if (errorSection) errorSection.style.display = 'none';
                    } else if (!isNaN(addCash) && addCash >= baseAmount && isRounded) {
                        this.classList.remove('border-danger');
                        if (confirmBtn) confirmBtn.disabled = false;
                        if (errorSection) errorSection.style.display = 'none';
                    } else {
                        this.classList.add('border-danger');
                        if (confirmBtn) confirmBtn.disabled = true;
                        if (errorSection) errorSection.style.display = 'flex';
                    }
                });
            }

            const modalEl = document.getElementById('createCheckoutModal');
            if (modalEl) {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        }

        function formatCurrency(amount, currencyCode = 'BDT') {
            return new Intl.NumberFormat('en-BD', {
                style: 'currency',
                currency: currencyCode,
                minimumFractionDigits: 0
            }).format(amount);
        }

        // Helper: Get element value by id
        function getValue(id, fallback = '') {
            const el = document.getElementById(id);
            return el ? el.value : fallback;
        }

        // Helper: Set element value by id
        function setValue(id, value) {
            const el = document.getElementById(id);
            if (el) el.value = value;
        }
    </script>

    <script>
        function clearCustomerInfo() {

            // Clear cart items
            const cartContainer = document.getElementById("cart-container");
            if (cartContainer) {
                const items = cartContainer.querySelectorAll(".items-list:not(.d-none)");
                items.forEach(item => item.remove());
                cartContainer.style.display = "none";
            }

            // Reset customer dropdown to 'Walking Customer' (Select2)
            $('#customer_select_dropdown').val('walking_customer').trigger('change');

            // Reset item count
            const totalCountDiv = document.getElementById("total_count_items_text");
            if (totalCountDiv) {
                totalCountDiv.innerText = "0 Items";
            }

            const countInput = document.getElementById("items_count_id");
            if (countInput) {
                countInput.value = "";
            }

            // Reset discount section
            const discountSectionInputs = document.querySelectorAll('#itemsDiscountSection input');
            discountSectionInputs.forEach(input => {
                input.value = "0";
            });

            const displayDiscountInputs = document.querySelectorAll('#display_discount');
            displayDiscountInputs.forEach(input => {
                input.value = "-0";
            });

            const giftCardInput = document.getElementById('display_gift_card');
            if (giftCardInput) {
                giftCardInput.value = "$0";
            }

            const totalAmountInput = document.getElementById('items-total-price-count');
            if (totalAmountInput) {
                totalAmountInput.value = "$0";
            }
        }
    </script>



    <script>
        // Get buttons
        const printBtn = document.querySelector('.print-button-section');
        const emailBtn = document.querySelector('.email-button-section');

        // Get divs
        const printSection = document.getElementById('invoice-print-none');
        const emailSection = document.getElementById('invoice-email-none');

        function setActiveButton(activeBtn) {
            // Remove active class from both buttons first
            printBtn.classList.remove('active-btn');
            emailBtn.classList.remove('active-btn');
            // Add active class to the clicked button
            activeBtn.classList.add('active-btn');
        }

        printBtn.addEventListener('click', () => {
            printSection.classList.remove('d-none'); // Show print section
            emailSection.classList.add('d-none'); // Hide email section
            setActiveButton(printBtn);
        });

        emailBtn.addEventListener('click', () => {
            emailSection.classList.remove('d-none'); // Show email section
            printSection.classList.add('d-none'); // Hide print section
            setActiveButton(emailBtn);
        });

        // Optionally, set default active button on page load:
        setActiveButton(printBtn);
        printSection.classList.remove('d-none');
        emailSection.classList.add('d-none');
    </script>

    <script>
        $(document).ready(function() {

            // ---------- Tile filter change ----------
            $('#category_id').on('change', function() {
                let categoryId = $(this).val();
                let url = "{{ route('admin.pos.sales.category.filter') }}";
                const loader = $('.placeholder-content-spinner').html();

                // Search context)
                if (categoryId === 'all') {
                    $('#search-context').val('tile');
                } else {
                    $('#search-context').val('product');
                }
                $('#search-context').data('category-id', categoryId);

                if (categoryId === 'all') {
                    $('#product-view-container').html(loader).show();

                    $.ajax({
                        url: url,
                        method: 'GET',
                        data: {
                            category_id: categoryId
                        },
                        dataType: 'html',
                        success: function(response) {
                            $('#product-view-container').hide();
                            $('#tile-view-container').show();
                            $('#tile-container').show().html(response);
                        }
                    });
                    return;
                }

                // Category
                $('#tile-view-container').hide();
                $('#tile-container').hide();
                $('#product-view-container').html(loader).show();
                $('#back-button').removeClass('d-none');


                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    dataType: 'html',
                    success: function(response) {
                        $('#product-view-container').html(response).show();
                    }
                });
            });

            // ---------- Custom search ----------
            $('#custom-search-box').on('keyup', function() {
                let search = $(this).val();
                let context = $('#search-context').val();
                let categoryId = $('#search-context').data('category-id');
                let url = '';

                const loader = $('.placeholder-content-spinner').html();

                let data = {
                    search: search
                };

                if (context === 'tile') {
                    if (categoryId && categoryId !== 'all') {
                        data.category_id = categoryId;
                    }
                    url = "{{ route('admin.pos.sales.category.search') }}";

                    // Loader
                    if ($('#tile-container').is(':visible')) {
                        $('#tile-container').html(loader);
                    } else {
                        $('#tile-view-container').html(loader);
                    }

                } else if (context === 'product') {
                    url = "{{ url('admin/pos/sales/product/search') }}/" + categoryId;

                    // Loader
                    $('#product-view-container').html(loader);
                }

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: data,
                    success: function(response) {
                        if (context === 'tile') {
                            if ($('#tile-container').is(':visible')) {
                                $('#tile-container').html(response);
                            } else {
                                $('#tile-view-container').html(response);
                            }
                        } else if (context === 'product') {
                            $('#product-view-container').html(response);
                        }
                    },
                    error: function() {
                        const errorHtml =
                            '<div class="col-12 text-danger">Something went wrong. Try again.</div>';
                        if (context === 'tile') {
                            if ($('#tile-container').is(':visible')) {
                                $('#tile-container').html(errorHtml);
                            } else {
                                $('#tile-view-container').html(errorHtml);
                            }
                        } else {
                            $('#product-view-container').html(errorHtml);
                        }
                    }
                });
            });

        });
    </script>


    <script>
        "use strict";

        function strLimit(text, limit = 20, suffix = '...') {
            return text.length > limit ? text.substring(0, limit) + suffix : text;
        }

        function formatCurrency(value) {
            return `$${parseInt(value)}`;
        }

        // Scroll cart to bottom
        function updateCartScroll() {
            const cartContainer = document.getElementById("cart-container");
            cartContainer.scrollTop = cartContainer.scrollHeight;
        }

        // Add product to cart
        function setProductData(element) {
            let cartContainer = document.getElementById("cart-container");
            cartContainer.style.display = "block";

            let id = element.dataset.id;
            let title = element.dataset.title;
            let price = parseFloat(element.dataset.price);
            let vat = parseFloat(element.dataset.vat);
            let quantity = parseInt(element.dataset.quantity) || 1;

            document.getElementById("category_id").value = element.dataset.categoryId || 0;

            let existingItem = cartContainer.querySelector(`.items-list[data-id="${id}"]`);

            if (existingItem) {
                const countInputs = existingItem.querySelectorAll(".items-count");
                const priceInput = existingItem.querySelector(".items-price");
                const vatInput = existingItem.querySelector(".items-vat");
                const basePrice = parseFloat(existingItem.dataset.basePrice);
                const baseVat = parseFloat(existingItem.dataset.vat);

                let currentCount = parseInt(countInputs[0].value) || 1;
                let addedQty = parseInt(element.dataset.quantity) || 1; // get dynamic quantity
                let newCount = currentCount + addedQty;

                countInputs.forEach(el => {
                    el.value = newCount;
                    el.innerText = newCount;
                });

                let updatedPrice = formatCurrency(basePrice * newCount);
                priceInput.value = updatedPrice;

                let priceText = existingItem.querySelector("p.items-price");
                if (priceText) priceText.innerText = updatedPrice;

                let updatedVat = formatCurrency(baseVat * newCount);
                vatInput.value = updatedVat;

                updateTotalCount();
                updateTotalPrice();
                requestAnimationFrame(() => updateCartScroll());
            } else {
                let template = cartContainer.querySelector(".items-list.d-none");
                if (template) {
                    let newItem = template.cloneNode(true);
                    newItem.classList.remove("d-none");
                    newItem.setAttribute("data-id", id);
                    newItem.setAttribute("data-base-price", price);
                    newItem.setAttribute("data-vat", vat);

                    newItem.querySelector(".items-title").innerText = strLimit(title, 20);

                    newItem.querySelectorAll(".items-count").forEach(el => {
                        el.value = quantity;
                        el.innerText = quantity;
                    });

                    newItem.querySelector(".items_id").value = id;

                    let formattedPrice = formatCurrency(price * quantity);
                    newItem.querySelector(".items-price").value = formattedPrice;
                    newItem.querySelector(".items-vat").value = vat;

                    let priceText = newItem.querySelector("p.items-price");
                    if (priceText) priceText.innerText = formattedPrice;

                    const buttonGroup = newItem.querySelector(".rectangle-product-modal");
                    if (buttonGroup) buttonGroup.classList.add("d-none");

                    // Title click → toggle button group
                    const label = newItem.querySelector(".items-title");
                    label.style.cursor = "pointer";
                    label.addEventListener("click", function(e) {
                        e.stopPropagation();
                        const group = newItem.querySelector(".rectangle-product-modal");

                        document.querySelectorAll("#cart-container .rectangle-product-modal").forEach(btnGrp => {
                            if (btnGrp !== group) btnGrp.classList.add("d-none");
                        });

                        if (group) group.classList.toggle("d-none");
                    });

                    // Wait for images to load before scrolling
                    let imgList = newItem.querySelectorAll("img");
                    let loadedCount = 0;

                    if (imgList.length) {
                        imgList.forEach(img => {
                            if (img.complete) {
                                loadedCount++;
                            } else {
                                img.onload = () => {
                                    loadedCount++;
                                    if (loadedCount === imgList.length) {
                                        updateCartScroll();
                                    }
                                }
                            }
                        });
                    } else {
                        updateCartScroll();
                    }

                    cartContainer.appendChild(newItem);
                    updateTotalCount();
                    updateTotalPrice();
                    requestAnimationFrame(() => updateCartScroll());
                }
            }
        }

        // Update total count
        function updateTotalCount() {
            let totalCount = 0;
            const items = document.querySelectorAll(".items-list:not(.d-none)");
            items.forEach(item => {
                const count = parseInt(item.querySelector(".items-count").value) || 0;
                totalCount += count;
            });

            document.getElementById("total_count_items_input").value = totalCount;
            document.getElementById("total_count_items_text").innerText =
                `${totalCount} ${totalCount === 1 ? 'Item' : 'Items'}`;
        }

        // Update total price
        function updateTotalPrice() {
            let total = 0;
            let totalVat = 0;
            const items = document.querySelectorAll(".items-list:not(.d-none)");
            items.forEach(item => {
                const price = parseFloat(item.querySelector(".items-price").value.replace(/[^\d.-]/g, '')) || 0;
                total += price;

                vat = parseFloat(item.querySelector(".items-vat").value.replace(/[^\d.-]/g, '')) || 0;
                totalVat += vat;
            });

            const taxPercent = parseFloat(document.getElementById("display_tax").value.replace(/[^\d.-]/g, '')) || 0;
            let discountPercent = parseFloat(document.getElementById("display_discount").value.replace(/[^\d.-]/g, '')) ||
                0;

            discountPercent = Math.abs(discountPercent);

            const discountAmount = (total * discountPercent) / 100;

            const netTotal = total + totalVat - discountAmount;

            document.getElementById("items-total-price-count").value = formatCurrency(netTotal);
            document.getElementById("main-total-price-count").value = formatCurrency(total);

            document.getElementById("label_display_discount").textContent = `Discount (${discountPercent}%)`;

            document.getElementById("hidden_tax").value = formatCurrency(totalVat);
            document.getElementById("hidden_discount").value = formatCurrency(discountAmount);
        }

        // Cart container click (plus, minus, remove)
        document.getElementById("cart-container").addEventListener("click", function(e) {
            let item = e.target.closest(".items-list");
            if (!item || item.classList.contains("d-none")) return;

            const countInputs = item.querySelectorAll(".items-count");
            const priceInput = item.querySelector(".items-price");
            const vatInput = item.querySelector(".items-vat");
            const basePrice = parseFloat(item.dataset.basePrice);
            const baseVat = parseFloat(item.dataset.vat);

            if (e.target.closest(".product-items-plus-minus-remove")) {
                item.remove();
                updateTotalCount();
                updateTotalPrice();
                updateCartScroll();
                return;
            }

            if (e.target.closest(".product-items-plus")) {
                let currentCount = parseInt(countInputs[0].value) || 1;
                let newCount = currentCount + 1;
                countInputs.forEach(el => {
                    el.value = newCount;
                    el.innerText = newCount;
                });
                let updatedPrice = formatCurrency(basePrice * newCount);
                priceInput.value = updatedPrice;
                let priceText = item.querySelector("p.items-price");
                if (priceText) priceText.innerText = updatedPrice;

                let updatedVat = formatCurrency(baseVat * newCount);
                vatInput.value = updatedVat;

                updateTotalCount();
                updateTotalPrice();
                updateCartScroll();
            }

            if (e.target.closest(".product-items-minus")) {
                let currentCount = parseInt(countInputs[0].value) || 1;
                if (currentCount > 1) {
                    let newCount = currentCount - 1;
                    countInputs.forEach(el => {
                        el.value = newCount;
                        el.innerText = newCount;
                    });
                    let updatedPrice = formatCurrency(basePrice * newCount);
                    priceInput.value = updatedPrice;
                    let priceText = item.querySelector("p.items-price");
                    if (priceText) priceText.innerText = updatedPrice;

                    let updatedVat = formatCurrency(baseVat * newCount);
                    vatInput.value = updatedVat;

                    updateTotalCount();
                    updateTotalPrice();
                    updateCartScroll();
                }
            }
        });

        // Discount modal
        function itemsDiscountModal() {
            const modal = new bootstrap.Modal(document.getElementById('itemsDiscountModal'));
            modal.show();
        }

        // Confirm discount
        document.getElementById('addDiscountConfirmBtn').addEventListener('click', function() {
            let discount = document.getElementById('modal_discount_input').value || 0;

            discount = `-${Math.abs(discount)}`;

            document.getElementById('display_discount').value = discount;

            updateTotalPrice();
            updateCartScroll();

            let modal = bootstrap.Modal.getInstance(document.getElementById('itemsDiscountModal'));
            if (modal) modal.hide();
        });

        // Product add click
        $(document).on("click", "#product-view-container #itemsSetProductForm", function() {

            let $btn = $(this);
            let quantity = $btn.closest(".cartForm").find(".quantity-of-product").val() || 1;

            // attach quantity dynamically
            this.dataset.quantity = quantity;

            setProductData(this);
        });
    </script>

    <script>
        "use strict";
        document.getElementById('product-barcode-search').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                let barcode = this.value.trim();
                if (barcode.length === 0) return;

                fetch(`{{ route('admin.pos.product.barcode.search') }}?barcode=${barcode}`)
                    .then(res => res.json())
                    .then(product => {
                        if (product.error) {
                            warning(product.error);
                            return;
                        }

                        let element = document.createElement('div');
                        element.dataset.id = product.id;
                        element.dataset.title = product.title;
                        element.dataset.price = product.price;
                        element.dataset.vat = product.vat;
                        element.dataset.categoryId = product.tile_id;

                        setProductData(element);
                        this.value = '';
                    })
                    .catch(err => {
                        console.error('Barcode fetch error:', err);
                        warning('Something went wrong.');
                    });
            }
        });
    </script>



@endpush
