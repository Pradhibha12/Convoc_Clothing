@php
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $page_title = json_decode($active_theme->page_title, true);
    $theme_button = json_decode($active_theme->theme_button, true);
    $filter = json_decode($active_theme->filter, true);
    
@endphp

@if (isset($font_family['font_family']))
    <style>
        .al-title-16px,
        .mage-nav-sublink,
        .ba-btn-outline-dark,
        p,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        .content h4,
        .hero-title,
        .ft-nav-title,
        .feature-title,
        .category-card-title,
        .tp-content-price,
        .ca-btn-skin,
        .bn-overlay-btn,
        .bn-overlay-title,
        .cab2-btn-white,
        .cab2-btn-skin,
        .banner-title,

        .category-title,
        .ba-banner-title,
         .benefit-title,
         .blog-list-title,
         .newsletter-card-title,
        .al-title-42px,
        .footer-nav-title,
        .seasonal-product-title,
        .alert-signup-btn,
        .product-card-title,
        .section-title,
        .product-served-badge-title {
            font-family: {{ $font_family['title_font_family'] }}  !important;
        }
        /* Font */
    </style>
@endif



 @if (isset($body['color']) )
    <style>
        .category-card-title,
        .category-card-subtitle,
        .fsh-form-textarea:focus,
        .fsh-breadcrumb .breadcrumb-item + .breadcrumb-item.active::before,
        .offcanvas-header .btn-close,
        .fsh-btn-outline-secondary,
        .al-title-14px,
        .fsh-form-label,
        .header-login-modal .modal-header .btn-close,
        .quick-view-modal .modal-header .btn-close,
        .al-title-12px,
        .section-sm-title,
        .footer-copyright-text,
        .footer-subtitle,
        .footer-nav-link,
        .footer-nav-title,
        .ba-banner-title,
        .benefit-title,
        .section-title,
        .text-dark,
        .form-checkbox2-label,
        .fsh-form-control,
        .al-title-20px,
        .table > :not(caption) > * > *,
        .fsh-breadcrumb .breadcrumb-item.active,
        .al-title-42px,
        .fsh-tab-link,
        .nav-pills .fsh-tab-link.active,
        .al-title-18px,
        .fsh-text-dark,
        .fsh-text-gray,
        .al-title-16px,
        .al-title-24px,
        .al-title-30px,
        .form-checkbox-label,
        .category-nav-link,
        .product-card-title,
        .product-card-price,
        .al-subtitle-14px,
        body {
            color: {{ $body['color'] }} !important;
        }
       
        
        .bordered-circle-iconlink svg path,
        /* .circle-iconbox-42px svg path, */
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
        .car-tips-section,
        .our-features-section,
        .newsletter-card,
        .new-arrivals-section {
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
        .footer-section {
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
        .product-list-view,
        .category-card-body {
            background: {{ $body['card-background-color'] }} !important;
        }
     /* background color */
    </style>
@endif

@if (isset($theme_button['background-color']) && isset($theme_button['color'])  )
    <style>
        /* Normal Button */
        .fsh-progress-md .progress-bar,
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
        .ca-btn-outline-dark:hover,
        .cab2-btn-skin:hover{
            background: {{ $theme_button['background-color'] }};
        }
        
        /* Color*/
        
        
    </style>
@endif

@if (isset($page_title['background-color']) )
    <style>
        /* .fsh-tab-link::after, */
        .product-additional-info,
         .breadcrumb-area,
        .gray-card-sidebar,
        .page-title-section {
            background-color: {{ $page_title['background-color'] }} !important;
            
        }
</style>
 @endif 


