@extends('layouts.frontend')
@push('title', 'Cart items')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')

    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-3 mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Shopping Cart') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Shopping Cart') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Cart Details Area Start -->
    <section>
        <div class="container">
            <div class="row gy-4 mb-100px" id="shopping-cart-page">
                @include('frontend.cart.shopping_cart_page_body')
            </div>
        </div>
    </section>
    <!-- Cart Details Area End -->

@endsection

@push('js')
@endpush
