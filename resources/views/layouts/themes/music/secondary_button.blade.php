@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
       
        /* .ca-btn-secondary,
        .bab2-btn-white,
        .bab2-btn-outline-dark, */
        
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
             border-color: {{ $secondary_button['color'] }} !important;
        }
        .fsh-sm-btn-dark ,
        .product-card-btn:hover,
        .hero-slider-prev:hover, .hero-slider-next:hover,
        .mib2-btn-outline-dark:hover,
        .mib2-btn-dark::before,
        .product-card-btn:hover,
        .mi-btn-dark:hover,
        .mib2-btn-outline-dark:hover,
         .fsh-btn-outline-secondary:hover,
        .ca-btn-outline-secondary:hover,
        .fsh-sm-btn-warning:hover,
        /* .pc-details-btn:hover,
        .pc-add-cart-btn:hover,
        .ca-btn-white:hover,
        .ca-btn-white:hover,
        .ca-btn-secondary:hover,
        .bab2-btn-white:hover,
        .bab2-btn-outline-dark:hover,
        .ba-btn-outline-dark:hover, */
        .fsh-btn-warning:hover,
        .fsh-btn-dark:hover,
        .bab2-btn-outline-dark:hover,
        .fsh-btn-warning:hover,
        .fsh-btn-dark:hover,
        .fsh-btn-outline-dark:hover,
        .category-pagination .swiper-button-next:hover, .category-pagination .swiper-button-prev:hover,
       .ba-btn-outline-dark:hover{
              @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
            border-color: {{ $secondary_button['hover-color'] }} !important;
        }
        .mi-btn-outline-dark:hover,
        .product-card:hover .product-card-btn {
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
             @if(Str::startsWith($secondary_button['background-hover-color'], 'linear-gradient'))
                background-image: {{ $secondary_button['background-hover-color'] }} !important;
            @else
                background: {{ $secondary_button['background-hover-color'] }} !important;
            @endif
            color: {{ $secondary_button['hover-color'] }} !important;
        }
       
          .fsh-btn-warning,
        .fsh-btn-dark{
            border: 1px solid {{ $secondary_button['color'] }} !important; 
        }
        
        
    </style>
@endif
