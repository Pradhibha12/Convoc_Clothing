@php
    $primary_button = json_decode($active_theme->primary_button, true);
@endphp

@if (isset($primary_button['background-color']) && isset($primary_button['color']))
    <style>
        
    </style>
@endif