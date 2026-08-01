@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp

@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        /* background color */
        .mi-btn-outline-dark,
        .mi-btn-outline-dark
        .product-card-btn,
        .mib2-btn-outline-dark,
        .sold-progress .proggress,
        .ca-btn-skin
         {
            background-color: {{ $primary_button['background-color'] }} !important;
            color: {{ $primary_button['color'] }} !important;
            border-color: {{ $primary_button['color'] }} !important;
        }
    </style>
@endif