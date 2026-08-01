<style>
    .product-list-view  {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px
    }
</style>

<div class="col-12">
    <div class="d-block product-list-view">
        <div class="d-flex align-items-center gap-4 flex-column flex-md-row">
            <div class="product-list-banner">
                @php
                    $thumbnails = json_decode($product->thumbnail, true);
                    $firstImage = $thumbnails[0] ?? null;
                @endphp
                <img class="banner" src="{{ get_image($firstImage) }}" alt="banner">
                <a href="javascript:void(0)" class="product-card-bookmark {{ wishlist_class($product->id) }}" 
                                onclick="toggleWishlist({{ $product->id }}, this)">
                    <span class="d-flex align-items-center justify-content-center w-100 h-100 rounded-circle" data-bs-toggle="tooltip" data-bs-title="Wishlist">
                        <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6477 0.423828C14.6751 0.423828 12.9095 1.3829 11.8088 2.85422C10.708 1.3829 8.94242 0.423828 6.96978 0.423828C3.62391 0.423828 0.910156 3.14848 0.910156 6.51614C0.910156 7.81308 1.11723 9.01197 1.47688 10.1236C3.19886 15.5729 8.50648 18.8316 11.133 19.7253C11.5036 19.8561 12.1139 19.8561 12.4845 19.7253C15.111 18.8316 20.4186 15.5729 22.1406 10.1236C22.5003 9.01197 22.7074 7.81308 22.7074 6.51614C22.7074 3.14848 19.9936 0.423828 16.6477 0.423828Z" fill="#CECECE"/>
                                    </svg>
                    </span>
                </a>
            </div>
            <div class="w-100">
                <div class="d-flex align-items-start gap-3 mb-4 justify-content-between flex-column flex-md-row">
                    <div>
                        <a href="{{ route('product', $product->slug) }}" class="mb-10px product-lg-card-title">{{ $product->title }}</a>
                        <div class="d-flex align-items-center gap-2 flex-wrap">
                             @if ($product->is_discounted()->exists())
                                @if ($product->is_discounted->discount_type == 'flat')
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="card-product-price">  {{ currency($product->price - $product->is_discounted->discount_value) }} </h6>
                                        <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                @else
                                    @php
                                        $discount_amount = $product->price * ($product->is_discounted->discount_value / 100);
                                    @endphp
                                    <div class="d-flex align-items-baseline gap-2">
                                        <h6 class="card-product-price"> {{ currency($product->price - $discount_amount) }}  </h6>
                                            <h6 class="al-title-14px fw-medium fsh-text-gray"><del>{{ currency($product->price) }}</del></h6>
                                    </div>
                                    
                                @endif
                            @else
                                    <h6 class="card-product-price">{{ currency($product->price) }}</h6>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-2 mt-2">
                            <div class="svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28 26" fill="none">
                                    <path d="M9.20936 7.92414L12.8408 0.816639C13.3069 -0.0957806 14.6538 -0.0957806 15.1199 0.816639L18.7512 7.92414L26.8723 9.07092C27.9142 9.21805 28.3294 10.4555 27.5752 11.1652L21.6998 16.6938L23.0864 24.5042C23.2645 25.5072 22.1747 26.272 21.2424 25.7983L13.9803 22.1087L6.7182 25.7983C5.7859 26.272 4.69612 25.5072 4.87417 24.5042L6.26074 16.6938L0.38551 11.1652C-0.36884 10.4555 0.0464452 9.21805 1.0884 9.07092L9.20936 7.92414Z" fill="#FFC416"/>
                                </svg>
                            </div>
                            <div class="d-flex align-items-center gap-2px">
                                <h5 class="product-card-rating">{{ number_format($product->average_rating, 1) }}</h5>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <p class="al-subtitle2-14px">{{ \Illuminate\Support\Str::limit($product->summary, 120, '...') }}</p>
                <a onclick="load_view('{{ route('view', ['path' => 'frontend.products.quick_view', 'product_id' => $product->id]) }}', '#quickViewModal .modal-body')" data-bs-toggle="modal" data-bs-target="#quickViewModal" href="javascript:;" class="btn ptb4-btn-skin mt-2">
                    @if ($product->is_cart_item)
                        {{ get_phrase('ADDED TO CART') }}
                    @else
                        {{ get_phrase('ADD TO CART') }}
                    @endif
                </a>
            </div>
        </div>
    </div>
</div>