@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
@endphp


@include('layouts.themes.music.general')
@include('layouts.themes.music.topbar')
@include('layouts.themes.music.header')
@include('layouts.themes.music.page_title')
@include('layouts.themes.music.primary_button')
@include('layouts.themes.music.secondary_button')
@include('layouts.themes.music.body')
@include('layouts.themes.music.filter')




