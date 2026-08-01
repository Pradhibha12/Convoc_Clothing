@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.car-light.general')
@include('layouts.themes.car-light.topbar')
@include('layouts.themes.car-light.header')
@include('layouts.themes.car-light.page_title')
@include('layouts.themes.car-light.primary_button')
@include('layouts.themes.car-light.secondary_button')
@include('layouts.themes.car-light.body')
@include('layouts.themes.car-light.filter')




