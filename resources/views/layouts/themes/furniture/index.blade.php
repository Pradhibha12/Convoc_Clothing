@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.furniture.general')
@include('layouts.themes.furniture.topbar')
@include('layouts.themes.furniture.header')
@include('layouts.themes.furniture.page_title')
@include('layouts.themes.furniture.primary_button')
@include('layouts.themes.furniture.secondary_button')
@include('layouts.themes.furniture.body')
@include('layouts.themes.furniture.filter')