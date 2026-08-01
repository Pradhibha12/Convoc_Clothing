


@php
    $header_category = [];
    $list_categories = []; 

    if ($selected_category->id == '') {
        $list_categories = App\Models\Category::where('parent_id', 0)->get();
    } elseif ($selected_category->childs->count() > 0) {
        $header_category = $selected_category;
        $list_categories = $selected_category->childs;
        
    } else {
        $header_category = $selected_category->parent;
        $list_categories = $selected_category->parent->childs;
       
    }
   

    if(request()->query('price')){
        $queryPriceArr = explode(',', request()->query('price'));
        $selected_min_price = $queryPriceArr[0];
        $selected_max_price = $queryPriceArr[1];
    }
    $product_max_price = round(App\Models\Product::where('status', 1)->max('price'));
    $product_min_price = round(App\Models\Product::where('status', 1)->min('price'));
@endphp

<style>
    .nMaxIcon {
	width: 120px;
	justify-content: space-between;
	border: 1px solid #D9D9DF;
	padding: 6px 12px;
	border-radius: 6px;
	margin-bottom: 20px;
	font-size: 14px;
	font-weight: 500;
    height: 40px;
}
 .nMaxIcon a i{
    font-size: 20px;
 }
 li:not(:last-child):has(.category-nav-link) {
	margin-bottom: 25px;
}
.mb-common{
    padding-bottom: 25px;
    margin-bottom: 25px;
}
.mb-25px{
    margin-bottom: 25px;
}
.category-nav-link {
	font-size: 14px;
	
}
#slider-range .ui-slider-handle {
	border: transparent;
}
</style>


