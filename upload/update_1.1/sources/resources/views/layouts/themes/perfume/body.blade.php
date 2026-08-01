@php
    $body = json_decode($active_theme->body, true);
    $font_family = json_decode($active_theme->general, true);
    $page_title = json_decode($active_theme->page_title, true);
    $theme_button = json_decode($active_theme->theme_button, true);
   
    
@endphp
@if (isset($font_family['font_family']))
    <style>
        p,
        body {
            font-family: {{ $font_family['font_family'] }} !important;
        }
        .mega-nav-title,
        .fsh-breadcrumb .breadcrumb-item.active,
        .al-title-42px,
        .footer-nav-title,
        .seasonal-product-title,
        .testimonial-comment,
        .alert-signup-btn,
        .pf-benefit-title,
        .product-card-title,
        .pf-category-link,
        .section-title,
        .product-served-badge-title,
        .pf-banner-title {
            font-family: {{ $font_family['title_font_family'] }}  !important;
        }
    </style>
@endif




@if (isset($body['color']) )

    <style>
         .ol-btn-secondary, 
        .text-muted,
        .fsh-form-textarea:focus,
        .fsh-breadcrumb .breadcrumb-item + .breadcrumb-item.active::before,
        .offcanvas-header .btn-close,
        .form-check-label,
        fsh-form-control,
        .al-title-14px,
        .fsh-form-label,
        .header-login-modal .modal-header .btn-close,
        .text-dark,
        .form-checkbox2-label,
        .fsh-form-control,
        .al-title-20px,
         .up-breadcrumb-item:hover, .up-breadcrumb-item.active,
        .up-breadcrumb-item + .up-breadcrumb-item::before,
        .text-white-color,
        .etable .table > :not(caption) > * > *,
        .title.text-18px.mb-2.text-dark,
        .category-nav-link:hover,

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
        .more-comment-btn,
        body {
            color: {{ $body['color'] }} !important;
        }
        .product-remove2-btn span svg path,
        .bordered-circle-iconlink svg path,
        /* .circle-iconbox-42px svg path, */
        .circle-iconbox-48px svg path{
            fill: {{ $body['color'] }} !important;
        }
        .form-checkbox-input:checked,
        .fsh-tab-pills{
            border-color: {{ $body['color'] }} !important;
        }
         .list_style{
        font-size: 20px;
    } 
      .fsh-form-control,
         .fsh-form-textarea{
            border-color: {{ $body['color'] }} !important;
        }
        .fsh-tab-link::after{
            background-color: {{ $body['color'] }} !important;
         }
         .recap .filter-nav-link  svg path,
         .wishItem-card .product-remove2-btn:hover svg path{
            fill: {{ $body['color'] }} !important;
         }
        /* Font Color */
    </style>
@endif
@if (isset($body['background-color']) )
    <style>
        .filter-offcanvas.offcanvas-lg.offcanvas-start,
         .modal-footer .ol-btn-secondary,
        .ec-product-banner-slide .item,
        #confirmModal .modal-content,
        .fsh-form-textarea,
         .gray-card-sidebar,
         .etable .table > :not(caption) > * > *,
        /* .offcanvas-header .btn-close, */
        .offcanvas.offcanvas-end,
        .fsh-form-control,
        .header-login-modal .modal-body,
        .quick-view-modal .modal-content,
        body {
            background: {{ $body['background-color'] }} !important;
        }
        .header-login-modal .modal-body{
            border-radius: 12px;
        }
          .wishItem-card .product-remove2-btn svg path{
            fill: {{ $body['background-color'] }} !important;,
          
         }
    </style>
@endif


@if (isset($body['section-background-color']))
    <style>
        /* background color */
        .featured-collection2-section {
            @if(Str::startsWith($body['section-background-color'], 'linear-gradient'))
                background-image: {{ $body['section-background-color'] }} !important;
            @else
                background: {{ $body['section-background-color'] }} !important;
            @endif
        }
         /* background color */

    </style>
@endif
@if (isset($body['card-background-color']))
    <style>
        /* background color */
        .product-list-view,
        .category-card-body,
        .product-card {
            background: {{ $body['card-background-color'] }} !important;
        }
     /* background color */
    </style>
@endif

@if (isset($theme_button['background-color']) && isset($theme_button['color']) && isset($theme_button['hover-background-color']) && isset($theme_button['hover-color']) )
    <style>
        /* Normal Button */
        .sm-btn-outline-white,
        .pf-btn-outline-white {
            @if(Str::startsWith($theme_button['background-color'], 'linear-gradient'))
                background-image: {{ $theme_button['background-color'] }} !important;
            @else
                background: {{ $theme_button['background-color'] }} !important;
            @endif

            color: {{ $theme_button['color'] }} !important;
            transition: background 0.4s ease, color 0.4s ease !important;
        }
        /* Color */
        
        
    </style>
@endif

@if (isset($page_title['background-color']) )
    <style>
        /* .fsh-tab-link::after, */
        .product-additional-info,
        .breadcrumb-area ,
        .gray-card-sidebar,
        .page-title-section {
            background-color: {{ $page_title['background-color'] }} !important;
        }
</style>
@endif

@if (isset($body['footer-background-color']))
    <style>
        /* background color */
         
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