@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.watch.general')
@include('layouts.themes.watch.topbar')
@include('layouts.themes.watch.header')
@include('layouts.themes.watch.page_title')
@include('layouts.themes.watch.primary_button')
@include('layouts.themes.watch.secondary_button')
@include('layouts.themes.watch.body')
@include('layouts.themes.watch.filter')




