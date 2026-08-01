@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.bags.general')
@include('layouts.themes.bags.topbar')
@include('layouts.themes.bags.header')
@include('layouts.themes.bags.page_title')
@include('layouts.themes.bags.primary_button')
@include('layouts.themes.bags.secondary_button')
@include('layouts.themes.bags.body')
@include('layouts.themes.bags.filter')