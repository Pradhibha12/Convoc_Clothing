@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.fitness.general')
@include('layouts.themes.fitness.topbar')
@include('layouts.themes.fitness.header')
@include('layouts.themes.fitness.page_title')
@include('layouts.themes.fitness.primary_button')
@include('layouts.themes.fitness.secondary_button')
@include('layouts.themes.fitness.body')
@include('layouts.themes.fitness.filter')