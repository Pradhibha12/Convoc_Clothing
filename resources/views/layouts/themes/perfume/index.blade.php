@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.perfume.general')
@include('layouts.themes.perfume.topbar')
@include('layouts.themes.perfume.header')
@include('layouts.themes.perfume.page_title')
@include('layouts.themes.perfume.primary_button')
@include('layouts.themes.perfume.secondary_button')
@include('layouts.themes.perfume.body')
@include('layouts.themes.perfume.filter')




