@extends('layouts.customer')
@push('title', 'Wishlist')
@push('meta')
@endpush
@push('css')
<style>
    .in-subtitle2-16px {
	font-size: 14px;
	line-height: 20px;
}
</style>
@endpush

@section('content')

    <!-- My Review Area Start -->
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
                            <h1 class="in-title-16px text-white-color">{{ get_phrase('My Wishlist') }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb up-breadcrumb text-white-color">
                                  <li class="breadcrumb-item up-breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                  <li class="breadcrumb-item up-breadcrumb-item active" aria-current="page">{{ get_phrase('My Wishlist') }}</li>
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
                    <div class="up-content-box mb-30px">
                        <div class="row gx-14px gy-20px">
                            @foreach ($wishlist_items as $item)
                                <div class="col-xl-6" id="my_wishlist_item_{{$item->product->id}}">
                                    <div class="product-list-card wishItem-card">
                                        <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="product-list-card-banner">
                                          @php
                                                $thumbnails = json_decode($item->product->thumbnail, true);
                                                $firstImage = $thumbnails[0] ?? null;
                                            @endphp
                                            <img  src="{{ get_image($firstImage) }}" alt="">
                                        </a>
                                        <div class="w-100 d-flex gap-12px justify-content-between align-items-end flex-wrap flex-md-nowrap">
                                            <div>
                                                <a href="{{ route('product', ['slug' => $item->product->slug]) }}" class="in-title-16px mb-12px text-link2">{{ $item->product->title }}</a>
                                                <p class="in-subtitle2-16px mb-12px">{{ \Illuminate\Support\Str::words($item->product->summary, 10, '...') }}</p>
                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                    @if ($item->product->is_discounted)
                                                        @php
                                                            $discount = $item->product->discount;
                                                        @endphp
                                                        @if ($discount->discount_type == 'percentage')
                                                            <h6 class="al-title-16px">{{ currency(($item->product->price / 100) * $discount->discount_value) }}</h6>
                                                        @else
                                                            <h6 class="al-title-16px">{{ currency($discount->discount_value) }}</h6>
                                                        @endif
                                                        <h6 class="al-title-16px fw-medium up-text-gray"><del>{{ currency($item->product->price) }}</del></h6>
                                                    @else
                                                        <h6 class="al-title-16px">{{ currency($item->product->price) }}</h6>
                                                    @endif
                                                    
                                                </div> 
                                            </div>
                                            <a href="javascript:void(0)" class="product-remove2-btn" onclick="confirmModal('{{ route('customer.wishlist_item.update', ['product_id' => $item->product->id]) }}', true)">
                                                <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Remove" data-bs-placement="left">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                                        <path d="M11.4688 13.8594C11.7794 13.8594 12.0312 13.6075 12.0312 13.2969V7.67188C12.0312 7.36126 11.7794 7.10938 11.4688 7.10938C11.1581 7.10938 10.9062 7.36126 10.9062 7.67188V13.2969C10.9062 13.6075 11.1581 13.8594 11.4688 13.8594Z" fill="#0D0E10"/>
                                                        <path d="M7.53125 13.8594C7.84186 13.8594 8.09375 13.6075 8.09375 13.2969V7.67188C8.09375 7.36126 7.84186 7.10938 7.53125 7.10938C7.22064 7.10938 6.96875 7.36126 6.96875 7.67188V13.2969C6.96875 13.6075 7.22064 13.8594 7.53125 13.8594Z" fill="#0D0E10"/>
                                                        <path d="M11.75 2.89062C12.0606 2.89062 12.3125 2.63874 12.3125 2.32812C12.3125 2.01751 12.0606 1.76562 11.75 1.76562H7.25C6.93939 1.76562 6.6875 2.01751 6.6875 2.32812C6.6875 2.63874 6.93939 2.89062 7.25 2.89062H11.75Z" fill="#0D0E10"/>
                                                        <path d="M3.3125 3.45312C3.00189 3.45312 2.75 3.70501 2.75 4.01562C2.75 4.32624 3.00189 4.57812 3.3125 4.57812H3.875V14.9281C3.875 16.1993 4.91 17.2344 6.18125 17.2344H12.8187C14.0899 17.2344 15.125 16.1994 15.125 14.9281V4.57812H15.6875C15.9981 4.57812 16.25 4.32624 16.25 4.01562C16.25 3.70501 15.9981 3.45312 15.6875 3.45312H14.5625H4.4375H3.3125ZM14 4.57812V14.9281C14 15.5806 13.4712 16.1094 12.8187 16.1094H6.18125C5.52875 16.1094 5 15.5806 5 14.9281V4.57812H14Z" fill="#0D0E10"/>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    {{ $wishlist_items->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
    <!-- My Review Area End -->
@endsection

@push('js')

@endpush
