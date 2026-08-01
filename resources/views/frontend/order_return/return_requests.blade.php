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
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('My Returns') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb">
                                  <li class="breadcrumb-item up-breadcrumb-item text-white-color"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('My Returns') }}</li>
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
                    <div class="up-content-box p-20px">
                        <div class="table-responsive">
                            <table class="table up-table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="in-title-14px text-nowrap text-uppercase">#</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-uppercase">{{ get_phrase('Order ID') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-uppercase">{{ get_phrase('Total amount') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-uppercase">{{ get_phrase('Order status') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-uppercase text-center w-78px">{{ get_phrase('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_returns as $key => $request)
                                    <tr>
                                        <td>
                                            {{ ++$key }}
                                        </td>
                                        <td>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                #{{ $request->id + 100 }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                {{ currency($request->order->grand_total) }}
                                            </p>
                                        </td>
                                        <td>
                                            @php
                                                if($request->status == 'pending') {
                                                    $status = 'info';
                                                } elseif ($request->status == 'approved') {
                                                    $status = 'success';
                                                } else {
                                                    $status = 'danger';
                                                }
                                            @endphp
                                            <span class="badge bg-{{ $status }} text-uppercase">{{ $request->status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('customer.order.return_details', ['id' => $request->id])}}" class="btn up-sm-btn-dark">{{get_phrase(' Details')}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-30px">
                        <!-- Pagination -->
                        {{ $order_returns->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Details Area End -->

@endsection

@push('js')

@endpush
