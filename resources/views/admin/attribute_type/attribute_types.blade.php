@extends('layouts.admin')
@push('title', get_phrase('Attribute Types'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card">
        
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4">
                <div class="col-6 d-flex align-items-center gap-3">
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> {{get_phrase('Export')}} <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Attribute-list')"><i class="fi-rr-file-pdf"></i> {{get_phrase('PDF')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{get_phrase('Print')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end">
                    <a href="{{ route('admin.attribute_type.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new attribute type') }}</span>
                    </a>
                </div>
            </div>

            <div class="table-responsive overflow-auto">
                <table class="table print-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ get_phrase('Attribute Type') }}</th>
                            <th scope="col">{{ get_phrase('Attributes') }}</th>
                            <th scope="col">{{ get_phrase('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attribute_types as $key => $attribute_type)
                            <tr>
                                <th>
                                    {{ ++$key }}
                                </th>
                                <td width="200px">
                                    {{ $attribute_type->name }}
                                </td>

                                <td>
                                    @foreach ($attribute_type->attributes as $key => $attribute)
                                        @if($key > 0), @endif <span>{{$attribute->name}}</span>
                                    @endforeach
                                </td>
                                
                                <td class="print-d-none">
                                    <a href="{{ route('admin.attributes', ['id' => $attribute_type->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Manage Attributs') }}" class="btn btn-success-light btn-icon"><i class="fi-rr-id-badge"></i></a>
                                    <a href="{{ route('admin.attribute_type.edit', ['id' => $attribute_type->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                    <a href="javascript:;" onclick="confirmModal('{{ route('admin.attribute_type.delete', ['id' => $attribute_type->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
