@php
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $page_title = json_decode($active_theme->page_title, true);
    $theme_button = json_decode($active_theme->theme_button, true);
    $filter = json_decode($active_theme->filter, true);
    
@endphp

@if (isset($font_family['font_family']))
    <style>
        .mega-nav-title,
        .footer-nav-title,
        .product-card-title,
        .category-card-title,
        .testimonial-comment,
        .ec-btn-outline-dark,
        .ec-sm2-btn-dark,
        .al-title-18px,
        .al-title-16px,
        .al-title-14px,
        .fsh-mixitup-btn,
        .product-card-btn,
        .wc-btn-outline-dark,
        .ft-nav-title,
        .ba-btn-outline-dark,
        p,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        .product-card-price,
        .footer-newsletter-title,
        .why-choose3-title,
        .product-bundle-title,
        .ptb5-btn-skin,
        .ptb2-btn-skin,
        .card-product-price,
        .product-list-view .al-title2-16px,
        .product-lg-card-title,
        .product-sm-card-title,
        .product-md-card-title,
        .ptb4-btn-skin,
        .ft-newsletter-title,
        .blog-card-title,
        .pt-btn-skin,
        .product-filter-btn,
        .tb-card-title,
        .project-card-title,
        .banner-title,
        .iconText-btn,

        .category-title,
        .ba-banner-title,
         .benefit-title,
         .blog-list-title,
         .newsletter-card-title,
        .al-title-42px,
        .seasonal-product-title,
        .alert-signup-btn,
        .section-title,
        .product-served-badge-title {
            font-family: {{ $font_family['title_font_family'] }}  !important;
        }
        /* Font */
    </style>
@endif



 @if (isset($body['color']) )
    <style>
        .al-subtitle2-14px,
        .fsh-breadcrumb .breadcrumb-item.active,
        .text-link:hover,
        .al-subtitle-14px,
       .fsh-text-skin,
        body {
            color: {{ $body['color'] }} !important;
        }
        
        .bordered-circle-iconlink svg path
        .circle-iconbox-48px svg path{
            fill: {{ $body['color'] }} !important;
        }
        .fsh-tab-pills{
            border-color: {{ $body['color'] }} !important;
        }
        .fsh-form-control,
         .fsh-form-textarea{
            border-color: {{ $body['color'] }} !important;
        }
         /* .list_style */
    </style>
@endif
@if (isset($body['background-color']) )
    <style>
        .fsh-md-select,
        .fsh-form-textarea,
        /* .offcanvas-header .btn-close, */
        .offcanvas.offcanvas-end,
        .fsh-form-control,
        .header-login-modal .modal-body,
        .quick-view-modal .modal-content,
        
        .table > :not(caption) > * > *,
        body {
            background: {{ $body['background-color'] }} !important;
        }
        .header-login-modal .modal-body{
            border-radius: 12px;
        }

       
        /* Color */
    </style>
@endif


@if (isset($body['section-background-color']))
    <style>
        /* background color */
        .testimonial-section,
        .top-picks-product-section,
        .trending-product-section {
              @if(Str::startsWith($body['section-background-color'], 'linear-gradient'))
                background-image: {{ $body['section-background-color'] }} !important;
            @else
                background: {{ $body['section-background-color'] }} !important;
            @endif
        }
         /* background color */

    </style>
@endif
@if (isset($body['footer-background-color']))
    <style>
        /* background color */
        .footer-section,
        .footer-section-main,
        .footer-section-inner {
             @if(Str::startsWith($body['footer-background-color'], 'linear-gradient'))
                background-image: {{ $body['footer-background-color'] }} !important;
            @else
                background: {{ $body['footer-background-color'] }} !important;
            @endif
        }
         /* background color */

    </style>
@endif
@if (isset($body['card-background-color']))
    <style>
        /* background color */

        .product-md-card,
        .sh1-product-card,
        .product-card:hover,
        .product-list-view{
            background: {{ $body['card-background-color'] }} !important;
        }
     /* background color */
    </style>
@endif

@if (isset($theme_button['background-color']) && isset($theme_button['color'])  )
    <style>
        /* Normal Button */
        
        .bsb2-btn-white:hover,
        
        .ec-btn-success,
         .fsh-progress-md .progress-bar, 
         .mi-btn-dark,
        .mib2-btn-dark,
        .fsh-sm-btn-warning,
        .cab3-btn-skin,
        .top-profile-images .slick-dots li.slick-active,
        .cab2-btn-skin {
            @if(Str::startsWith($theme_button['background-color'], 'linear-gradient'))
                background-image: {{ $theme_button['background-color'] }};
            @else
                background: {{ $theme_button['background-color'] }} !important;
            @endif

            color: {{ $theme_button['color'] }} !important;
        } 
        .ec2-btn-success:hover,
        .ec-btn-white:hover,
        .ca-btn-outline-dark:hover,
        .cab2-btn-skin:hover{
            background: {{ $theme_button['background-color'] }} !important;
            color: {{ $theme_button['color'] }} !important;
        }
        
        /* Color*/
        
        
    </style>
@endif

@if (isset($page_title['background-color']) )
    <style>
        .product-additional-info,
         .breadcrumb-area,
        .gray-card-sidebar,
        .page-title-section {
            background-color: {{ $page_title['background-color'] }} !important;
            
        }
</style>
 @endif 


