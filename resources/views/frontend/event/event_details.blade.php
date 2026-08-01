@extends('layouts.frontend')
@push('title', 'Event Details')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
<style>
    .table-bordered > :not(caption) > * {
	border-width: 0;
}
tbody, td, tfoot, th, thead, tr {
	border-style: none;
}
.fsh-banner > .banner {
	height: 440px;
}
.eventExpire {
	background: linear-gradient(90deg, #c2e9fb, #F3A97129, #65F6B730);
	padding: 53px 100px;
	border-radius: 16px;
	display: flex;
	align-items: center;
	justify-content: space-between;
}

.eventExpire h4 {
	font-size: 40px;
	font-weight: 600;
	line-height: 48px;
}

.offer-time-wrap {
	display: flex;
	gap: 48px;
}
.offer-box span {
    display: block;
    font-size: 26px;
    font-weight: 700;
}

.offer-box small {
    font-size: 13px;
    color: #fff;
    opacity: 0.9;
}
.offer-box {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.offer-number {
	background: #4F46E5;
	color: #fff;
	border-radius: 12px;
	font-size: 48px;
	font-weight: 700;
	width: 90px;
	text-align: center;
	height: 90px;
	display: flex;
	justify-content: center;
	align-items: center;
}

.offer-label {
	margin-top: 6px;
	font-size: 18px;
	font-weight: 500;
}
.al-subtitle3-14px{
    font-size: 16px;
    font-weight: 400;
    line-height: 26px;
}
.product-card-banner{
    height: 345px;
}
.offerText{
    position: absolute;
    top: 16px;
    left: 16px;
    background-color: #575FFF;
    color: #FFFFFF;
    padding: 6px 12px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 600;
    z-index: 10;
    display: inline-block;
}
.product-card-banner img {
	height: 340px;
	width: 100%;
	object-fit: cover;
	border-radius: 12px;
}
@media (max-width: 992px) {
    .eventExpire h4 {
        margin-bottom: 22px !important;
        font-size: 32px;
    }
  
}
@media (max-width: 767px) {
    .eventExpire  h4{
        font-size: 28px;
    }
    .offer-number {
        font-size: 20px;
        width: 80px;
        height: 80px;
    }
    .offer-time-wrap {
        gap: 25px;
    }
    .eventExpire {
        padding: 24px 50px;
        border-radius: 16px;
    }
    .fsh-banner > .banner {
        height: 300px;
    }
}
</style>
<!-- Breadcrumb Area Start -->
<section>
    <div class="container">
        <div class="row mt-20px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fsh-breadcrumb justify-content-start">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('events') }}">{{ get_phrase('Events') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $event_details->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->


