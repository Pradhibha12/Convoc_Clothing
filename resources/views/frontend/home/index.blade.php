@extends('layouts.frontend')
@push('title', 'Home')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
    @php
        $active_theme = \App\Models\Theme::where('status', 1)->first();
    @endphp

    @include("components.{$active_theme->identifier}.home.index")
    
@endsection

@push('js')
@endpush
