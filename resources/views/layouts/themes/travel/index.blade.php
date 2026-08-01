@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.travel.general')
@include('layouts.themes.travel.topbar')
@include('layouts.themes.travel.header')
@include('layouts.themes.travel.page_title')
@include('layouts.themes.travel.primary_button')
@include('layouts.themes.travel.secondary_button')
@include('layouts.themes.travel.body')
@include('layouts.themes.travel.filter')