@extends('layouts.vendor')
@push('title', get_phrase('Payment history'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px print-d-none">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                  
                </h4>

                <a href="{{ route('vendor.payments') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5 ">
            <div class="row">
                <div class="col-md-12">
                    <div class="ol-card mb-30px">
                        <div class="ol-card-body p-20px print-table print-p-0">
                            <div class="pb-20px ol-border-bottom mb-30px">
                                <div class="mb-20px d-flex align-items-center justify-content-between">
                                    <h5 class="title fs-16px mb-10px text-capitalize">{{get_phrase('Invoice')}}</h5>
                                    <p class="sub-title fs-16px text-break">
                                        #{{ implode(', ', $orders->pluck('id')->map(fn($id) => $id + 100)->toArray()) }}
                                    </p>
                                </div>
                                <ul class="ol-list-group-2 max-w-280px">
                                    <li>
                                        <span class="title fs-16px fw-normal text-capitalize">{{get_phrase('Invoice date')}}</span>
                                        <span class="title2 fs-16px">{{date_formatter($payment->created_at, 1)}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="pb-20px ol-border-bottom mb-20px">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="d-flex gap-3 justify-content-between flex-wrap">
                                            <div>
                                                <h4 class="title fs-18px text-capitalize mb-20px">{{get_phrase('Invoice To')}}</h4>
                                                <ul class="ol-list-group-2">
                                                    <li class="title fs-16px fw-normal text-capitalize">{{$payment->user->name}}</li>
                                                    <li class="title fs-16px fw-normal text-capitalize">{{$payment->user->email}}</li>
                                                    <li class="title fs-16px fw-normal text-capitalize">{{$payment->user->address}}</li>
                                                    <li class="title fs-16px fw-normal text-capitalize">{{$payment->user->phone}}</li>
                                                </ul>
                                            </div>
                                            <div class="max-w-280px w-100">
                                                <h4 class="title fs-18px text-capitalize mb-20px">{{get_phrase('Payment details')}}</h4>
                                                <ul class="ol-list-group-2 w-100">
                                                    <li>
                                                        <span class="title fs-16px fw-normal text-capitalize">{{ get_phrase('Total') }}</span>
                                                        <span class="title2 fs-16px">{{ number_format($total_amount, 2) }} {{ $payment->currency_code }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title fs-16px fw-normal text-capitalize">{{get_phrase('Due')}}</span>
                                                        <span class="title2 fs-16px">
                                                            @if($payment->status == 'paid')
                                                                0 {{$payment->currency_code}}
                                                            @else
                                                                {{$payment->currency}} {{$payment->currency_code}}
                                                            @endif
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="title fs-16px fw-normal text-capitalize">{{get_phrase('Payment method')}}</span>
                                                        <span class="title2 fs-16px">
                                                            <span class="badge bg-dark text-capitalize">{{$payment->payment_method}}</span>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-table-wrap">
                                <!-- Table  -->
                                <div class="table-responsive">
                                    {{-- Orders and items table --}}
                                    <table class="table ol-table mb-3 text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{ get_phrase('Product') }}</th>
                                                <th class="text-end pe-5" scope="col">{{ get_phrase('Quantity') }}</th>
                                                <th class="text-end pe-5" scope="col">{{ get_phrase('Price') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @php
                                                $orderIds = json_decode($payment->order_id, true);
                                                $totalVat = 0;
                                                $totalShipping = 0;
                                                $totalGrand = 0;
                                            @endphp

                                            @if(is_array($orderIds))
                                                @foreach($orderIds as $id)
                                                    @php
                                                        $order = \App\Models\Order::with('order_items.product')->find($id);
                                                    @endphp

                                                    @if($order)
                                                        {{-- Order Items --}}
                                                        @foreach ($order->order_items as $order_item)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex justify-content-between">
                                                                        <p>{{ $order_item->product->title }}</p>
                                                                        <p class="sub-title fs-16px text-break">#{{ $id + 100 }}</p>
                                                                    </div>
                                                                </td>
                                                                <th class="text-end pe-5">{{ $order_item->quantity }}</th>
                                                                <td class="text-end pe-5">
                                                                    @if($order_item->discount_price && $order_item->discount_price < $order_item->price)
                                                                        <h4 class="title fs-16px">{{ $order->currency_code }} {{ number_format($order_item->discount_price, 2) }}</h4>
                                                                        <h4 class="title fs-16px fw-medium up-text-gray">
                                                                            <del>{{ $order->currency_code }} {{ number_format($order_item->price, 2) }}</del>
                                                                        </h4>
                                                                    @else
                                                                        <h4 class="title fs-16px">{{ $order->currency_code }} {{ number_format($order_item->price, 2) }}</h4>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        @php
                                                            // Accumulate totals
                                                            $totalVat += $order->total_amount_of_vat;
                                                            $totalShipping += $order->total_shipping_cost;
                                                            $totalGrand += $order->grand_total;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                {{--  Combined Summary shown once --}}
                                                <tr>
                                                    <td class="border-0"></td>
                                                    <th class="text-end pe-5 text-uppercase">{{ get_phrase('Total VAT') }}</th>
                                                    <th class="text-end pe-5">{{ number_format($totalVat, 2) }}</th>
                                                </tr>
                                                <tr>
                                                    <td class="border-0"></td>
                                                    <th class="text-end pe-5">{{ get_phrase('Total Shipping Cost') }}</th>
                                                    <th class="text-end pe-5">{{ number_format($totalShipping, 2) }}</th>
                                                </tr>
                                                <tr>
                                                    <td class="border-0"></td>
                                                    <th class="text-end pe-5 border-0">{{ get_phrase('Grand Total') }}</th>
                                                    <th class="text-end pe-5 border-0">
                                                        {{ number_format($totalGrand, 2) }} {{ $payment->currency_code }}
                                                    </th>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row print-d-none">
                        <div class="col-md-12 text-end pe-3">
                            <button type="button" class="btn btn-primary me-2 mb-3" onclick="window.print();"><i class="fi-rr-print"></i> {{get_phrase('Print')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