<!-- Events Details Area Start -->
<section>
    <div class="container">
        
        <!-- Events Details Banner Area Start -->
        <div class="row wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <!-- 'fsh-banner' is not a changeable class, if you need to change then add another class. -->
                <div class="fsh-banner mb-30px">
                    <img class="banner" src="{{ get_image($event_details->banner) }}" alt="banner">
                </div>
            </div>
        </div>
        
        <!-- Events Details Title & Date Area Start -->
        <div class="row wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <div class="mb-30px pb-4">
                    <h1 class="al-title-34px lh-1 text-center mb-12px">{{ $event_details->title }}</h1>
                    <div class="fsh-icontext align-items-center justify-content-center mb-4 ">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 4H16.5V3C16.5 2.724 16.276 2.5 16 2.5C15.724 2.5 15.5 2.724 15.5 3V4H8.5V3C8.5 2.724 8.276 2.5 8 2.5C7.724 2.5 7.5 2.724 7.5 3V4H6C3.71 4 2.5 5.21 2.5 7.5V18C2.5 20.29 3.71 21.5 6 21.5H18C20.29 21.5 21.5 20.29 21.5 18V7.5C21.5 5.21 20.29 4 18 4ZM6 5H7.5V6C7.5 6.276 7.724 6.5 8 6.5C8.276 6.5 8.5 6.276 8.5 6V5H15.5V6C15.5 6.276 15.724 6.5 16 6.5C16.276 6.5 16.5 6.276 16.5 6V5H18C19.729 5 20.5 5.771 20.5 7.5V8.5H3.5V7.5C3.5 5.771 4.271 5 6 5ZM18 20.5H6C4.271 20.5 3.5 19.729 3.5 18V9.5H20.5V18C20.5 19.729 19.729 20.5 18 20.5Z" fill="#0D0E10"/>
                            </svg>

                        <p class="al-subtitle3-14px">{{ date_formatter($event_details->start_date) }} - {{ date_formatter($event_details->end_date) }}</p>
                    </div>
                    <p class="al-subtitle3-14px text-center">{{ $event_details->summary }} </p>
                </div>
            </div>
        </div>
       {{-- Offer --}}
        <div class="eventExpire flex-wrap mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <h4 id="offer-title" class="mb-2">{{ get_phrase('Event Starts in:') }}</h4>

            <div class="offer-time-wrap flex-wrap" id="countdown-box">
                <div class="offer-box">
                    <div id="days" class="offer-number">{{get_phrase('00')}}</div>
                    <div class="offer-label">{{get_phrase('Days')}}</div>
                </div>
                <div class="offer-box">
                    <div id="hours" class="offer-number">{{get_phrase('00')}}</div>
                    <div class="offer-label">{{get_phrase('Hours')}}</div>
                </div>
                <div class="offer-box">
                    <div id="minutes" class="offer-number">{{get_phrase('00')}}</div>
                    <div class="offer-label">{{get_phrase('Minutes')}}</div>
                </div>
                <div class="offer-box">
                    <div id="seconds" class="offer-number">{{get_phrase('00')}}</div>
                    <div class="offer-label">{{get_phrase('Seconds')}}</div>
                </div>
            </div>
        </div>
        {{-- Offer --}}


        {{-- Event Products --}}
        <div class="row justify-content-center wow animate__fadeInUp mt-5 pt-4" 
            data-wow-delay=".4s" id="event-products">

            <div class="col-lg-12">
                <div class="swiper products-slider">
                    <div class="swiper-wrapper">

                        @php
                            $productIDs = json_decode($event_details->product_id, true) ?? [];
                            if (!is_array($productIDs)) {
                                $productIDs = [];
                            }

                            $products = count($productIDs) > 0 
                                ? \App\Models\Product::whereIn('id', $productIDs)->get()
                                : collect();
                        @endphp

                        @if($products->count() > 0)
                            @foreach($products as $product)
                                @php
                                    $thumbs = json_decode($product->thumbnail, true) ?? [];
                                    $firstImage = $thumbs[0] ?? null;
                                @endphp

                                <a href="{{ route('product', $product->slug) }}" class="product-card swiper-slide position-relative">
                                    <span class="offerText">{{ get_phrase('Offer') }}</span>
                                    <div class="product-card-banner">
                                        <img class="banner" src="{{ get_image($firstImage) }}" alt="product">
                                    </div>
                                </a>
                            @endforeach
                        
                        @endif


                    </div>
                </div>
            </div>
        </div>
        {{-- Event Products --}}

        
        <!-- Events Details Content Area Start -->
        <div class="row justify-content-center mt-5 pb-4 wow animate__fadeInUp" data-wow-delay=".4s">
            <div class="col-lg-12">
                <div class="mb-30px text-center">
                    <p class="al-subtitle3-16px lh-base  text-center">{!! $event_details->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Events Details Area End -->


@endsection

@push('js')

<script>
"use strict";

function countdown() {
    const startDate = new Date("{{ date('Y-m-d\TH:i:s', strtotime($event_details->start_date)) }}").getTime();
    const endDate   = new Date("{{ date('Y-m-d\TH:i:s', strtotime($event_details->end_date)) }}").getTime();
    const now       = new Date().getTime();

    const countdownBox = document.getElementById("countdown-box");
    const productsBox   = document.getElementById("event-products");
    const offerTitle    = document.getElementById("offer-title");

    // -----------------------------
    // BEFORE OFFER START
    // -----------------------------
    if (now < startDate) {
        offerTitle.innerHTML = "Event Starts in:";

        const diff = startDate - now;
        updateTimer(diff);

        productsBox.style.display = "none";  // products hide
        return;
    }

    // -----------------------------
    // DURING OFFER
    // -----------------------------
    if (now >= startDate && now <= endDate) {
        offerTitle.innerHTML = "Event Ends in:";

        const diff = endDate - now;
        updateTimer(diff);

        productsBox.style.display = "block"; // products show
        return;
    }

    // -----------------------------
    // OFFER ENDED
    // -----------------------------
    if (now > endDate) {
        offerTitle.innerHTML = "Event Ended";

        countdownBox.style.display = "none"; 
        productsBox.style.display = "none";  

        offerTitle.style.textAlign = "center";
        offerTitle.style.width = "100%";
        offerTitle.style.marginTop = "20px";

        return;
    }

}


// Timer updater
function updateTimer(diff) {
    let days    = Math.floor(diff / (1000 * 60 * 60 * 24));
    let hours   = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML    = days < 10 ? "0" + days : days;
    document.getElementById("hours").innerHTML   = hours < 10 ? "0" + hours : hours;
    document.getElementById("minutes").innerHTML = minutes < 10 ? "0" + minutes : minutes;
    document.getElementById("seconds").innerHTML = seconds < 10 ? "0" + seconds : seconds;
}


setInterval(countdown, 1000);
countdown();
</script>



@endpush