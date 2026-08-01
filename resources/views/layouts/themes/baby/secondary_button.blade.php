@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        
        .cts-btn-outline-black,
        .cts-btn-white,
        .fsh-btn-warning,
        .fsh-btn-dark,
        .fsh-btn-outline-dark,
        .category-pagination .swiper-button-next, .category-pagination .swiper-button-prev,
        .ba-btn-outline-dark {
            @if(Str::startsWith($secondary_button['background-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-color'] }} !important;
            @else
                background: {{ $secondary_button['background-color'] }} !important;
            @endif
            color: {{ $secondary_button['color'] }} !important;
            
        }
        .fsh-progress-md .progress-bar,
        .ba-btn-outline-dark:hover,
        .bab2-btn-white:hover,
        .cts-btn-outline-black:hover,
        .cts-btn-white:hover,
        .fsh-btn-warning:hover,
        .fsh-btn-dark:hover,
        .fsh-btn-warning:hover,
        .fsh-btn-dark:hover,
        .fsh-btn-outline-dark:hover,
        .category-pagination .swiper-button-next:hover, .category-pagination .swiper-button-prev:hover{
             @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
        }
       
          .fsh-btn-warning,
        .fsh-btn-dark{
            border: 1px solid {{ $secondary_button['color'] }} !important; 
        }
        
        
    </style>
@endif
