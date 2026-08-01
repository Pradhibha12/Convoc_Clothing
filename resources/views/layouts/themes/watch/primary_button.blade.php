@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp

@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        /* background color */
         .fsh-btn-dark:hover,
          .wch-sm-btn-black:hover,
        .fsh-sm3-btn-dark,
        .fsh-sm-btn-secondary.active, .fsh-sm-btn-secondary:hover,
        .fsh-btn-warning,
        .fsh-sm-btn-warning,
        .fsh-sm-btn-dark {
            background-color: {{ $primary_button['background-color'] }} !important;
            color: {{ $primary_button['color'] }} !important;
        }
    </style>
@endif