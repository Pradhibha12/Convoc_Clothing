@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        .bsb2-btn-skin,
        .bs-btn-skin,
        .bsb3-btn-skin,
        .newsletter-btn,


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
            border-color: {{ $secondary_button['background-color'] }} !important;
        }

        /* .bsb3-btn-skin:hover, */
        .bsb3-btn-skin::before,
        .bs-btn-white:hover,
        .bs-btn-skin:hover,
        .bs-btn-skin::before,
        .bsb2-btn-white::before,
        .category-btn-inner:hover,
        .bsb2-btn-skin::before,

        .fsh-btn-warning,
        .fsh-btn-dark:hover,
         .fsh-btn-outline-secondary:hover,
        .ca-btn-outline-secondary:hover,
        .fsh-sm-btn-warning:hover,
        .fsh-sm3-btn-dark:hover,
        .fsh-sm-btn-secondary:hover,
        
        .fsh-btn-warning:hover,
        .bab2-btn-outline-dark:hover,
        .fsh-btn-warning:hover,
        .fsh-btn-outline-dark:hover,
        .category-pagination .swiper-button-next:hover, .category-pagination .swiper-button-prev:hover,
       .ba-btn-outline-dark:hover{
             @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
        }
        .product-card:hover .product-card-btn {
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
              @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
        }

        
        
    </style>
@endif
