@php
    $product = App\Models\Product::where('id', $product_id)->firstOrNew();
@endphp

<div class="d-flex gap-4 flex-column flex-lg-row">
    <div class="quick-view-banner-wrap">
         @php
            $thumbnails = json_decode($product->thumbnail, true);
            $firstImage = $thumbnails[0] ?? null;
        @endphp
        <img class="image-zoom-active" src="{{ get_image($firstImage) }}" alt="thumbnail">
    </div>
    <div class="w-100">
        <h3 class="al-title-18px mb-6px pe-lg-4 pe-0">{{ $product->title }}</h3>
        <div class="d-flex align-items-end justify-content-between gap-10px flex-wrap mb-4">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="d-flex align-items-center gap-12px">
                    {{-- <div class="d-flex align-items-center gap-6px">
                        @if ($product->is_discounted)
                            @php
                                $discount = $product->discount;
                            @endphp
                            @if ($discount->discount_type == 'percentage')
                                <h5 class="al-title-18px">{{ currency(($product->price / 100) * $discount->discount_value) }}</h5>
                            @else
                                <h5 class="al-title-18px">{{ currency($discount->discount_value) }}</h5>
                            @endif
                            <h6 class="al-title-12px fsh-text-gray fw-medium"><del>{{ currency($product->price) }}</del></h6>
                        @else
                            <h5 class="al-title-18px">{{ currency($product->price) }}</h5>
                        @endif
                    </div> --}}
                    <div class="d-flex align-items-center gap-6px">
                        @if ($product->is_discounted)
                            @php
                                $discount = $product->discount;
                            @endphp

                            @if ($discount->discount_type == 'percentage')
                                @php
                                    $discount_amount = ($product->price / 100) * $discount->discount_value;
                                @endphp
                                <h5 class="al-title-18px">{{ currency($product->price - $discount_amount) }}</h5>
                            @else
                                <h5 class="al-title-18px">{{ currency($product->price - $discount->discount_value) }}</h5>
                            @endif

                            <h6 class="al-title-12px fsh-text-gray fw-medium"><del>{{ currency($product->price) }}</del></h6>
                        @else
                            <h5 class="al-title-18px">{{ currency($product->price) }}</h5>
                        @endif
                    </div>

                    @if ($product->is_discounted()->exists())
                        @php
                            $discount = $product->is_discounted;
                            if ($discount->discount_type === 'percentage') {
                                $discount_text = $discount->discount_value . '% OFF';
                            } else { // flat
                                $discount_text = currency($discount->discount_value) . ' FLAT';
                            }
                        @endphp

                        <p class="sky-blue-badge-sm px-2">{{ $discount_text }}</p>
                    @endif

                    
                </div>
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('assets/frontend/fashion/images/image-icons/star-yellow-14.svg') }}" alt="">
                    <p class="al-title-12px fw-medium">{{ $product->average_rating ?? '0.0' }} <span class="fsh-text-gray">({{ $product->reviews->count() }})</span></p>
                </div>
            </div>
            <div class="d-flex align-items-center gap-6px">
                    <a href="javascript:;" 
                    class="circle-iconbox-24px {{ wishlist_class($product->id) }}" 
                    onclick="toggleWishlist({{ $product->id }}, this)">
                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist" aria-describedby="tooltip276572">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none"> 
                            <path d="M6.22664 10.8255C6.07163 10.8255 5.92162 10.8055 5.79662 10.7605C3.88653 10.1055 0.851379 7.78037 0.851379 4.3452C0.851379 2.59512 2.26645 1.17505 4.00653 1.17505C4.85157 1.17505 5.64161 1.50506 6.22664 2.09509C6.81167 1.50506 7.6017 1.17505 8.44674 1.17505C10.1868 1.17505 11.6019 2.60012 11.6019 4.3452C11.6019 7.78537 8.56675 10.1055 6.65666 10.7605C6.53165 10.8055 6.38165 10.8255 6.22664 10.8255ZM4.00653 1.92508C2.68147 1.92508 1.60142 3.01014 1.60142 4.3452C1.60142 7.76036 4.88657 9.66046 6.04163 10.0555C6.13163 10.0855 6.32664 10.0855 6.41665 10.0555C7.5667 9.66046 10.8569 7.76537 10.8569 4.3452C10.8569 3.01014 9.77681 1.92508 8.45174 1.92508C7.69171 1.92508 6.98667 2.2801 6.53165 2.89513C6.39165 3.08514 6.07163 3.08514 5.93162 2.89513C5.4666 2.2751 4.76657 1.92508 4.00653 1.92508Z" fill="#0D0E10"/>
                        </svg>
                    </span>
                </a>
                <a href="javascript:;" id="shareButtons" class="circle-iconbox-24px" data-bs-toggle="tooltip" data-bs-title="Share" aria-describedby="tooltip276572">
                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                            <g clip-path="url(#clip0_180_7096)">
                                <path d="M9.52003 7.4718C8.82024 7.4718 8.19376 7.791 7.77808 8.29135L5.0741 6.75628C5.15819 6.51968 5.20441 6.26528 5.20441 6.00016C5.20441 5.73509 5.15819 5.48069 5.0741 5.24408L7.77787 3.70865C8.1935 4.20916 8.82008 4.52846 9.51992 4.52846C10.7682 4.52846 11.7838 3.5126 11.7838 2.26389C11.7839 1.01554 10.7683 0 9.52003 0C8.27156 0 7.25587 1.01554 7.25587 2.26384C7.25587 2.52896 7.30203 2.78341 7.38617 3.02007L4.68224 4.55556C4.26662 4.05531 3.64019 3.73621 2.94056 3.73621C1.69194 3.73621 0.676086 4.75176 0.676086 6.0001C0.676086 7.2484 1.69194 8.26394 2.94056 8.26394C3.64019 8.26394 4.26656 7.94484 4.68219 7.44465L7.38617 8.97977C7.30203 9.21643 7.25581 9.47093 7.25581 9.73611C7.25581 10.9844 8.27151 11.9999 9.51997 11.9999C10.7683 11.9999 11.7839 10.9843 11.7839 9.73611C11.7839 8.4876 10.7683 7.4718 9.52003 7.4718ZM9.52003 0.792197C10.3315 0.792197 10.9916 1.45236 10.9916 2.26384C10.9916 3.07573 10.3315 3.73621 9.52003 3.73621C8.70842 3.73621 8.04814 3.07573 8.04814 2.26384C8.04814 1.45236 8.70842 0.792197 9.52003 0.792197ZM2.94062 7.4718C2.12885 7.4718 1.46841 6.81158 1.46841 6.00016C1.46841 5.18863 2.12885 4.52846 2.94062 4.52846C3.75206 4.52846 4.41218 5.18863 4.41218 6.00016C4.41218 6.81158 3.75201 7.4718 2.94062 7.4718ZM9.52003 11.2078C8.70842 11.2078 8.04814 10.5476 8.04814 9.73616C8.04814 8.92442 8.70842 8.26399 9.52003 8.26399C10.3315 8.26399 10.9916 8.92442 10.9916 9.73616C10.9916 10.5476 10.3315 11.2078 9.52003 11.2078Z" fill="#0D0E10"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_180_7096">
                                <rect width="12.0011" height="12" fill="white" transform="translate(0.228638)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <div class="mb-4">
            <h6 class="al-title-12px fw-medium mb-2">{{ get_phrase('Hurry Up! Only').' '.$product->total_stock.' '.get_phrase('left in stock') }}.</h6>
            
             <div class="progress fsh-progress-sm mb-2 max-w-254px" role="progressbar" 
                aria-valuenow="{{ getSoldProgress($product->id) }}" 
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" data-progress="{{ getSoldProgress($product->id) }}"></div>
            </div>
          
        </div>
        <form class="ajaxForm" id="productForm" action="{{ route('customer.cart_item.store', ['product_id' => $product->id]) }}" method="post">
            @csrf
            @foreach ($product->product_attribute_types as $index => $attribute_type)
                @if ($attribute_type->input_type == 'text')
                    <div class="mb-4">
                        <h5 class="al-title-12px fw-medium mb-12px">{{ $attribute_type->name }}</h5>
                        <div class="d-flex align-items-center gap-10px flex-wrap justify-content-between">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                                @foreach ($attribute_type->attributes as $attribute)
                                    <div class="position-relative">
                                        <label class="size-checkbox-btn" for="{{ $attribute_type->slug . $attribute->slug }}">{{ $attribute->name }}</label>
                                        <input type="radio" class="size-checkbox-input" name="{{ $attribute_type->slug }}[]" id="{{ $attribute_type->slug . $attribute->slug }}" autocomplete="off" value="{{ $attribute->slug }}">
                                    </div>
                                @endforeach
                            </div>
                            <a href="javascript:;" class="al-title-12px fw-medium fsh-text-skin text-decoration-underline">{{get_phrase('Size Guide')}}</a>
                        </div>
                    </div>
                @endif
                <div class="mb-4">
                    <div class="d-flex gap-20px flex-wrap">
                        @if ($attribute_type->input_type == 'color')
                            <div>
                                <h6 class="al-title-12px fw-medium mb-3"><span class="fsh-text-gray">{{ $attribute_type->name }} :</span>{{get_phrase(' Light Pink ')}}</h6>
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <!-- Here you can change the color code that you need to set & use checked="" in inside input for checked-->
                                    @foreach ($attribute_type->attributes as $key => $attribute)
                                        <div class="position-relative">
                                            <label class="color-checkbox-btn" for="{{ $attribute_type->slug . $attribute->slug }}" style="--checkbox-color: {{ $attribute->input_value }}"></label>
                                            <input type="radio" class="color-checkbox-input" name="{{ $attribute_type->slug }}[]" id="{{ $attribute_type->slug . $attribute->slug }}" value="{{ $attribute->slug }}" autocomplete="off" {{ $key == 0 ? 'checked' : '' }} data-color-name="{{ $attribute->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($index == 0)
                            <div>
                                <h6 class="al-title-12px fw-medium mb-12px">{{ get_phrase('Quantity') }}</h6>
                                <div class="d-flex align-items-center quantity-input-wrap">
                                    <button class="quantity-btn dec" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                            <path d="M12.8338 7L1.16715 7" stroke="#818195" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>         
                                    </button>
                                    <input type="text" class="quantity-of-product" name="quantity" value="1" readonly />
                                    <button class="quantity-btn inc" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                            <g clip-path="url(#clip0_1538_8154)">
                                                <path d="M7.00105 1.16675L7.00105 12.8334" stroke="#818195" stroke-width="1.5" stroke-linecap="round"/>
                                                <path d="M12.8338 7.00024L1.16715 7.00024" stroke="#818195" stroke-width="1.5" stroke-linecap="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1538_8154">
                                                <rect width="14" height="14" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn fsh-sm-btn-dark w-100 mb-2">
                {{ strtoupper(get_phrase('ADD TO CART')) }}
            </button>
        </form>
        <!-- Hidden Buy Now Form -->
            <form class="buyNowForm d-none" id="buyNowForm" action="{{ route('customer.buy_now', ['product_id' => $product->id]) }}" method="post">
                @csrf
                <!-- Hidden inputs will be dynamically filled -->
            </form>

            <button type="button" id="buyNowButton" class="btn fsh-sm-btn-warning w-100">
                {{ strtoupper(get_phrase('BUY IT NOW')) }}
            </button>
    </div>
