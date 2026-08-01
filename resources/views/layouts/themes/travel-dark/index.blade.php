@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.travel-dark.general')
@include('layouts.themes.travel-dark.topbar')
@include('layouts.themes.travel-dark.header')
@include('layouts.themes.travel-dark.page_title')
@include('layouts.themes.travel-dark.primary_button')
@include('layouts.themes.travel-dark.secondary_button')
@include('layouts.themes.travel-dark.body')
@include('layouts.themes.travel-dark.filter')




