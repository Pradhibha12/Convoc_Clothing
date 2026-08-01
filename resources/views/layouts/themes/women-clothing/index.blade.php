@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.women-clothing.general')
@include('layouts.themes.women-clothing.topbar')
@include('layouts.themes.women-clothing.header')
@include('layouts.themes.women-clothing.page_title')
@include('layouts.themes.women-clothing.primary_button')
@include('layouts.themes.women-clothing.secondary_button')
@include('layouts.themes.women-clothing.body')
@include('layouts.themes.women-clothing.filter')