</div>

<script type="text/javascript">

    "use strict";

    initScript();

    // Increment decrement 
    $(".quantity-btn").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find(".quantity-of-product").val();
        $button.blur();
        if ($button.hasClass("inc")) {
            var newVal = parseFloat(oldValue) + 1;
          } else {
         // Don't allow decrementing below zero
          if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
          } else {
            newVal = 1;
          }
        }
        $button.parent().find(".quantity-of-product").val(newVal);
    });


         $(document).ready(function() {
            $('#buyNowButton').on('click', function() {
                // Get data from productForm
                const productForm = document.getElementById('productForm');
                const buyNowForm = document.getElementById('buyNowForm');

                // Clear buyNowForm fields
                buyNowForm.innerHTML = '';

                // Copy inputs from productForm to buyNowForm
                Array.from(productForm.elements).forEach(function (element) {
                    if (element.name && element.value) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = element.name;
                        input.value = element.value;
                        buyNowForm.appendChild(input);
                    }
                });

                // Submit the buyNowForm
                buyNowForm.submit();
            });
        });

      
        
</script>

<script>
    "use strict";
        $(document).ready(function() {
            $('#shareButtons').on('click', function() {
                var currentPageUrl = window.location.href;
                $(this).toggleClass('active');
                navigator.clipboard.writeText(currentPageUrl).then(function() {
                    success('Successfully copied this link!');
                }).catch(function(error) {
                    error('Failed to copy the link!');
                });
            });
        });
</script>
   <script type="text/javascript">

	    "use strict";
            document.querySelectorAll('.progress-bar').forEach(bar => {
            let val = bar.dataset.progress;
            val = Math.min(Math.max(val, 0), 100);
            bar.style.width = val + '%';
        });

</script>

