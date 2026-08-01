@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp

@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        /* background color */
        
        .item-content .tr-white-btn-small,
        .tr-white-btn-large,
        .sold-progress .proggress,
        .ca-btn-skin,
        .fsh-sm-btn-dark  {
            @if(Str::startsWith($primary_button['background-color'], 'linear-gradient'))
                background-image: {{ $primary_button['background-color'] }} !important;
            @else
                background: {{ $primary_button['background-color'] }} !important;
            @endif
            color: {{ $primary_button['color'] }} !important;
        }
    </style>
@endif