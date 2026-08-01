@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.pet.general')
@include('layouts.themes.pet.topbar')
@include('layouts.themes.pet.header')
@include('layouts.themes.pet.page_title')
@include('layouts.themes.pet.primary_button')
@include('layouts.themes.pet.secondary_button')
@include('layouts.themes.pet.body')
@include('layouts.themes.pet.filter')