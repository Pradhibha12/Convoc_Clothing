@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.sports.general')
@include('layouts.themes.sports.topbar')
@include('layouts.themes.sports.header')
@include('layouts.themes.sports.page_title')
@include('layouts.themes.sports.primary_button')
@include('layouts.themes.sports.secondary_button')
@include('layouts.themes.sports.body')
@include('layouts.themes.sports.filter')