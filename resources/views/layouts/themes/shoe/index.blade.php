@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.shoe.general')
@include('layouts.themes.shoe.topbar')
@include('layouts.themes.shoe.header')
@include('layouts.themes.shoe.page_title')
@include('layouts.themes.shoe.primary_button')
@include('layouts.themes.shoe.secondary_button')
@include('layouts.themes.shoe.body')
@include('layouts.themes.shoe.filter')