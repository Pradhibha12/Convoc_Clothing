@extends('layouts.frontend')
@push('title', 'Events')
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
                <div class="breadcrumb-area mt-30px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                    <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Events') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb fsh-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Events') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->


<!-- Events Area Start -->
<section>
    <div class="container wow animate__fadeInUp" data-wow-delay=".2s"> 
        <div class="row   gy-4 mb-30px">
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="fsh-event-card">
                        <a href="{{ route('event_details', ['slug' => $event->slug]) }}" class="fsh-event-banner mb-3">
                            <img class="banner" src="{{ get_image($event->thumbnail) }}" alt="banner">
                        </a>
                        <div class="d-flex align-items-start gap-18px">
                            <div class="event-date-wrap">
                                <p class="al-subtitle3-16px mb-2 text-center text-nowrap text-uppercase">{{ date('M', strtotime($event->start_date)) }}</p>
                                <h2 class="al-title-30px text-center text-nowrap">{{ date('d', strtotime($event->start_date)) }}</h2>
                            </div>
                            <div>
                                <a href="{{ route('event_details', ['slug' => $event->slug]) }}" class="al-title-20px lh-1 mb-12px text-link2">{{ $event->title }}</a>
                                <p class="al-subtitle3-16px lh-base">{{ \Illuminate\Support\Str::words($event->summary, 10, '...') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mb-100px">
            <div class="col-12">
                {{ $events->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
<!-- Events Area End -->


@endsection

@push('js')
@endpush