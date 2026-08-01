@php
    $topbar = json_decode($active_theme->topbar, true);
@endphp



{{-- Topbar Start --}}
@if (isset($topbar['background-color']))
    <style>
        /* background color */
        .top-header-section,
        .header-top-section {
            background-color: {{ $topbar['background-color'] }} !important;
        }

        .header-top-section .nice-select .list {
            background-color: {{ $topbar['background-color'] }} !important;
        }
    </style>
@endif

@if (isset($topbar['color']))
    <style>
        .white-borderless-select,
        .al-subtitle-14px,
        .header-top-section .mail-and-number a,
        .header-top-section .nice-select,
        .header-top-section .selected-show {
            color: {{ $topbar['color'] }} !important;
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
