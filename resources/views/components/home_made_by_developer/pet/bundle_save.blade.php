{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

<!-- Bundle & Save! Area Start -->
<section class="section-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-50px">
                    <h2 class="section-title mb-14px text-center wow animate__fadeInUp builder-editable" builder-identity="PS1" data-wow-delay=".1s">{{get_phrase('Bundle & Save!')}}</h2>
                    <p class="section-subtitle bundle-save-section-subtitle text-center wow animate__fadeInUp builder-editable" builder-identity="PS2" data-wow-delay=".2s">{{get_phrase('Curated kits for easier shopping and better value everything your pet needs in one pack.')}}</p>
                </div>
            </div>
        </div>
        <div class="row g-20px justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-6 col-md-10">
                <div class="product-bundle-card product-bundle-card1">
                    <p class="product-bundle1-badge mb-20px builder-editable" builder-identity="PS3">{{get_phrase('Grooming Kit')}}</p>
                    <h3 class="product-bundle-title builder-editable" builder-identity="PS4">{{get_phrase('Fresh & Clean Essentials')}}</h3>
                    <div class="product-bundle1-subtitles">
                        <p class="product-bundle-subtitle builder-editable" builder-identity="PS5">{{get_phrase('Keep your pet looking and feeling their best with our all-in-one grooming bundle.')}}</p>
                        <p class="product-bundle-subtitle builder-editable" builder-identity="PS6">{{get_phrase('Includes shampoo, brush, nail clippers, wipes, and a detangling.')}}</p>
                    </div>
                    <div class="pb-card-banner-wrap">
                        
                        <div class="pb-card-banner1 ms-auto">
                            <img class="banner builder-editable" builder-identity="PS7" src="{{ asset('assets/frontend/pet/images/product-bundle-banner1.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="product-bundle-card product-bundle-card2">
                    <p class="product-bundle2-badge mb-20px builder-editable" builder-identity="PS8">{{get_phrase('Stater Pack')}}</p>
                    <h3 class="product-bundle-title builder-editable" builder-identity="PS9">{{get_phrase('Perfect for New Pet Parents')}}</h3>
                    <div class="product-bundle2-subtitles">
                        <p class="product-bundle-subtitle builder-editable" builder-identity="PS10">{{get_phrase('Everything you need to welcome a new furry friend!')}}</p>
                        <p class="product-bundle-subtitle builder-editable" builder-identity="PS11">{{get_phrase('This kit includes a feeding bowl, leash, toy, training pads, and food samples — ideal for puppies or kittens.')}}</p>
                    </div>
                    <div class="pb-card-banner-wrap">
                        
                        <div class="pb-card-banner2 ms-auto">
                            <img class="banner builder-editable" builder-identity="PS12" src="{{ asset('assets/frontend/pet/images/product-bundle-banner2.webp') }}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Bundle & Save! Area End -->