@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        .sm-btn-outline-white,
        .pf-btn-outline-white,
        .animate-progress .proggress,
        .fsh-btn-outline-dark,
        .fsh-sm-btn-secondary,
        .alert-signup-btn {
            @if(Str::startsWith($secondary_button['background-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-color'] }} !important;
            @else
                background: {{ $secondary_button['background-color'] }} !important;
            @endif
            color: {{ $secondary_button['color'] }} !important;
        }
        .item-slider-btn:hover,
        .fsh-sm-btn-secondary.active, .fsh-sm-btn-secondary:hover,
       .fsh-sm3-btn-dark:hover,
       .fsh-page-link:hover,
        .fsh-btn-dark,
        .fsh-btn-warning,
        .sm-btn-outline-white:hover,
        .pf-btn-outline-white:hover,
        .fsh-btn-outline-dark:hover,
        .fsh-btn-dark:hover,
        .fsh-btn-outline-dark:hover, 
        .alert-signup-btn:hover {
             @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
        }
        .sm-btn-outline-white:hover,
        .pf-btn-outline-white:hover,
        .fsh-btn-outline-dark:hover{
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
        }
    </style>
@endif
