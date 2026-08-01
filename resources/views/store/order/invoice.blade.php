
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 20px;
            background: #f9f9f9;
        }
        .invoice-container {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .header {
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            color: #000;
        }
        .invoice-meta {
            text-align: right;
        }
        .invoice-meta p {
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #e1e1e1;
            text-align: left;
        }
        table th {
            background: #f1f5ff;
            color: #333;
        }
        .text-right {
            text-align: right;
        }
        .summary {
            padding-top: 15px;
        }
        .summary ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .summary ul li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .total {
            font-size: 14px;
            font-weight: bold;
            color: #000;
        }
        .footer {
            text-align: center;
            border-top: 1px solid #e1e1e1;
            padding-top: 15px;
            margin-top: 30px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="invoice-container">
    {{-- Header --}}
    <div class="header d-flex justify-content-between">
        <h2>{{ get_phrase('Order Invoice') }}</h2>
        <div class="invoice-meta">
            <p><strong>{{ get_phrase('Invoice No') }}:</strong> #{{ $order->id + 100}}</p>
            <p><strong>{{ get_phrase('Date') }}:</strong> {{ date('d M, Y', strtotime($order->created_at)) }}</p>
        </div>
    </div>

    {{-- Order Items --}}
    <h3 style="margin-bottom:10px;">{{ get_phrase('Order Items') }}</h3>
    <table>
        <thead>
            <tr>
                <th>{{ get_phrase('Product') }}</th>
                <th>{{ get_phrase('Qty') }}</th>
                <th class="text-right">{{ get_phrase('Unit Price') }}</th>
                <th class="text-right">{{ get_phrase('Total') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->order_items as $order_item)
                @php
                    $product = $order_item->product;
                @endphp
                <tr>
                    <td>
                        <div>{{ $product->title }}</div>
                        @include('components.item_attributes_display', ['item_attributes' => $order_item->item_attributes])
                    </td>
                    <td>{{ $order_item->quantity }}</td>
                    <td class="text-right">{{ $order->currency_code }} {{ number_format($order_item->price, 2) }}</td>
                    <td class="text-right">{{ $order->currency_code }} {{ number_format($order_item->price * $order_item->quantity, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

     {{-- Summary --}}
    <div class="summary">
        <h4 style="margin-bottom:12px; font-size:15px; font-weight:600; color:#000;">
            {{ get_phrase('Total Summary') }}
        </h4>

        <table style="width:100%; border-collapse:collapse; border:none;">
            <tbody>
                <tr>
                    <td style="padding:8px 10px; text-align:left; border:none; color:#555;">
                        {{ get_phrase('Subtotal') }}
                    </td>
                    <td style="padding:8px 10px; text-align:right; border:none; color:#555;">
                        {{ $order->currency_code }} {{ number_format($order->total_price, 2) }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 10px; text-align:left; border:none; color:#555;">
                        {{ get_phrase('Discount') }}
                    </td>
                    <td style="padding:8px 10px; text-align:right; border:none; color:#555;">
                        - {{ $order->currency_code }} {{ number_format($order->total_discounted_amount, 2) }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 10px; text-align:left; border:none; color:#555;">
                        {{ get_phrase('Shipping Cost') }}
                    </td>
                    <td style="padding:8px 10px; text-align:right; border:none; color:#555;">
                        {{ $order->currency_code }} {{ number_format($order->total_shipping_cost, 2) }}
                    </td>
                </tr>
                <tr>
                    <td style="padding:8px 10px; text-align:left; border:none; color:#555;">
                        {{ get_phrase('VAT') }}
                    </td>
                    <td style="padding:8px 10px; text-align:right; border:none; color:#555;">
                        {{ $order->currency_code }} {{ number_format($order->total_amount_of_vat, 2) }}
                    </td>
                </tr>
                <tr style="background:#f1f5ff; border-top:1px solid ##e1e1e1;">
                    <td style="padding:12px 10px; text-align:left; font-weight:bold; color:#000;">
                        {{ get_phrase('Grand Total') }}
                    </td>
                    <td style="padding:12px 10px; text-align:right; font-weight:bold; color:#000; font-size:15px;">
                        {{ $order->currency_code }} {{ number_format($order->grand_total, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


