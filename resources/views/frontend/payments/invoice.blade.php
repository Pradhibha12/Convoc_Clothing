@extends('layouts.customer')
@push('title', get_phrase('Invoice'))
@push('meta')
@endpush
@push('css')
@endpush

@section('content')

    <!-- Payments Area Start -->
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
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('Invoice') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb">
                                  <li class="breadcrumb-item up-breadcrumb-item"><a href="{{route('customer.payments')}}">{{ get_phrase('Payments') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('Invoice') }}</li>
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
                    <!-- Table 1 -->
                    <div class="up-content-box print-content mb-20px">
                        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap pb-3 mb-3 up-border-bottom print-d-none">
                            <div>
                                <h5 class="in-title-16px">{{ get_phrase('Invoice') }}</h5>
                            </div>
                            <a href="{{ route('customer.payments') }}" class="al-title-16px fw-medium text-decoration-underline text-link print-d-none">{{get_phrase('Back')}}</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap pb-3 mb-3 up-border-bottom">
                            <div>
                                <h5 class="in-title-16px mb-10px">{{ get_phrase('Invoice To') }}</h5>
                                <ul>
                                    <li class="involice-list-item">{{ $payment->user->name }}</li>
                                    <li class="involice-list-item text-break">{{ $payment->user->email }}</li>
                                    <li class="involice-list-item">{{ $payment->order->shipping_address }}</li>
                                    <li class="involice-list-item text-break">{{ $payment->user->phone }}</li>
                                </ul>
                            </div>
                            <span class="al-title-16px fw-medium">{{ date_formatter($payment->created_at) }}</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap pb-3 mb-3 up-border-bottom">
                            <div>
                                <h5 class="in-title-16px mb-10px">{{ get_phrase('Payment Details') }}</h5>
                                <ul>
                                    <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <p>{{ get_phrase('Total') }}</p>
                                    </li>
                                    <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <p>{{ get_phrase('Payment method') }}</p>
                                    </li>
                                    <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <p>{{ get_phrase('Payment status') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <ul>
                                <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <p class="fw-semibold text-capitalize">{{ $payment->total_amount }} {{ $payment->currency_code }}</p>
                                </li>
                                <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <p class="fw-semibold text-capitalize"><span class="text-uppercase badge bg-dark py-1">{{ $payment->payment_method }}</span></p>
                                </li>
                                <li class="involice-list-item d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                    <p class="fw-semibold text-capitalize"><span class="text-capitalize  green-alert-btn">{{ $payment->status }}</span></p>
                                </li>
                            </ul>
                        </div>
                        <div class="table-responsive mb-30px">
                            <table class="table product-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="in-title-14px text-nowrap">#</th>
                                        <th scope="col" class="in-title-14px text-nowrap">{{ get_phrase('Item') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap">{{ get_phrase('Quantity') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-center w-78px">{{ get_phrase('Paid') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($orders as $order)
                                        @foreach ($order->order_items as $key => $item)
                                            <tr>
                                                 <td>{{ $i++ }}</td>
                                                <td>
                                                    <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                        {{ $item->product->title }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                        {{ $item->quantity }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                        {{ currency($item->discount_price ?? $item->price) }}
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="#" onclick="window.print()" class="btn up-btn-light text-nowrap print-d-none"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Payments Area End -->



@endsection

@push('js')

@endpush
