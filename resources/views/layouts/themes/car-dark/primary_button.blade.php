@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp

@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        /* background color */
        .ca-btn-white,
        /* .ca-sm-btn-white, */
        .cab2-btn-white,
        .fsh-sm-btn-dark  {
            background-color: {{ $primary_button['background-color'] }} !important;
            color: {{ $primary_button['color'] }} !important;
        }
    </style>
@endif