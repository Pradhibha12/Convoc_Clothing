@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.men-clothing.general')
@include('layouts.themes.men-clothing.topbar')
@include('layouts.themes.men-clothing.header')
@include('layouts.themes.men-clothing.page_title')
@include('layouts.themes.men-clothing.primary_button')
@include('layouts.themes.men-clothing.secondary_button')
@include('layouts.themes.men-clothing.body')
@include('layouts.themes.men-clothing.filter')




