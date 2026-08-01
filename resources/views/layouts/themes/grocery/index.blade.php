@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.grocery.general')
@include('layouts.themes.grocery.topbar')
@include('layouts.themes.grocery.header')
@include('layouts.themes.grocery.page_title')
@include('layouts.themes.grocery.primary_button')
@include('layouts.themes.grocery.secondary_button')
@include('layouts.themes.grocery.body')
@include('layouts.themes.grocery.filter')