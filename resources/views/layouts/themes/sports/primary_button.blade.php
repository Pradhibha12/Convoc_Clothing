@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp


@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        /* background color */
        .ec-btn-outline-dark:hover,
        .fsh-sm3-btn-dark,
        .quick-view-btn,
        .fsh-btn-dark,
        .fsh-btn-outline-dark,
        .ec-sm2-btn-dark,
        .ec-btn-dark,
        .ec-sm2-btn-dark,
        .sold-progress .proggress,
        .ca-btn-skin,
        .fsh-sm-btn-dark  {
            background-color: {{ $primary_button['background-color'] }} !important;
            color: {{ $primary_button['color'] }} !important;
        }
        .ec-btn-outline-dark:hover{
            border-color: {{ $primary_button['background-color'] }} !important;
        }
    </style>
@endif