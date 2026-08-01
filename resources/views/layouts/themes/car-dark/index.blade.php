@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.car-dark.general')
@include('layouts.themes.car-dark.topbar')
@include('layouts.themes.car-dark.header')
@include('layouts.themes.car-dark.page_title')
@include('layouts.themes.car-dark.primary_button')
@include('layouts.themes.car-dark.secondary_button')
@include('layouts.themes.car-dark.body')
@include('layouts.themes.car-dark.filter')




