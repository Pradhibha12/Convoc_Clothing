@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.baby.general')
@include('layouts.themes.baby.topbar')
@include('layouts.themes.baby.header')
@include('layouts.themes.baby.page_title')
@include('layouts.themes.baby.primary_button')
@include('layouts.themes.baby.secondary_button')
@include('layouts.themes.baby.body')
@include('layouts.themes.baby.filter')




