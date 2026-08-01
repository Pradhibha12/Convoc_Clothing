@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.coffee.general')
@include('layouts.themes.coffee.topbar')
@include('layouts.themes.coffee.header')
@include('layouts.themes.coffee.page_title')
@include('layouts.themes.coffee.primary_button')
@include('layouts.themes.coffee.secondary_button')
@include('layouts.themes.coffee.body')
@include('layouts.themes.coffee.filter')




