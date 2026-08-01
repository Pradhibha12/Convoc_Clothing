@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp

@include('layouts.themes.fashion.general')
@include('layouts.themes.fashion.topbar')
@include('layouts.themes.fashion.header')
@include('layouts.themes.fashion.page_title')
@include('layouts.themes.fashion.primary_button')
@include('layouts.themes.fashion.secondary_button')
@include('layouts.themes.fashion.body')
@include('layouts.themes.fashion.filter')