{{-- @extends('layouts.frontend')
@push('title', get_phrase('Home'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    @php
        $themes = App\Models\Theme::where('id', $page_id)->firstOrNew();
    @endphp
     @php $builder_files = $themes->html ? json_decode($themes->html, true) : []; @endphp
    @foreach ($builder_files as $builder_file_name)
          @include('components.home_made_by_builder.'.$themes->identifier.'.'.$builder_file_name)
    @endforeach
@endsection --}}



@extends('layouts.frontend')

@section('is_preview', true)

@section('content')
    @php
        $themes = App\Models\Theme::where('id', $page_id)->firstOrNew();
        $builder_files = $themes->html ? json_decode($themes->html, true) : [];
    @endphp

    @foreach ($builder_files as $builder_file_name)
        @include('components.home_made_by_builder.' . $themes->identifier . '.' . $builder_file_name)
    @endforeach
@endsection
