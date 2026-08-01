@php
    $topbar = json_decode($active_theme->topbar, true);
@endphp



{{-- Topbar Start --}}
@if (isset($topbar['background-color']))
    <style>
        /* background color */
        .header-top-section .nice-select .list,
         .signup-header-section,
        .header-top-section {
           @if(Str::startsWith($topbar['background-color'], 'linear-gradient'))
                background-image: {{ $topbar['background-color'] }};
            @else
                background: {{ $topbar['background-color'] }} !important;
            @endif
        }

    </style>
@endif

@if (isset($topbar['color']))
    <style>
        .header-top-section .mail-and-number a,
        .header-top-section .nice-select,
        .header-top-section .selected-show {
            color: {{ $topbar['color'] }};
        }

        .header-top-section .nice-select:after,
        .header-top-section .selected-show:after {
            border-color: {{ $topbar['color'] }};
        }
    </style>
@endif

@if (isset($topbar['hover_color']))
    <style>
        .header-top-section .mail-and-number a:hover,
        .header-top-section .nice-select:hover,
        .header-top-section .selected-show:hover
        {
        color: {{ $topbar['hover_color'] }} !important;
        }

        .header-top-section .nice-select:hover:after,
        .header-top-section .selected-show:hover:after {
            border-color: {{ $topbar['hover_color'] }} !important;
        }
    </style>
@endif 
{{-- Topbar End --}}
