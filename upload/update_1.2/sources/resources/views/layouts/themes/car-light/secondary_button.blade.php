@php
    $secondary_button = json_decode($active_theme->secondary_button, true);
@endphp

@if (isset($secondary_button['background-color']) && isset($secondary_button['color']) && $secondary_button['background-hover-color'] && $secondary_button['hover-color'])
    <style>
        /* background color */
        
        .ca-btn-outline-secondary,
       
        .ca-btn-secondary,
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
             /* border-color: {{ $secondary_button['color'] }} !important; */
        }
        .pc-saved-badge,
        .testimonial-nav .swiper-button-prev:hover,
         .testimonial-nav .swiper-button-next:hover,
        .skin-icon-box,
        .tips-list-iconbox,
        .ca-btn-skin,
        .ca-btn-white,
        .fsh-sm3-btn-dark,
        .fsh-sm-btn-secondary.active, .fsh-sm-btn-secondary:hover,
        .ca-btn-outline-secondary:hover,
        .ca-btn-outline-white:hover,
         .fsh-btn-outline-secondary:hover,
        .ca-btn-outline-secondary:hover,
        .fsh-sm-btn-warning:hover,
        .pc-details-btn:hover,
        .pc-add-cart-btn:hover,
        .ca-btn-secondary:hover,
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
            border-color: {{ $secondary_button['hover-color'] }} !important;
        }
       
          .fsh-btn-warning,
        .fsh-btn-dark{
            border: 1px solid {{ $secondary_button['color'] }} !important; 
        }
        .ft-nav-link:hover,
       .category-cards:hover .content h4{
            color: {{ $secondary_button['background-hover-color'] }} !important;
       }
       .product-card:hover .product-card-banner{
        border-color: {{ $secondary_button['background-hover-color'] }} !important;
       }
        .testimonial-nav .swiper-button-prev:hover svg path,
         .testimonial-nav .swiper-button-next:hover svg path{
              fill: {{ $secondary_button['hover-color'] }} !important;
         }
        
    </style>
@endif
