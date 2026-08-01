@php
    $header = json_decode($active_theme->header, true);
@endphp

@if (isset($header['background-color']))
    <style>
        /* background color */
        .mc-header-section,
        .mi-header-section {
             @if(Str::startsWith($header['background-color'], 'linear-gradient'))
                background-image: {{ $header['background-color'] }} !important;
            @else
                background-color: {{ $header['background-color'] }} !important;
            @endif 
            
        }
       
    </style>
@endif