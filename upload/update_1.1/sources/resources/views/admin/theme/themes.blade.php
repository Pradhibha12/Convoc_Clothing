@extends('layouts.admin')
@push('title', get_phrase('Theme List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')

    <div class="ol-card">
        
        <div class="ol-card-body p-3 mb-5">
           

            <style>
                .eSwitches .form-switch input.form-check-input.form-switch-medium {
                    height: 16px;
                }

                .form-switch .form-check-input {
                    background-color: #ecf2ff;
                    box-shadow: none !important;
                    cursor: pointer;
                }

                .form-check-input:checked {
                    background-color: #1b84ff !important;
                    border-color: #1b84ff !important;
                }

            </style>

            @if ($counted = $themes->count() > 0)
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Theme') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            @foreach ($themes as $key => $theme)
                                <tr>
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td>
                                        <h3 class="title text-14px my-2">{{ $theme->title }}</h3>
                                    </td>
                                    <td>
                                       <div class="d-flex align-items-center">

                                            <div class="eSwitches">
                                                <div class="form-check form-switch">
                                                    <input
                                                        onchange="silentAction('{{ route('admin.theme.status', ['id' => $theme->id]) }}'); themeSwitcher(this);"
                                                        class="form-check-input form-switch-medium no-disabled" name="home_page" type="checkbox" @if ($theme->status == 1) checked disabled @endif>
                                                </div>
                                            </div>
                                           @if ($theme->status == 1)
                                            <a href="{{route('home')}}" class="btn ol-btn-outline-secondary ol-btn-sm" target="_blank">{{ get_phrase('Preview') }}</a>
                                            @endif
                                       </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.theme.edit', ['id' => $theme->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                        
                                        <a href="{{ route('admin.page.layout.edit', ['id' => $theme->id]) }}" target="_blank" data-bs-toggle="tooltip" title="{{ get_phrase('Edit Layout') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $themes->links() }}
                    </div>
                @endif
            @else
                {{-- @include('admin.no_data') --}}
            @endif
        </div>
    </div>
@endsection
@push('js')
    <script>
        "use strict";

        function themeSwitcher(elem){
            $('.form-switch-medium').not(elem).prop('disabled', false);
            $('.form-switch-medium').not(elem).prop('checked', false);

            setTimeout(() => {
                $(elem).prop('checked', true);
                $(elem).prop('disabled', true); 
                 success('Theme activated successfully');
                  location.reload();

            }, 200);
        }
    </script>
@endpush
