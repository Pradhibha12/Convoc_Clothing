@extends('layouts.admin')
@push('title', get_phrase('Footer Settings'))
@push('css')
<style>
    .table.ol-table td {
        vertical-align: middle !important;
        padding: 12px 12px !important;
    }
    .table.ol-table th {
        padding: 12px 12px !important;
    }
    .table.ol-table .form-control {
        height: 42px !important;
        font-size: 14px !important;
        border-radius: 8px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: none !important;
        background-color: #fff !important;
    }
    .table.ol-table .form-control:focus {
        border-color: #3b82f6 !important;
    }
</style>
@endpush

@section('content')
    <form action="{{ route('admin.footer.settings.update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="ol-card h-100">
                    <div class="ol-card-body p-4">
                        <h4 class="title fs-18px mb-3">{{ get_phrase('Footer Main Content') }}</h4>
                        
                        <div class="mb-3">
                            <label for="footer_about_text" class="form-label ol-form-label">{{ get_phrase('Footer About Description') }}</label>
                            <textarea name="footer_about_text" rows="5" class="form-control ol-form-control" id="footer_about_text" placeholder="{{ get_phrase('Write footer about text...') }}">{{ $footer_about_text }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="footer_copyright_text" class="form-label ol-form-label">{{ get_phrase('Copyright Notice') }}</label>
                            <textarea name="footer_copyright_text" rows="3" class="form-control ol-form-control" id="footer_copyright_text" placeholder="{{ get_phrase('Copyright text...') }}">{{ $footer_copyright_text }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="ol-card h-100">
                    <div class="ol-card-body p-4">
                        <h4 class="title fs-18px mb-3">{{ get_phrase('Footer Section Titles') }}</h4>
                        
                        <div class="mb-3">
                            <label for="footer_quick_links_title" class="form-label ol-form-label">{{ get_phrase('Quick Links Title') }}</label>
                            <input type="text" name="footer_quick_links_title" value="{{ $footer_quick_links_title }}" class="form-control ol-form-control" id="footer_quick_links_title">
                        </div>

                        <div class="mb-3">
                            <label for="footer_top_categories_title" class="form-label ol-form-label">{{ get_phrase('Top Categories Title') }}</label>
                            <input type="text" name="footer_top_categories_title" value="{{ $footer_top_categories_title }}" class="form-control ol-form-control" id="footer_top_categories_title">
                        </div>

                        <div class="mb-3">
                            <label for="footer_support_title" class="form-label ol-form-label">{{ get_phrase('Support Column Title') }}</label>
                            <input type="text" name="footer_support_title" value="{{ $footer_support_title }}" class="form-control ol-form-control" id="footer_support_title">
                        </div>

                        <div class="mb-3">
                            <label for="footer_contact_title" class="form-label ol-form-label">{{ get_phrase('Contact Column Title') }}</label>
                            <input type="text" name="footer_contact_title" value="{{ $footer_contact_title }}" class="form-control ol-form-control" id="footer_contact_title">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-6 mb-4">
                <div class="ol-card">
                    <div class="ol-card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="title fs-18px mb-0">{{ get_phrase('Quick Links Column') }}</h4>
                            <button type="button" class="btn btn-sm ol-btn-primary" onclick="addQuickLink()">+ {{ get_phrase('Add Link') }}</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table ol-table">
                                <thead>
                                    <tr>
                                        <th>{{ get_phrase('Title') }}</th>
                                        <th>{{ get_phrase('URL / Route') }}</th>
                                        <th style="width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="quick_links_container">
                                    @foreach ($quick_links as $index => $link)
                                        <tr>
                                            <td>
                                                <input type="text" name="quick_links[{{ $index }}][title]" value="{{ $link['title'] ?? '' }}" class="form-control ol-form-control" required>
                                            </td>
                                            <td>
                                                <input type="text" name="quick_links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" class="form-control ol-form-control" required>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="this.closest('tr').remove()"><i class="fi-rr-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="ol-card">
                    <div class="ol-card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="title fs-18px mb-0">{{ get_phrase('Support Links Column') }}</h4>
                            <button type="button" class="btn btn-sm ol-btn-primary" onclick="addSupportLink()">+ {{ get_phrase('Add Link') }}</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table ol-table">
                                <thead>
                                    <tr>
                                        <th>{{ get_phrase('Title') }}</th>
                                        <th>{{ get_phrase('URL / Route') }}</th>
                                        <th style="width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="support_links_container">
                                    @foreach ($support_links as $index => $link)
                                        <tr>
                                            <td>
                                                <input type="text" name="support_links[{{ $index }}][title]" value="{{ $link['title'] ?? '' }}" class="form-control ol-form-control" required>
                                            </td>
                                            <td>
                                                <input type="text" name="support_links[{{ $index }}][url]" value="{{ $link['url'] ?? '' }}" class="form-control ol-form-control" required>
                                            </td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="this.closest('tr').remove()"><i class="fi-rr-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn ol-btn-primary px-5">{{ get_phrase('Save Footer Settings') }}</button>
        </div>
    </form>
@endsection

@push('js')
<script>
    function addQuickLink() {
        const container = document.getElementById('quick_links_container');
        const idx = container.children.length;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" name="quick_links[${idx}][title]" class="form-control ol-form-control" required></td>
            <td><input type="text" name="quick_links[${idx}][url]" class="form-control ol-form-control" required></td>
            <td class="text-center align-middle"><button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="this.closest('tr').remove()"><i class="fi-rr-trash"></i></button></td>
        `;
        container.appendChild(tr);
    }

    function addSupportLink() {
        const container = document.getElementById('support_links_container');
        const idx = container.children.length;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><input type="text" name="support_links[${idx}][title]" class="form-control ol-form-control" required></td>
            <td><input type="text" name="support_links[${idx}][url]" class="form-control ol-form-control" required></td>
            <td class="text-center align-middle"><button type="button" class="btn btn-danger-light btn-icon btn-sm" onclick="this.closest('tr').remove()"><i class="fi-rr-trash"></i></button></td>
        `;
        container.appendChild(tr);
    }
</script>
@endpush
