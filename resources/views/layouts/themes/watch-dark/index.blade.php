@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.watch-dark.general')
@include('layouts.themes.watch-dark.topbar')
@include('layouts.themes.watch-dark.header')
@include('layouts.themes.watch-dark.page_title')
@include('layouts.themes.watch-dark.primary_button')
@include('layouts.themes.watch-dark.secondary_button')
@include('layouts.themes.watch-dark.body')
@include('layouts.themes.watch-dark.filter')




