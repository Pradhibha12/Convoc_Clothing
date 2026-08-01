@extends('layouts.frontend')
@push('title', 'Store')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
 
 <!-- Breadcrumb Area Start -->
 <section >
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-area mt-30px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                    <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Store') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb fsh-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Store') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->


<!-- Store Area Start -->
<section>
    <div class="container">
        <div class="row gy-4  justify-content-center mb-100px wow animate__fadeInUp" data-wow-delay=".2s">
            @foreach($stores as $store)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-store">
                        <div class="store-profile-img mb-20px mx-auto">
                            <img src="{{ get_image($store->thumbnail) }}" alt="store">
                        </div>
                        <div class="text-center">
                            <a href="{{ route('store_details', ['slug' => $store->slug]) }}" class="al-title-20px lh-1 text-link2 text-center mb-10px">{{ $store->name }}</a>
                        </div>
                        <div class="d-flex align-items-center gap-1 justify-content-center mb-14px">
                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.1043 7.7858L12.2847 9.53942C12.0349 9.77984 11.8652 10.2607 11.917 10.6048L12.1999 12.6601C12.3837 13.9753 11.5682 14.5457 10.3897 13.9329L8.3909 12.8864C8.0562 12.712 7.50938 12.7214 7.18411 12.9147L5.4352 13.9376C4.05398 14.7437 3.22902 14.1356 3.59672 12.58L4.11055 10.4068C4.20483 10.0108 4.03041 9.46871 3.73343 9.20001L2.0788 7.70566C0.89557 6.63557 1.22555 5.66447 2.8189 5.54191L4.83651 5.39106C5.21364 5.36278 5.6709 5.06579 5.84532 4.73109L6.89184 2.72291C7.50938 1.54911 8.50404 1.55383 9.10272 2.73705L10.0361 4.58496C10.1964 4.89609 10.6018 5.19778 10.9459 5.24964L13.4444 5.65505C14.7926 5.88132 15.0896 6.83827 14.1043 7.7858Z" fill="#FBBF27"/>
                            </svg>                                
                            <p class="al-subtitle-14px fw-medium lh-1">
                                <span class="fsh-text-dark">{{ $store->average_rating }}</span> ({{ $store->total_reviews }})
                            </p>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('store_details', ['slug' => $store->slug]) }}" class="btn fsh-btn-dark">{{ strtoupper(get_phrase('VISIT STORE')) }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Pagination -->
            {{ $stores->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
<!-- Store Area End -->


@endsection

@push('js')
@endpush