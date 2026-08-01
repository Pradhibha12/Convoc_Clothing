@extends('layouts.frontend')
@push('title', 'About Us')
@push('meta')
@endpush
@push('css')
<style>
    .teamHeader{
        margin-bottom: 24px;
    }
    .staff-card {
    width: 280px;
    height: 350px;
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    background: #000;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.staff-card-image {
    position: absolute;
    inset: 0;
}

.staff-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.staff-gradient {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 55%;
    background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(0,0,0,0.85) 100%);
}

.staff-info {
    position: relative;
    padding: 20px;
    color: #fff;
    z-index: 10;
}

.staff-name {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 4px;
}
.teamMembers{
    margin-bottom: 90px;
}
.al-subtitle3-40px{
    font-size: 40px;
    font-weight: 600;
    line-height: 48px;
    margin-bottom: 24px;
}

</style>
@endpush

@section('content')

    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-30px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center mb-20px">{{get_phrase('About')}}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{get_phrase('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{get_phrase('About')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->


    <!-- About Area 1 Start -->
    <section>
        <div class="container">
            <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="col-12">
                    <div>
                        <h1 class="al-subtitle3-40px text-center mb-2">{{get_phrase('Unleashing the Future of E-Commerce Excellence.')}}</h1>
                        <p class="al-subtitle3-16px lh-base text-center">{{get_phrase('Free shipping to First-Time customers Only, After promotions and discounts are applied')}}</p>
                    </div>
                </div>
            </div>
            <div class="row mb-50px wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-12">
                    <div class="about-large-banner">
                        <img class="banner" src="{{ asset('assets/frontend/fashion/images/images/about.png') }}" alt="banner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area 1 End -->


    {{-- Team Members  --}}
    <section class="teamMembers wow animate__fadeInUp" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="teamHeader">
                        <h4 class="al-subtitle3-40px text-center mb-2">{{get_phrase('Meet our team members')}}</h4>
                        <p class="al-subtitle3-16px lh-base text-center">{{get_phrase('Where Unity and Brilliance Converge to Create Endless Possibilities.')}}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="swiper products-slider">
                        <div class="swiper-wrapper">
                            @php
                                $teamMembers = \App\Models\User::where('user_type', 'staff')->get();
                            @endphp

                            @foreach($teamMembers as $member)
                                <div class="swiper-slide staff-card">
                                    <div class="staff-card-image">
                                        <img src="{{ get_image($member->photo) }}" alt="Staff Photo">
                                        <div class="staff-gradient"></div>
                                    </div>

                                    <div class="staff-info">
                                        <h4 class="staff-name">{{ $member->name }}</h4>
                                        <p class="staff-role">{{ $member->designation ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
            </div>
        </div>
    </section>

    <section class="aboutBottomText wow animate__fadeInUp" data-wow-delay=".2s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="eText text-center mb-5 pb-5">
                        <h4 class="al-subtitle3-40px lh-base text-center">{{get_phrase('Empowering Sellers on E-Shop')}}</h4>
                            <p class="al-subtitle3-16px lh-base mb-3">{{get_phrase('We aim to connect food the producers and consumers in the same geographic region, to develop more self-reliant and resilient networks improve local economies affect the health, environment, community, or society of a particular place. ')}}</p>
                            <p class="al-subtitle3-16px lh-base mb-3">{{get_phrase("Develop more self-reliant and resilient networks improve local economies It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. ")}}</p>
                            <img class="m-auto" src="{{ asset('assets/frontend/fashion/images/images/aboutSvg.svg') }}" alt="">
                            <p class="al-subtitle3-16px lh-base">{{get_phrase("when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes on purpose (injected humour and the like). ")}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

  

@endsection

@push('js')
@endpush
