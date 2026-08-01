@extends('layouts.admin')
@push('title', get_phrase('Product List'))
@push('meta')
@endpush
@push('css')
@endpush
@section('content')
<style>
    .download-btn {
	background: #f7f7f9;
    margin-right: 2px;
	border-radius: 6px;
	text-align: center;
	align-items: center;
	display: flex;
	justify-content: center;
	border: 1px solid #f7f7f9;
    visibility: hidden;
    opacity: 0;
    transition: .5s;
}
.action-label.btn:hover, .action-label.btn.active, .action-label.btn.show, .action-label.btn:active {
	background: #F5F9FF !important;
	color: #1B84FF !important;
	border: 1px solid #d7e2f0 !important;
  
}
.hidden-btn:hover .download-btn{
    visibility: visible;
    opacity: 1;
}
</style>
    <div class="ol-card">
        <div class="ol-card-body p-3 mb-5">
            <div class="row mb-4">
                <div class="col-lg-7 mb-2 d-flex flex-wrap align-items-center gap-3">
                     <a href="{{ route('admin.product.add') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Add new Product') }}</span>
                    </a>
                    <div class="custom-dropdown ms-2">
                        <button class="dropdown-header btn ol-btn-light"> 
                            {{ get_phrase('Export') }} 
                            <i class="fi-rr-file-export ms-2"></i>
                        </button>
                        <ul class="dropdown-list">
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="downloadPDF('.print-table', 'Product-list')"><i class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item export-btn" href="javascript:;" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="custom-dropdown dropdown-filter @if (!isset($_GET) || (isset($_GET) && count($_GET) == 0))  @endif">
                        <button class="dropdown-header btn ol-btn-light">
                            <i class="fi-rr-filter me-2"></i>
                            {{ get_phrase('Filter') }}

                        </button>
                        <ul class="dropdown-list w-250px">
                            <li>
                                <form id="filter-dropdown" action="{{ route('admin.products') }}" method="get">
                                    <input type="hidden" name="search" value="{{ request('search') }}">
                                    <div class="filter-option d-flex flex-column gap-3">
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Status') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="status" class="ol-select-2" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}
                                                </option>

                                                <option value="active"@if (request('status') == 'active') selected @endif>
                                                    {{ get_phrase('Active') }} </option>
                                                <option value="inactive"@if (request('status') == 'inactive') selected @endif>
                                                    {{ get_phrase('Inactive') }} </option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Category') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="category" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}</option>

                                                @foreach (App\Models\Category::orderBy('title', 'asc')->get() as $category)
                                                    <option value="{{ $category->slug }}" @if (request('category') == $category->slug) selected @endif>
                                                        {{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Store') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="store" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}</option>

                                                @foreach (App\Models\Store::orderBy('name', 'asc')->get() as $store)
                                                    <option value="{{ $store->slug }}" @if (request('store') == $store->slug) selected @endif>
                                                        {{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="eDataList" class="form-label ol-form-label">{{ get_phrase('Brand') }}</label>
                                            <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="brand" data-placeholder="Type to search...">
                                                <option value="all">{{ get_phrase('All') }}</option>

                                                @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                                                    <option value="{{ $brand->name }}" @if (request('brand') == $brand->name) selected @endif>
                                                        {{ $brand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="filter-button d-flex justify-content-end align-items-center mt-3">
                                        <button type="submit" class="ol-btn-primary">{{ get_phrase('Apply') }}</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>

                    @if (isset($_GET) && count($_GET) > 0)
                        <a href="{{ route('admin.products') }}" class="me-2" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-circle"></i></a>
                    @endif
                </div>
                <div class="col-lg-5 mb-2 mt-md-0 mt-3">
                    <form action="{{ route('admin.products') }}" method="get">

                        @php
                            $queries = request()->query();
                            unset($queries['search']);
                        @endphp
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-7 col-9">
                                <div class="search-input flex-grow-1">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search by product name') }}" class="ol-form-control form-control" />
                                </div>
                            </div>
                            <div class="col-lg-3 col-3">
                                <button type="submit" class="btn ol-btn-primary w-100" id="submit-button"><span class="fi-rr-search d-flex justify-content-center"></span></button>
                            </div>
                        </div>
                        @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                        @endforeach
                    </form>
                </div>
            </div>

            @if ($counted = $products->count() > 0)
               
                <div class="table-responsive overflow-auto">
                    <table class="table print-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ get_phrase('Product') }}</th>
                                <th scope="col">{{ get_phrase('Barcode') }}</th>
                                <th scope="col">{{ get_phrase('Category') }}</th>
                                <th scope="col">{{ get_phrase('Price') }}</th>
                                <th scope="col">{{ get_phrase('Status') }}</th>
                                <th scope="col">{{ get_phrase('Options') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                @php
                                    $thumbnails = json_decode($product->thumbnail, true);
                                    $firstImage = $thumbnails[0] ?? null;
                                @endphp

                                <tr class="hidden-btn">
                                    <th>
                                        {{ ++$key }}
                                    </th>
                                    <td width="320px">
                                        <div class="d-flex align-items-center min-w-200px" bis_skin_checked="1">
                                            <img class="image-40 radius-5px" width="40" height="40" src="{{ get_image($firstImage) }}">
                                            <div class="ms-2 mt-1" bis_skin_checked="1">
                                                <h4 class="title fs-14px">{{ $product->title }}</h4>
                                                <p class="sub-title2 text-12px ellipsis-line-2">{{ $product->summary }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @php
                                                $barcode_image = null;
                                                if (!empty($product?->code)) {
                                                    $barcode = new Milon\Barcode\DNS1D();
                                                    $barcode_image = $barcode->getBarcodePNG($product->code, 'C128');
                                                }
                                            @endphp
                                            <div>
                                                <img  src="data:image/png;base64,{{ $barcode_image }}" alt="Barcode" height="25px" width="135px">
                                                <p>{{ get_phrase('SN') }}: {{ $product?->code }}</p>
                                            </div>
                                            <div class="d-flex ">
                                                 <a href="javascript:void(0);" 
                                                    class="btn action-label download-btn"
                                                    onclick="downloadBarcode('{{ $barcode_image }}', '{{ $product->code }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Download') }}">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.92958 5.39042L4.92958 5.39041L4.92862 5.3905C3.61385 5.5146 2.6542 5.93651 2.02459 6.70783C1.39588 7.47804 1.10332 8.58816 1.10332 10.0736V10.1603C1.10332 11.8027 1.45436 12.987 2.22713 13.7598C2.99991 14.5326 4.18424 14.8836 5.82665 14.8836H10.1733C11.8157 14.8836 13 14.5326 13.7728 13.7615C14.5456 12.9904 14.8967 11.8094 14.8967 10.1736V10.0869C14.8967 8.59144 14.5991 7.4745 13.9602 6.70257C13.3204 5.92962 12.3457 5.5112 11.0111 5.39715C10.7022 5.36786 10.4461 5.59636 10.4169 5.89543C10.3874 6.19756 10.6157 6.46083 10.9151 6.49005L10.9158 6.4901C11.9763 6.57958 12.6917 6.86862 13.1444 7.43161C13.5984 7.99634 13.7967 8.84694 13.7967 10.0803V10.1669C13.7967 11.5202 13.5567 12.4212 12.9921 12.9858C12.4275 13.5504 11.5265 13.7903 10.1733 13.7903H5.82665C4.47345 13.7903 3.57245 13.5504 3.00784 12.9858C2.44324 12.4212 2.20332 11.5202 2.20332 10.1669V10.0803C2.20332 8.85356 2.39823 8.00609 2.84423 7.44127C3.28876 6.8783 3.99097 6.58615 5.03125 6.49007L5.03139 6.49006C5.33896 6.46076 5.5591 6.18959 5.52975 5.88876C5.50032 5.58704 5.22199 5.36849 4.92958 5.39042Z"
                                                            fill="#6D718C" stroke="#6D718C" stroke-width="0.1" />
                                                        <path d="M7.45 9.92028C7.45 10.2212 7.69905 10.4703 8 10.4703C8.30051 10.4703 8.55 10.2283 8.55 9.92028V1.33362C8.55 1.03267 8.30095 0.783618 8 0.783618C7.69905 0.783618 7.45 1.03267 7.45 1.33362V9.92028Z" fill="#6D718C" stroke="#6D718C"
                                                            stroke-width="0.1" />
                                                        <path
                                                            d="M7.61153 11.0556C7.7214 11.1655 7.86101 11.2169 8.00022 11.2169C8.13943 11.2169 8.27904 11.1655 8.38891 11.0556L10.6222 8.8223C10.8351 8.60944 10.8351 8.25778 10.6222 8.04492C10.4094 7.83206 10.0577 7.83206 9.84487 8.04492L8.00022 9.88957L6.15558 8.04492C5.94272 7.83206 5.59106 7.83206 5.3782 8.04492C5.16534 8.25778 5.16534 8.60944 5.3782 8.8223L7.61153 11.0556Z"
                                                            fill="#6D718C" stroke="#6D718C" stroke-width="0.1" />
                                                    </svg>
                                                </a>
                                                <a   onclick="downloadBarcodePDF('{{ $barcode_image }}', '{{ $product->code }}')" href="javascript:void(0)" class="btn action-label download-btn" data-bs-toggle="tooltip" title="{{ get_phrase('PDF Download') }}">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.1666 5.16666H4.83325C4.55992 5.16666 4.33325 4.94 4.33325 4.66666V3.33333C4.33325 1.62666 5.12659 0.833328 6.83325 0.833328H9.16659C10.8733 0.833328 11.6666 1.62666 11.6666 3.33333V4.66666C11.6666 4.94 11.4399 5.16666 11.1666 5.16666ZM5.33325 4.16666H10.6666V3.33333C10.6666 2.19999 10.2999 1.83333 9.16659 1.83333H6.83325C5.69992 1.83333 5.33325 2.19999 5.33325 3.33333V4.16666Z"
                                                            fill="#6D718C" />
                                                        <path
                                                            d="M8.66659 15.1667H7.33325C5.71992 15.1667 4.83325 14.28 4.83325 12.6667V10C4.83325 9.72667 5.05992 9.5 5.33325 9.5H10.6666C10.9399 9.5 11.1666 9.72667 11.1666 10V12.6667C11.1666 14.28 10.2799 15.1667 8.66659 15.1667ZM5.83325 10.5V12.6667C5.83325 13.72 6.27992 14.1667 7.33325 14.1667H8.66659C9.71992 14.1667 10.1666 13.72 10.1666 12.6667V10.5H5.83325Z"
                                                            fill="#6D718C" />
                                                        <path
                                                            d="M12 12.5H10.6667C10.3933 12.5 10.1667 12.2733 10.1667 12V10.5H5.83333V12C5.83333 12.2733 5.60667 12.5 5.33333 12.5H4C2.38667 12.5 1.5 11.6133 1.5 10V6.66667C1.5 5.05334 2.38667 4.16667 4 4.16667H12C13.6133 4.16667 14.5 5.05334 14.5 6.66667V10C14.5 11.6133 13.6133 12.5 12 12.5ZM11.1667 11.5H12C13.0533 11.5 13.5 11.0533 13.5 10V6.66667C13.5 5.61334 13.0533 5.16667 12 5.16667H4C2.94667 5.16667 2.5 5.61334 2.5 6.66667V10C2.5 11.0533 2.94667 11.5 4 11.5H4.83333V10C4.83333 9.72667 5.06 9.5 5.33333 9.5H10.6667C10.94 9.5 11.1667 9.72667 11.1667 10V11.5Z"
                                                            fill="#6D718C" />
                                                        <path d="M11.3334 10.5H4.66675C4.39341 10.5 4.16675 10.2733 4.16675 10C4.16675 9.72667 4.39341 9.5 4.66675 9.5H11.3334C11.6067 9.5 11.8334 9.72667 11.8334 10C11.8334 10.2733 11.6067 10.5 11.3334 10.5Z" fill="#6D718C" />
                                                        <path d="M6.66675 7.83333H4.66675C4.39341 7.83333 4.16675 7.60666 4.16675 7.33333C4.16675 7.05999 4.39341 6.83333 4.66675 6.83333H6.66675C6.94008 6.83333 7.16675 7.05999 7.16675 7.33333C7.16675 7.60666 6.94008 7.83333 6.66675 7.83333Z"
                                                            fill="#6D718C" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $product->category?->title ?? '-' }}
                                    </td>
                                    {{-- <td>
                                        @if ($product->is_discounted)
                                            @if ($product->discount->discount_type == 'flat')
                                                <del>{{ currency($product->price) }}</del>
                                                {{ currency($product->price - $product->discount_value) }}
                                            @else
                                                @php $discount_amount = ($product->price * ($product->discount_value / 100)); @endphp
                                                <del>{{ currency($product->price) }}</del>
                                                {{ currency($product->price - $discount_amount) }}
                                            @endif
                                        @else
                                            {{ currency($product->price) }}
                                        @endif
                                    </td> --}}
                                     <td>
                                        @if ($product->is_discounted()->exists())
                                            @if ($product->is_discounted->discount_type == 'flat')
                                                <del>{{ currency($product->price) }}</del>
                                                {{ currency($product->price - $product->is_discounted->discount_value) }}
                                            @else
                                                @php
                                                    $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                                @endphp
                                                <del>{{ currency($product->price) }}</del>
                                                {{ currency($product->price - $discount_amount) }}
                                            @endif
                                        @else
                                            {{ currency($product->price) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->status == 1)
                                            <span class="badge bg-success">{{ get_phrase('Active') }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ get_phrase('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="print-d-none d-flex flex-wrap align-items-center gap-2 row-gap-2">
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" data-bs-toggle="tooltip" title="{{ get_phrase('Edit') }}" class="btn btn-primary-light btn-icon"><i class="fi-rr-pencil"></i></a>
                                            <a href="#" onclick="confirmModal('{{ route('admin.product.delete', ['id' => $product->id]) }}')" data-bs-toggle="tooltip" title="{{ get_phrase('Delete') }}" class="btn btn-danger-light btn-icon"><i class="fi-rr-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                 <div class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap mb-2">
                    <p class="admin-tInfo">
                        {{ get_phrase('Showing') . ' ' . count($products) . ' ' . get_phrase('of') . ' ' . $products->total() . ' ' . get_phrase('data') }}
                    </p>
                </div>
                <!-- Data info and Pagination -->
                @if ($counted > 0)
                    <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                @include('admin.data_not_found')
            @endif
        </div>
    </div>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('assets/global/jquery-3.7.1/jspdf.umd.min.js') }}"></script>
    <script>
        async function downloadBarcodePDF(base64Image, code) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Barcode dimensions
        const barcodeWidth = 60;  
        const barcodeHeight = 15; 

        // Page width 
        const pageWidth = doc.internal.pageSize.getWidth();
        const xPosition = (pageWidth - barcodeWidth) / 2; 
        const yPosition = 30; 
        doc.addImage(`data:image/png;base64,${base64Image}`, 'PNG', xPosition, yPosition, barcodeWidth, barcodeHeight);

        doc.text(`SN: ${code}`, pageWidth / 2, yPosition + barcodeHeight + 10, { align: 'center' });
        // Download as PDF
        doc.save(`barcode_${code}.pdf`);
    }

    
        function downloadBarcode(base64Image, code) {
            const link = document.createElement('a');
            link.href = `data:image/png;base64,${base64Image}`;
            link.download = `barcode_${code}.png`;
            link.click();
        }
    </script>
@endpush