<div class="offcanvas-lg offcanvas-start filter-offcanvas" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title al-title-20px" id="filterOffcanvasLabel">{{ get_phrase('Filter') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#filterOffcanvas" aria-label="Close"></button>
    </div>
    <form action="#" id="filter-form" method="get">
        @csrf
        <div class="offcanvas-body">
            <div class="filter-sidebar w-100">
                <!-- Categories -->
                <div class="mb-common fsh-border-bottom">
                    @if (request()->query())
                        <span  class="d-flex nMaxIcon">
                            {{get_phrase('Filter')}}
                            <a href="{{ url()->current() }}" data-bs-toggle="tooltip" title="{{ get_phrase('Clear') }}"><i class="fi-rr-cross-small"></i></a>
                        </span>
                    @endif
                    <h4 class="al-title-18px d-flex justify-content-between mb-25px">
                       
                        @if (isset($header_category->id))
                            {{ $header_category->title }}
                        @else
                            {{ get_phrase('Categories') }}
                        @endif
                         
                    </h4>
                    <ul>
                        @foreach ($list_categories as $list_category)
                            <li>
                                <a href="{{ route('products', get_category_params($list_category)) }}" class="category-nav-link @if ($selected_category->id == $list_category->id) active @endif">
                                    <span>{{ $list_category->title }}</span>
                                    <span>{{ $list_category->totalProductCount() }}</span>
                                </a>
                                
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Price -->
                <div class="mb-common fsh-border-bottom">
                    <h4 class="al-title-18px mb-25px">{{ get_phrase('Price Range') }}</h4>
                    <div class="d-flex align-items-start gap-12px flex-wrap justify-content-between mb-2">
                        <div>
                            <p class="al-subtitle-14px lh-1">{{get_phrase('Min')}}</p>
                        </div>
                        <div>
                            <p class="al-subtitle-14px lh-1">{{get_phrase('Max')}}</p>
                        </div>
                    </div>
                    <div class="py-6px mb-12px ms-2 me-1">
                        <div id="slider-range"></div> 
                    </div>
                    <div class="d-flex align-items-start gap-12px flex-wrap justify-content-between">
                        <div>
                            <p class="al-subtitle-14px lh-1"><span class="min-input-value">{{$product_min_price}}</span></p>
                        </div>
                        <div>
                            <p class="al-subtitle-14px lh-1"><span class="max-input-value">{{$product_max_price}}</span></p>
                        </div>
                        <input id="filter-min-max-price" name="price" type="hidden" value="{{$selected_min_price ?? $product_min_price}},{{$selected_max_price ?? $product_max_price}}">
                    </div>
                </div>

                @if ($selected_category->id > 0)
                    @foreach ($selected_category->attribute_types as $attribute_type)
                        @php
                            $attribute_type_slug = $attribute_type->slug;
                            $selected_attributes = explode(',', request()->$attribute_type_slug);
                        @endphp
                        @if ($attribute_type->input_type == 'color')
                            <div class="mb-common fsh-border-bottom">
                                <h4 class="al-title-18px mb-25px">{{ $attribute_type->name }}</h4>
                                <div class="d-flex align-items-center gap-10px flex-wrap">
                                    @foreach ($attribute_type->attributes as $attribute)
                                        <div class="position-relative">
                                            <!-- Here you can change the color code that you need to set -->
                                            <label class="color-checkbox2-btn" for="{{ $attribute_type->slug . $attribute->slug }}" style="--checkbox-color: {{ $attribute->input_value }}"></label>
                                            <input type="radio" class="color-checkbox2-input" name="{{ $attribute_type_slug }}[]" id="{{ $attribute_type->slug . $attribute->slug }}" value="{{ $attribute->slug }}" autocomplete="off" @if (in_array($attribute->slug, $selected_attributes)) checked @endif>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="mb-common fsh-border-bottom">
                                <h4 class="al-title-18px mb-25px">{{ $attribute_type->name }}</h4>
                                <div class="d-flex align-items-center gap-12px flex-wrap">
                                    @foreach ($attribute_type->attributes as $attribute)
                                        <div class="position-relative">
                                            <label class="size-checkbox2-btn" for="{{ $attribute->id . $attribute->slug }}">{{ $attribute->name }}</label>
                                            <input type="radio" class="size-checkbox2-input" name="{{ $attribute_type_slug }}[]" id="{{ $attribute->id . $attribute->slug }}" value="{{ $attribute->slug }}" autocomplete="off" @if (in_array($attribute->slug, $selected_attributes)) checked @endif>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <!-- Availability -->
                @php $selected_availability = explode(',',request()->availability); @endphp
                <div class="mb-common fsh-border-bottom">
                    <h4 class="al-title-18px mb-25px">{{ get_phrase('Availability') }}</h4>
                    <div class="form-check form-checkbox mb-3">
                        <input class="form-check-input form-checkbox-input" type="checkbox" name="availability[]" value="in-stock" id="instock" @if (in_array('in-stock', $selected_availability)) checked @endif>
                        <label class="form-check-label form-checkbox-label" for="instock">
                            {{ get_phrase('In Stock') }}
                        </label>
                    </div>
                    <div class="form-check form-checkbox">
                        <input class="form-check-input form-checkbox-input" type="checkbox" name="availability[]" value="out-of-stock" id="stockout" @if (in_array('out-of-stock', $selected_availability)) checked @endif>
                        <label class="form-check-label form-checkbox-label" for="stockout">
                            {{ get_phrase('Out of stock') }}
                        </label>
                    </div>
                </div>

                <!-- Rating -->
                @php $selected_ratings = explode(',',request()->rating); @endphp
                <div class="filter-rating-select">
                    <h4 class="al-title-18px mb-25px">{{ get_phrase('Rating') }}</h4>
                    <div class="form-check form-checkbox mb-3">
                        <input name="rating[]" class="form-check-input form-checkbox-input mcheck-input" type="checkbox" value="5" id="starFive" @if (in_array(5, $selected_ratings)) checked @endif>
                        <label class="form-check-label mcheck-label" for="starFive">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                        </label>
                    </div>
                    <div class="form-check form-checkbox mb-3">
                        <input name="rating[]" class="form-check-input form-checkbox-input mcheck-input" type="checkbox" value="4" id="starFour" @if (in_array(4, $selected_ratings)) checked @endif>
                        <label class="form-check-label mcheck-label" for="starFour">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                        </label>
                    </div>
                    <div class="form-check form-checkbox mb-3">
                        <input name="rating[]" class="form-check-input form-checkbox-input mcheck-input" type="checkbox" value="3" id="starThree" @if (in_array(3, $selected_ratings)) checked @endif>
                        <label class="form-check-label mcheck-label" for="starThree">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                        </label>
                    </div>
                    <div class="form-check form-checkbox mb-3">
                        <input name="rating[]" class="form-check-input form-checkbox-input mcheck-input" type="checkbox" value="2" id="starTwo" @if (in_array(2, $selected_ratings)) checked @endif>
                        <label class="form-check-label mcheck-label" for="starTwo">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                        </label>
                    </div>
                    <div class="form-check form-checkbox mb-3">
                        <input name="rating[]" class="form-check-input form-checkbox-input mcheck-input" type="checkbox" value="1" id="starOne" @if (in_array(1, $selected_ratings)) checked @endif>
                        <label class="form-check-label mcheck-label" for="starOne">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-yellow-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                            <img src="{{ get_image('assets/frontend/fashion/images/image-icons/star-gray-16.svg') }}" alt="">
                        </label>
                    </div>
                </div>

                {{-- Filter hidden fields --}}
                <input type="hidden" name="sort_by" value="{{ request()->sort_by ?? 'low-to-high' }}" id="sort_by">
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">

    "use strict";
    $(document).ready(function () {
        if ($('#slider-range').length > 0) {
            let priceMaxVal = $(".max-input-value").text(); 
            let priceMinVal = $(".min-input-value").text();
            let rangeValArr = $("#filter-min-max-price").val().split(',').map(Number);

            $("#slider-range").slider({
                range: true,
                min: Number(priceMinVal),
                max: Number(priceMaxVal),
                values: rangeValArr,
                slide: function (event, ui) {
                    $(".min-input-value").text(ui.values[0]);
                    $(".max-input-value").text(ui.values[1]);
                    $("#filter-min-max-price").val(ui.values[0] + ',' + ui.values[1]);
                },
                stop: function(event, ui) {
                    // When mouse stops dragging the slider, submit the form
                    $(".min-input-value").html(ui.values[0]);
                    $(".max-input-value").html(ui.values[1]);
                    $("#filter-min-max-price").val(ui.values[0] + ',' + ui.values[1]);

                    // Trigger your existing JS function
                    if (typeof submitFilterForm === 'function') {
                        submitFilterForm();
                    }
                }
            });

            // Update visible values on page load (after slider initializes)
            let currentVals = $("#slider-range").slider("values");
            $(".min-input-value").html(currentVals[0]);
            $(".max-input-value").html(currentVals[1]);
        }
    });
