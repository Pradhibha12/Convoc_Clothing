@extends('layouts.frontend')
@push('title', 'Track Order')
@push('meta')
@endpush
@push('css')
<style>
    .track-card {
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        background-color: #fff;
    }
    .track-input {
        height: 48px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        font-size: 15px;
        padding: 0 16px;
        width: 100%;
        transition: all 0.3s;
    }
    .track-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        outline: none;
    }
    .track-btn {
        height: 48px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        background-color: #0f172a;
        color: #fff;
        border: none;
        width: 100%;
        transition: all 0.3s;
    }
    .track-btn:hover {
        background-color: #1e293b;
        transform: translateY(-1px);
    }
    .timeline-track {
        position: relative;
        padding-left: 32px;
        list-style: none;
    }
    .timeline-track::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 0;
        bottom: 0;
        width: 2px;
        background-color: #e2e8f0;
    }
    .timeline-track-item {
        position: relative;
        padding-bottom: 24px;
    }
    .timeline-track-item::before {
        content: '';
        position: absolute;
        left: -29px;
        top: 4px;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #e2e8f0;
        border: 3px solid #fff;
        box-shadow: 0 0 0 1px #cbd5e1;
        z-index: 1;
    }
    .timeline-track-item.active::before {
        background-color: #3b82f6;
        box-shadow: 0 0 0 1px #3b82f6, 0 0 8px rgba(59, 130, 246, 0.5);
    }
    .timeline-track-item.completed::before {
        background-color: #10b981;
        box-shadow: 0 0 0 1px #10b981;
    }
    .timeline-track-item:last-child {
        padding-bottom: 0;
    }
</style>
@endpush

@section('content')
    <!-- Breadcrumb Area Start -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-area mt-3 mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                        <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Track My Order') }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fsh-breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Track Order') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <section class="mb-100px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Tracking Search Form -->
                    <div class="track-card p-4 mb-4 wow animate__fadeInUp" data-wow-delay=".2s">
                        <h4 class="al-title-18px mb-3">{{ get_phrase('Enter Tracking Details') }}</h4>
                        <form action="{{ route('order.track') }}" method="get">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label fs-13px fw-semibold text-muted">{{ get_phrase('Order ID (e.g. #101)') }}</label>
                                    <input type="text" name="order_id" class="track-input" placeholder="#100" value="{{ request('order_id') }}" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fs-13px fw-semibold text-muted">{{ get_phrase('Email or Phone Number') }}</label>
                                    <input type="text" name="phone_or_email" class="track-input" placeholder="e.g. 9876543210 or email@example.com" value="{{ request('phone_or_email') }}" required>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="track-btn">{{ get_phrase('TRACK') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if ($searched)
                        @if ($order)
                            <!-- Tracking Status Display -->
                            <div class="track-card p-4 mb-4 wow animate__fadeInUp" data-wow-delay=".3s">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pb-3 mb-4 border-bottom">
                                    <div>
                                        <h5 class="al-title-16px mb-1">{{ get_phrase('Order Status') }}: 
                                            <span class="badge" style="background-color: {{ $order->order_updates->last()->order_status->color ?? '#3b82f6' }};">
                                                {{ $order->order_updates->last()->order_status->name ?? get_phrase('Pending') }}
                                            </span>
                                        </h5>
                                        <p class="text-muted fs-13px mb-0">{{ get_phrase('Order ID') }}: #{{ $order->id + 100 }} | {{ get_phrase('Placed on') }} {{ date_formatter($order->created_at) }}</p>
                                    </div>
                                    <div class="text-md-end">
                                        <h5 class="al-title-16px mb-1">{{ get_phrase('Total Amount') }}: {{ currency($order->payable_amount) }}</h5>
                                        <p class="text-muted fs-13px mb-0">{{ get_phrase('Payment Method') }}: {{ strtoupper(str_replace('_', ' ', $order->payment_method)) }}</p>
                                    </div>
                                </div>

                                <div class="row g-4">
                                    <!-- Timeline Section -->
                                    <div class="col-md-6 border-end">
                                        <h5 class="al-title-15px mb-3">{{ get_phrase('Tracking Timeline') }}</h5>
                                        <ul class="timeline-track">
                                            @php
                                                $allUpdates = $order->order_updates()->with('order_status')->orderBy('id', 'asc')->get();
                                                $latestUpdateId = $allUpdates->last()->id ?? null;
                                            @endphp

                                            @foreach($allUpdates as $update)
                                                <li class="timeline-track-item {{ $update->id === $latestUpdateId ? 'active' : 'completed' }}">
                                                    <h6 class="fs-14px fw-bold text-dark mb-1">{{ $update->order_status->name }}</h6>
                                                    <p class="text-muted fs-12px mb-1">{{ $update->message }}</p>
                                                    <small class="text-muted fs-11px">{{ date_formatter($update->created_at) }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <!-- Shipping details and items -->
                                    <div class="col-md-6">
                                        <h5 class="al-title-15px mb-3">{{ get_phrase('Delivery Address') }}</h5>
                                        <p class="text-muted fs-13px lh-base mb-4">
                                            <strong>{{ $order->shipping_address->address ?? '' }}</strong><br>
                                            {{ get_phrase('Zip Code') }}: {{ $order->shipping_address->zip_code ?? '' }}<br>
                                            {{ get_phrase('City') }}: {{ $order->shipping_address->city->name ?? '' }}<br>
                                            {{ get_phrase('State') }}: {{ $order->shipping_address->state->name ?? '' }}<br>
                                            {{ get_phrase('Country') }}: {{ $order->shipping_address->country->name ?? '' }}
                                        </p>

                                        <h5 class="al-title-15px mb-3">{{ get_phrase('Order Items') }}</h5>
                                        <div class="table-responsive">
                                            <table class="table table-sm border-0">
                                                <tbody>
                                                    @foreach($order->order_items as $item)
                                                        <tr>
                                                            <td class="align-middle text-muted fs-13px">{{ $item->product->title }}</td>
                                                            <td class="align-middle text-muted fs-13px text-center">x{{ $item->quantity }}</td>
                                                            <td class="align-middle fw-semibold fs-13px text-end">{{ currency($item->price) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Error display -->
                            <div class="track-card p-5 text-center mb-4 wow animate__fadeInUp" data-wow-delay=".3s">
                                <div class="text-danger mb-3">
                                    <i class="fas fa-exclamation-circle fa-3x"></i>
                                </div>
                                <h4 class="al-title-18px mb-2">{{ get_phrase('Order Not Found') }}</h4>
                                <p class="text-muted fs-14px mb-0">{{ get_phrase('Contact information or Order ID does not match. Please verify and try again.') }}</p>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
