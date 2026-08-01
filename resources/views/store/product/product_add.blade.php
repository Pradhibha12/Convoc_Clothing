@extends('layouts.vendor')
@push('title', get_phrase('Product Add'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
<style>
    .h-45{
        height: 45px;
    }
</style>

    <div class="row mt-4">
        <div class="col-md-6">
            <ul class="nav nav-tabs nav-pills nav-shwitcher py-4 mb-4 border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-start px-5 active" id="quick-view-tab" data-bs-toggle="tab" data-bs-target="#quick-view" type="button" role="tab" aria-controls="quick-view" aria-selected="true">{{get_phrase('Quick View')}}</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-end px-5" id="detail-view-tab" data-bs-toggle="tab" data-bs-target="#detail-view" type="button" role="tab" aria-controls="detail-view" aria-selected="false">{{get_phrase('Detail View')}}</button>
                </li>
            </ul>
        </div>
        
        <div class="col-md-6 d-flex justify-content-end flex-wrap gap-2 ">
            <button onclick="document.querySelector('#product-add-tab-content .tab-pane.show form').submit();" type="button" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px h-45">{{ get_phrase('Add Product') }}</button>
             <a href="{{ session('product_add_referrer') ?? route('vendor.products') }}" class="btn ol-btn-outline-secondary h-45 d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
        </div>
    </div>

    <div class="tab-content" id="product-add-tab-content">
        <div class="tab-pane fade show active" id="quick-view" role="tabpanel" aria-labelledby="quick-view-tab">
            @include('store.product.product_add_quick')
        </div>
        <div class="tab-pane fade" id="detail-view" role="tabpanel" aria-labelledby="quick-view-tab">
            @include('store.product.product_add_detail')
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // Category change listener to reload attributes
            $('#category_id').on('change', function() {
                const catId = $(this).val() || '';
                
                // Reload attributes dropdown list
                load_view("{{ route('view', ['path' => 'store.product.attributes_dropdown_list']) }}?category_id=" + catId, "#attributes_dropdown_list");
                
                // Reload each appended attribute value checkboxes list with the new category ID
                $('.appended-attributes > div').each(function() {
                    const idAttr = $(this).attr('id');
                    const typeId = idAttr.replace('attribute_type_', '');
                    load_view("{{ route('view', ['path' => 'store.product.attribute_value_inputs']) }}?attribute_type_id=" + typeId + "&category_id=" + catId, "#" + idAttr + " .attribute-value-inputs");
                });
            });

            // Form Autosave Draft System
            const formId = 'add_product_detail_form';
            const storageKey = 'draft_' + formId;

            // Clear draft if navigating fresh, keep if reloading
            const navEntries = window.performance && window.performance.getEntriesByType && window.performance.getEntriesByType("navigation");
            const navType = (navEntries && navEntries[0]) ? navEntries[0].type : '';
            if (navType === 'navigate') {
                localStorage.removeItem(storageKey);
            }

            // Set ID on the detailed product form
            $('form[action*="detailed"]').attr('id', formId);

            function saveDraft() {
                const form = $('#' + formId);
                if (form.length === 0) return;
                if (form.data('submitted')) return;

                const draftData = {
                    title: form.find('input[name="title"]').val() || '',
                    code: form.find('input[name="code"]').val() || '',
                    price: form.find('input[name="price"]').val() || '',
                    discount_type: form.find('select[name="discount_type"]').val() || '',
                    discount_value: form.find('input[name="discount_value"]').val() || '',
                    discount_period: form.find('input[name="discount_period"]').val() || '',
                    discount_status: form.find('input[name="discount_status"]:checked').val() || '',
                    total_stock: form.find('input[name="total_stock"]').val() || '',
                    unit: form.find('select[name="unit"]').val() || '',
                    category_id: form.find('select[name="category_id"]').val() || '',
                    summary: form.find('textarea[name="summary"]').val() || '',
                    description: form.find('textarea[name="description"]').val() || '',
                    appended_attributes: []
                };

                const descTextarea = form.find('textarea[name="description"]');
                if (descTextarea.length > 0 && typeof descTextarea.summernote === 'function') {
                    draftData.description = descTextarea.summernote('code') || '';
                }

                $('.appended-attributes > div').each(function() {
                    const idAttr = $(this).attr('id');
                    const typeId = idAttr.replace('attribute_type_', '');
                    const label = $(this).find('label').first().text().trim();
                    
                    const checkedValues = {};
                    $(this).find('input[type="checkbox"]').each(function() {
                        const name = $(this).attr('name');
                        if (name) {
                            checkedValues[name] = $(this).prop('checked');
                        }
                    });

                    draftData.appended_attributes.push({
                        id: typeId,
                        name: label,
                        checkedValues: checkedValues
                    });
                });

                localStorage.setItem(storageKey, JSON.stringify(draftData));
            }

            function restoreDraft() {
                const form = $('#' + formId);
                if (form.length === 0) return;

                const rawData = localStorage.getItem(storageKey);
                if (!rawData) return;

                try {
                    const draftData = JSON.parse(rawData);

                    // Auto-delete corrupted drafts from previous sessions
                    if (draftData.appended_attributes && draftData.appended_attributes.some(attr => attr.name.includes("Select All"))) {
                        localStorage.removeItem(storageKey);
                        return;
                    }

                    if (draftData.title) form.find('input[name="title"]').val(draftData.title);
                    if (draftData.code) form.find('input[name="code"]').val(draftData.code);
                    if (draftData.price) form.find('input[name="price"]').val(draftData.price);
                    if (draftData.discount_type) {
                        form.find('select[name="discount_type"]').val(draftData.discount_type).trigger('change');
                    }
                    if (draftData.discount_value) form.find('input[name="discount_value"]').val(draftData.discount_value);
                    if (draftData.discount_period) form.find('input[name="discount_period"]').val(draftData.discount_period);
                    if (draftData.discount_status) {
                        form.find(`input[name="discount_status"][value="${draftData.discount_status}"]`).prop('checked', true);
                    }
                    if (draftData.total_stock) form.find('input[name="total_stock"]').val(draftData.total_stock);
                    if (draftData.unit) {
                        form.find('select[name="unit"]').val(draftData.unit).trigger('change');
                    }
                    if (draftData.summary) form.find('textarea[name="summary"]').val(draftData.summary);
                    
                    if (draftData.description) {
                        const descTextarea = form.find('textarea[name="description"]');
                        descTextarea.val(draftData.description);
                        if (typeof descTextarea.summernote === 'function') {
                            setTimeout(() => {
                                descTextarea.summernote('code', draftData.description);
                            }, 800);
                        }
                    }

                    if (draftData.category_id) {
                        const catSelect = form.find('select[name="category_id"]');
                        catSelect.val(draftData.category_id).trigger('change');

                        setTimeout(() => {
                            if (draftData.appended_attributes && draftData.appended_attributes.length > 0) {
                                draftData.appended_attributes.forEach(attr => {
                                    appendAttribute(attr.name, attr.id);
                                    
                                    let attempts = 0;
                                    const restoreCheckboxesInterval = setInterval(() => {
                                        let allRestored = true;
                                        for (const [name, checked] of Object.entries(attr.checkedValues)) {
                                            const cb = form.find(`input[name="${name}"]`);
                                            if (cb.length > 0) {
                                                if (cb.prop('checked') !== checked) {
                                                    cb.prop('checked', checked);
                                                    const card = cb.closest('.attribute-checkbox-card');
                                                    if (card.length > 0) {
                                                        if (checked) {
                                                            card.addClass('border-primary bg-primary-subtle');
                                                            card.css('border-color', '#3b82f6');
                                                            card.css('background-color', '#eff6ff');
                                                        } else {
                                                            card.removeClass('border-primary bg-primary-subtle');
                                                            card.css('border-color', '');
                                                            card.css('background-color', '');
                                                        }
                                                    }
                                                }
                                            } else {
                                                allRestored = false;
                                            }
                                        }
                                        attempts++;
                                        if (allRestored || attempts > 15) {
                                            clearInterval(restoreCheckboxesInterval);
                                        }
                                    }, 300);
                                });
                            }
                        }, 800);
                    }
                } catch (e) {
                    console.error("Failed to restore draft:", e);
                }
            }

            $('form[action*="detailed"]').on('submit', function() {
                $(this).data('submitted', true);
                localStorage.removeItem(storageKey);
            });

            setTimeout(restoreDraft, 500);
            setInterval(saveDraft, 2000);
        });

        function appendAttribute(attribute_name, attribute_type_id) {
            var attributeElem =
                `<div class="border-top" id="attribute_type_${attribute_type_id}">
                    <div class="mb-3">
                        <div class="d-flex align-items-center py-3">
                            <label for="extra_cost" class="form-label ol-form-label mb-0">${attribute_name}</label>
                            <button class="btn ol-btn-danger btn-icon ms-auto" onclick="$('#attribute_type_${attribute_type_id}').remove();" data-bs-toggle="tooltip" title="{{ get_phrase('Remove') }}"><i class="fi-rr-minus-small"></i></button>
                        </div>
                    </div>
                    <div class="mb-3 attribute-value-inputs"></div>
                </div>`;

            $('.appended-attributes').append(attributeElem);

            const catId = $('#category_id').val() || '';
            load_view("{{ route('view', ['path' => 'store.product.attribute_value_inputs']) }}?attribute_type_id=" + attribute_type_id + "&category_id=" + catId, "#attribute_type_" + attribute_type_id + " .attribute-value-inputs");
        }
    </script>
@endpush
