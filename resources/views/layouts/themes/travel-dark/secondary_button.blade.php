@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        
        .tr-gradient2-btn,
        .tr-gradient1-btn,
       .wc-btn-outline-dark,
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
        .item-slider-btn:hover,
        .fsh-sm3-btn-dark:hover,
        .fsh-sm-btn-secondary.active, .fsh-sm-btn-secondary:hover,
        .tr-gradient2-btn:hover,
        .tr-white-btn-large:hover, .tr-white-btn-small:hover,
        .tr-gradient1-btn:hover,
        .items:hover .tr-white-btn-small,

         .fsh-btn-outline-secondary:hover,
        .ca-btn-outline-secondary:hover,
        .fsh-sm-btn-warning:hover,
        .product-card:hover .product-card-btn,
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
        }
      
       
          .fsh-btn-warning,
        .fsh-btn-dark{
            border: 1px solid {{ $secondary_button['color'] }} !important; 
        }
        
        
    </style>
@endif
