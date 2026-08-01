@extends('layouts.frontend')
@push('title', 'Home page')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')

    <!-- Start Location Area -->
    <section>
        <div class="container">
            <!-- Location -->
            <div class="row">
                <div class="col-md-12">
                    <div class="location-path-area mt-30 mb-20">
                        <p class="location"><a href="{{route('home')}}">{{get_phrase('Home')}}</a> &nbsp;/&nbsp; <a href="#" class="active">{{$page->title}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Location Area -->

    <!-- Start Page Title Area -->
    <section class="page-title-section">
        <div class="container">
            <!-- Page Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-header">
                        <h1 class="title">{{$page->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-banner-section mb-5">
        <div class="container">
            {!!$page->title!!}
        </div>
    </section>
    <!-- End About Area -->
@endsection

@push('js')

@endpush
