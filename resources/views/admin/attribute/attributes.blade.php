@extends('layouts.admin')
@push('title', get_phrase('Attributes'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body mb-1 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                

                <a href="{{ route('admin.attribute_types') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back to attribute types') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ol-card">
                <div class="ol-card-body p-3 mb-5">
                    <h6 class="title fs-14px mb-3">{{get_phrase('Attributes of ____', $attribute_type->name)}}</h6>

                    <div class="table-responsive overflow-auto">
                        <table class="table print-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ get_phrase('Attribute') }}</th>
                                    <th scope="col">{{ get_phrase('Options') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $key => $attribute)
                                    <tr>
                                        <th>
                                            {{ ++$key }}
                                        </th>
                                        <td>
                                            {{ $attribute->name }}
                                        </td>

                                        <td class="print-d-none">
                                            <a href="{{ route('admin.attributes', ['id' => $attribute_type->id, 'edit_id' => $attribute->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.attribute.delete', ['id' => $attribute->id, 'attribute_type_id' => $attribute_type->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ol-card p-4">
                <div class="ol-card-body">

                    @if(isset($_GET['edit_id']) && $_GET['edit_id'] > 0)
                        @php
                            $edited_attribute = App\Models\Attribute::where('id', $_GET['edit_id'])->firstOrNew();
                        @endphp
                        <form action="{{ route('admin.attribute.update', ['id' => $edited_attribute->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input name="attribute_type_id" type="hidden" value="{{$attribute_type->id}}">

                            <div class="mb-3">
                                <label for="name" class="form-label ol-form-label">{{get_phrase('Edit attribute')}}</label>
                                <input type="text" value="{{ $edited_attribute->name }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{get_phrase('Enter attribute name')}}"required>
                            </div>

                            @if($attribute_type->input_type == 'color')
                                <div class="mb-3">
                                    <label for="input_value" class="form-label ol-form-label">{{get_phrase('Input value')}}</label>
                                    <input type="{{$attribute_type->input_type}}" value="{{ $edited_attribute->input_value }}" name="input_value" class="form-control ol-form-control" id="input_value" placeholder="{{get_phrase('Enter input value')}}"required>
                                </div>
                            @else
                                <input type="hidden" name="input_value">
                            @endif


                            <div class="mb-2 d-flex align-items-center">
                                <button class="btn ol-btn-primary">{{get_phrase('Update')}}</button>
                                <a href="{{ route('admin.attributes', ['id' => $attribute_type->id]) }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                                    <span class="fi-rr-arrow-alt-left"></span>
                                    <span>{{ get_phrase('Back') }}</span>
                                </a>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('admin.attribute.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input name="attribute_type_id" type="hidden" value="{{$attribute_type->id}}">

                            <div class="mb-3">
                                <label for="name" class="form-label ol-form-label">{{get_phrase('Add new attribute of ____', $attribute_type->name)}}</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control ol-form-control" id="name" placeholder="{{get_phrase('Enter attribute name')}}"required>
                            </div>

                            @if($attribute_type->input_type == 'color')
                                <div class="mb-3">
                                    <label for="input_value" class="form-label ol-form-label">{{get_phrase('Input value')}}</label>
                                    <input type="{{$attribute_type->input_type}}" name="input_value" class="form-control ol-form-control" id="input_value" placeholder="{{get_phrase('Enter input value')}}"required>
                                </div>
                            @else
                                <input type="hidden" name="input_value">
                            @endif

                            <div class="mb-2">
                                <button class="btn ol-btn-primary">{{get_phrase('Add')}}</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
