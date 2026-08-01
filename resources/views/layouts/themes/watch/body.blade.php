@php
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $page_title = json_decode($active_theme->page_title, true);
    $theme_button = json_decode($active_theme->theme_button, true);
   
    
@endphp
@if (isset($font_family['font_family']))
    <style>
        /* background color */
        .mage-nav-sublink,
        .header-user-dropdown-menu .dropdown-item,
        .al-title-18px,
        .table1-heading,
        .fsh-breadcrumb,
        .al-title-42px,
        .al-subtitle-16px,
        .fsh-btn-dark,
        .form-checkbox3-label,
        .al-title-20px,
        .al-title-20px,
        .al-subtitle-16px,
        .al-title-16px ,
         .al-subtitle-16px,
        .fsh-btn-dark,
        .form-checkbox3-label,
        .al-title-20px,
        .al-title-20px,
        .al-subtitle-16px,
        .al-title-16px,
        .wch-btn-white,
        .wch-sm-btn-white,
        .wch-btn-skin,
        p,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        .mega-nav-title,
        .header-user-dropdown-name,
        .wch-benefit-title,
        .collection-card-title,
        .product-card-title,
        .category-card-title,
        .section-title,
        .banner-title {
            font-family: {{ $font_family['title_font_family'] }}  !important;
        }
    </style>
@endif



 @if (isset($body['color']) )
    <style>
        .single-rating-progress-wrap .count, .single-rating-progress-wrap .rating,
        .mage-nav-sublink,
        .section-sm-title,
        .footer-subtitle,
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
      
        .fsh-tab-pills{
            border-color: {{ $body['color'] }} !important;
        }
         /* .list_style */
    </style>
@endif

@if (isset($body['background-color'])  )
    <style>
        /* background color */
        .fsh-md-select,
        .fsh-form-textarea,
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
    </style>
@endif
@if (isset($body['section-background-color']))
    <style>
        /* background color */
        .testimonial-section,
        .featured-collection2-section {
             @if(Str::startsWith($body['section-background-color'], 'linear-gradient'))
                background-image: {{ $body['section-background-color'] }} !important;
            @else
                background: {{ $body['section-background-color'] }} !important;
            @endif
        }

    </style>
@endif
@if (isset($body['card-background-color']))
    <style>
        /* background color */
        .product-list-view,
        .category-card-body,
        .product-card {
            background-color: {{ $body['card-background-color'] }} !important;
        }

    </style>
@endif

@if (isset($page_title['background-color']))
    <style>
        .breadcrumb-area  {
            background: {{ $page_title['background-color'] }} ;
        }
    </style>
@endif
@if (isset($theme_button['background-color']) && isset($theme_button['color']) )
    <style>
        /* Normal Button */
       
        .wch-btn-skin {
            @if(Str::startsWith($theme_button['background-color'], 'linear-gradient'))
                background-image: {{ $theme_button['background-color'] }} !important;
            @else
                background: {{ $theme_button['background-color'] }} !important;
            @endif

            color: {{ $theme_button['color'] }} !important;
            transition: background 0.4s ease, color 0.4s ease !important;
        }

        /* Hover Button */
        /* .wch-sm-btn-white:hover ,
        .wch-sm-btn-black:hover,
        .wch-btn-white:hover,
        .wch-btn-skin:hover {
            @if(Str::startsWith($theme_button['hover-background-color'], 'linear-gradient'))
                background-image: {{ $theme_button['hover-background-color'] }} !important;
            @else
                background: {{ $theme_button['hover-background-color'] }} !important;
            @endif

            color: {{ $theme_button['hover-color'] }} !important;
        } */

        
    </style>
@endif
@if (isset($body['color']) )
    <style>
        /* background color */
        .text-muted,
        body {
            color: {{ $body['color'] }} !important;
        }
         .fsh-form-control,
         .fsh-form-textarea{
            border-color: {{ $body['color'] }} !important;
        }
    </style>
@endif

@if (isset($body['footer-background-color']))
    <style>
        /* background color */
        .category-card-iconbox,
        .brand-section,
        .wch-footer-section,
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