@extends('layouts.customer')
@push('title', 'Shipping Address')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
    <!-- Shipping address Area Start -->
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
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('Shipping address') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb ">
                                  <li class="breadcrumb-item up-breadcrumb-item text-white-color"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('Shipping address') }}</li>
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
                        <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap mb-3 pb-3 up-border-bottom">
                            <h3 class="in-title-16px">{{ get_phrase('Shipping address') }}</h3>
                            <a href="javascript:void(0)" onclick="ajaxModal('{{ route('view', ['path' => 'frontend.shipping_addresses.add']) }}', '{{ get_phrase('Add a new shipping address') }}')" class="btn up2-btn-dark text-capitalize">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M11 5.99988L1 5.99988" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                                    <path d="M6 11L6 1" stroke="white" stroke-width="1.3" stroke-linecap="round"/>
                                </svg>
                                <span>{{ get_phrase('Add new address') }}</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table up-table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col" class="in-title-14px text-nowrap">{{ get_phrase('Title') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap">{{ get_phrase('Address') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap">{{ get_phrase('Status') }}</th>
                                        <th scope="col" class="in-title-14px text-nowrap text-center w-78px">{{ get_phrase('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shipping_addresses as $key => $address)
                                    <tr>
                                        <td>
                                            {{ ++$key }}
                                        </td>
                                        <td>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark">
                                                {{ $address->title }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark mb-1">
                                                {{ get_phrase('Address') }} : {{ $address->address }}
                                            </p>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark mb-1">
                                                {{ get_phrase('Zip code') }} : {{ $address->zip_code }}
                                            </p>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark mb-1">
                                                {{ get_phrase('City') }} : {{ $address->city->name }}
                                            </p>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark mb-1">
                                                {{ get_phrase('State') }} : {{ $address->state->name }}
                                            </p>
                                            <p class="in-subtitle-14px lh-1 text-nowrap up-text-dark mb-1">
                                                {{ get_phrase('Country') }} : {{ $address->country->name }}
                                            </p>
                                        </td>
                                        <td>
                                            @if ($address->is_primary == 1)
                                                <p class="up-badge-success">{{ get_phrase('Primary shipping address') }}</p>
                                            @else
                                                <p class="up-badge-info">{{ get_phrase('Secondary shipping address') }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="dropdown">
                                                    <button class="btn up-dropdown-icon-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                            <g clip-path="url(#clip0_2_23999)">
                                                              <path d="M7.0026 11.0835C6.19719 11.0835 5.54427 11.7364 5.54427 12.5418C5.54427 13.3472 6.19719 14.0001 7.0026 14.0001C7.80802 14.0001 8.46094 13.3472 8.46094 12.5418C8.46094 11.7364 7.80802 11.0835 7.0026 11.0835Z" fill="#677497"/>
                                                              <path d="M7.0026 5.54268C6.19719 5.54268 5.54427 6.1956 5.54427 7.00102C5.54427 7.80643 6.19719 8.45935 7.0026 8.45935C7.80802 8.45935 8.46094 7.80643 8.46094 7.00102C8.46094 6.1956 7.80802 5.54268 7.0026 5.54268Z" fill="#677497"/>
                                                              <path d="M7.0026 -0.000773557C6.19719 -0.000773628 5.54427 0.652144 5.54427 1.45756C5.54427 2.26298 6.19719 2.91589 7.0026 2.91589C7.80802 2.91589 8.46094 2.26298 8.46094 1.45756C8.46094 0.652145 7.80802 -0.000773487 7.0026 -0.000773557Z" fill="#677497"/>
                                                            </g>
                                                            <defs>
                                                              <clipPath id="clip0_2_23999">
                                                                <rect width="14" height="14" fill="white" transform="translate(14 14.0001) rotate(-180)"/>
                                                              </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end up-dropdown-menu">
                                                        <li><a class="dropdown-item" href="javascript:;" onclick="confirmModal('{{ route('customer.shipping_address.primary', ['id' => $address->id]) }}')">{{ get_phrase('Mark it as primary') }}</a></li>
                                                        <li><a class="dropdown-item" href="javascript:;" onclick="confirmModal('{{ route('customer.shipping_address.delete', ['id' => $address->id]) }}')">{{ get_phrase('Delete') }}</a></li>
                                                    </ul>
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
    </section>
    <!-- Shipping address Area End -->
@endsection

@push('js')

@endpush
