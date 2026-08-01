@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.drinks.general')
@include('layouts.themes.drinks.topbar')
@include('layouts.themes.drinks.header')
@include('layouts.themes.drinks.page_title')
@include('layouts.themes.drinks.primary_button')
@include('layouts.themes.drinks.secondary_button')
@include('layouts.themes.drinks.body')
@include('layouts.themes.drinks.filter')