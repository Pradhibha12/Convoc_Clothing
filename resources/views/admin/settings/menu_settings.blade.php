@extends('layouts.admin')
@push('title', get_phrase('Header Menu Settings'))
@push('css')
<style>
    #menu_items_table td {
        vertical-align: middle !important;
        padding: 12px 12px !important;
    }
    #menu_items_table th {
        padding: 12px 12px !important;
    }
    #menu_items_table .form-control,
    #menu_items_table .form-select {
        height: 42px !important;
        font-size: 14px !important;
        border-radius: 8px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: none !important;
        background-color: #fff !important;
    }
    #menu_items_table .form-control:focus,
    #menu_items_table .form-select:focus {
        border-color: #3b82f6 !important;
    }
</style>
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ol-card mb-4">
                <div class="ol-card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h4 class="title fs-18px mb-1">{{ get_phrase('Header Navigation Menu Manager') }}</h4>
                            <p class="text-muted fs-14px mb-0">{{ get_phrase('Customize and reorder your main navigation header links.') }}</p>
                        </div>
                        <button type="button" class="btn ol-btn-primary d-flex align-items-center gap-2" onclick="addMenuItem()">
                            <i class="fi-rr-plus"></i> {{ get_phrase('Add Menu Item') }}
                        </button>
                    </div>

                    <form action="{{ route('admin.menu.settings.update') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table ol-table" id="menu_items_table">
                                <thead>
                                    <tr>
                                        <th style="width: 40px;">#</th>
                                        <th>{{ get_phrase('Menu Label') }}</th>
                                        <th>{{ get_phrase('Link / URL') }}</th>
                                        <th>{{ get_phrase('Type') }}</th>
                                        <th>{{ get_phrase('Target') }}</th>
                                        <th style="width: 80px;" class="text-center">{{ get_phrase('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="menu_items_container">
                                    @foreach ($menu_items as $index => $item)
                                        <tr class="menu-item-row">
                                            <td class="align-middle text-muted fw-bold row-number">{{ $index + 1 }}</td>
                                            <td>
                                                <input type="text" name="items[{{ $index }}][title]" value="{{ $item['title'] ?? '' }}" class="form-control ol-form-control" placeholder="{{ get_phrase('e.g. Home, Store') }}" required>
                                            </td>
                                            <td>
                                                <input type="text" name="items[{{ $index }}][url]" value="{{ $item['url'] ?? '' }}" class="form-control ol-form-control" placeholder="{{ get_phrase('e.g. /store or https://...') }}">
                                            </td>
                                            <td>
                                                <select name="items[{{ $index }}][type]" class="form-select ol-form-control">
                                                    <option value="custom" @if(($item['type'] ?? '') == 'custom') selected @endif>{{ get_phrase('Custom Link') }}</option>
                                                    <option value="route" @if(($item['type'] ?? '') == 'route') selected @endif>{{ get_phrase('Page Route') }}</option>
                                                    <option value="category_dropdown" @if(($item['type'] ?? '') == 'category_dropdown') selected @endif>{{ get_phrase('Categories Dropdown Mega Menu') }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="items[{{ $index }}][target]" class="form-select ol-form-control">
                                                    <option value="_self" @if(($item['target'] ?? '') == '_self') selected @endif>{{ get_phrase('Same Window (_self)') }}</option>
                                                    <option value="_blank" @if(($item['target'] ?? '') == '_blank') selected @endif>{{ get_phrase('New Tab (_blank)') }}</option>
                                                </select>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="removeMenuItem(this)" title="{{ get_phrase('Remove Item') }}">
                                                    <i class="fi-rr-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn ol-btn-primary px-4">{{ get_phrase('Save Menu Items') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    function addMenuItem() {
        const container = document.getElementById('menu_items_container');
        const rowCount = container.children.length;
        const tr = document.createElement('tr');
        tr.className = 'menu-item-row';
        tr.innerHTML = `
            <td class="align-middle text-muted fw-bold row-number">${rowCount + 1}</td>
            <td>
                <input type="text" name="items[${rowCount}][title]" class="form-control ol-form-control" placeholder="{{ get_phrase('e.g. New Page') }}" required>
            </td>
            <td>
                <input type="text" name="items[${rowCount}][url]" class="form-control ol-form-control" placeholder="{{ get_phrase('e.g. /new-page') }}">
            </td>
            <td>
                <select name="items[${rowCount}][type]" class="form-select ol-form-control">
                    <option value="custom">{{ get_phrase('Custom Link') }}</option>
                    <option value="route">{{ get_phrase('Page Route') }}</option>
                    <option value="category_dropdown">{{ get_phrase('Categories Dropdown Mega Menu') }}</option>
                </select>
            </td>
            <td>
                <select name="items[${rowCount}][target]" class="form-select ol-form-control">
                    <option value="_self">{{ get_phrase('Same Window (_self)') }}</option>
                    <option value="_blank">{{ get_phrase('New Tab (_blank)') }}</option>
                </select>
            </td>
            <td class="text-center align-middle">
                <button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="removeMenuItem(this)">
                    <i class="fi-rr-trash"></i>
                </button>
            </td>
        `;
        container.appendChild(tr);
        updateRowNumbers();
    }

    function removeMenuItem(btn) {
        const row = btn.closest('tr');
        row.remove();
        updateRowNumbers();
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll('#menu_items_container tr');
        rows.forEach((row, idx) => {
            row.querySelector('.row-number').innerText = idx + 1;
            const inputs = row.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.name = input.name.replace(/items\[\d+\]/, `items[${idx}]`);
            });
        });
    }
</script>
@endpush
