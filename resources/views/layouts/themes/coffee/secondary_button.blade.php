@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        .bab2-btn-white,
        .bab2-btn-outline-dark,
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
      .item-slider-btn:hover,
        .notice-section,
        .single-category:hover .category-arrow-icon,
        .cts-btn-outline-white:hover,
        .cts-btn-outline-black:hover,
        .pc-card-btn:hover,
        .ctsb2-btn-outline-white:hover,
        .fsh-sm-btn-warning:hover,
        .bab2-btn-white:hover,
        .bab2-btn-outline-dark:hover,
        .ba-btn-outline-dark:hover,
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
            border-color: {{ $secondary_button['background-hover-color'] }} !important;
        }
       
          .fsh-btn-warning,
        .fsh-btn-dark{
            border: 1px solid {{ $secondary_button['color'] }} !important; 
        }
          .cts-btn-outline-white:hover svg path{
              
                fill: {{ $secondary_button['hover-color'] }} !important;
           
          }
        
        
    </style>
@endif