</script>
 <script type="text/javascript">

	    "use strict";
    // Handle checkbox clicks inside the form
    document.querySelectorAll('#filter-form input[type="checkbox"]').forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            submitFilterForm();
        });
    });

    // Function to submit the form with query parameters
    function submitFilterForm() {
        // Prevent default form submission behavior
        const form = document.getElementById('filter-form');

        // Create an object to store query parameters
        var queryParams = {};

        // Loop through each input field in the form
        var inputs = form.querySelectorAll('input');

        inputs.forEach(function(input) {
            // Skip the input if it doesn't have a name attribute or is the CSRF token
            if (!input.name || input.name === '_token') return;

            var name = input.name;
            var value = input.value;

            // Check if it's a checkbox and has the name that includes '[]'
            if (name.includes('[]') && input.checked) {
                // Remove [] from name (e.g., "availability[]") to get "availability"
                name = name.replace('[]', '');

                // Initialize the array if it doesn't exist already
                if (!queryParams[name]) {
                    queryParams[name] = [];
                }

                // Push the checked value to the array
                queryParams[name].push(value);
            } else if (!name.includes('[]')) {
                // Handle regular inputs (non-checkbox)
                queryParams[name] = value;
            }
        });

        // Transform array values into comma-separated strings
        for (var key in queryParams) {
            if (Array.isArray(queryParams[key])) {
                queryParams[key] = queryParams[key].join(',');
            }
        }

        // Construct the final query string
        var queryString = Object.keys(queryParams)
            .map(function(key) {
                return encodeURIComponent(key) + '=' + encodeURIComponent(queryParams[key]);
            })
            .join('&');

        // Replace %2C with a comma
        queryString = queryString.replace(/%2C/g, ',');

        // Update the form action with the new query string
        var updatedActionUrl = '{{ request()->url() }}?' + queryString;

        // Now submit the form manually with the updated action URL
        window.location.href = updatedActionUrl; // Redirect to the new URL
    }



</script>
