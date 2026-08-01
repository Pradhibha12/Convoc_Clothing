{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}
<style>
.collection-sell-percent {
        position: absolute;
        top: 40%;
        left: 6%;
        z-index: 99;
 }
.collection-banner-btn {
	bottom: 76px;
    z-index: 999;
}
.collection-trending-wrap {
    z-index: 9999;
}
.radius-12{
    border-radius: 12px;
}
</style>
<!-- Featured Collection Area Start -->
<section class="mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-30px">
                    <h1 class="mv-title-40px text-center wow animate__fadeInUp  builder-editable" builder-identity="11" data-wow-delay=".2s">{{get_phrase('Featured collections')}}</h1>
                </div>
            </div>
        </div>
        <div class="row gy-4 mb-100px collection-banner-row">
            <div class="col-12 wow animate__fadeInUp" data-wow-delay=".1s">
                
                <div class="collection-banner-wrap1 position-relative p-0 w-100 "  >
                    <img src="{{ asset('assets/frontend/fashion/images/images/collection-top-banner.webp') }}" class="builder-editable radius-12" builder-identity="28" alt="">
                    <div class="collection-sell-percent">
                        <h2 class="title  builder-editable" builder-identity="12">{{get_phrase('SALE')}}</h2>
                        <h1 class="percentage  builder-editable" builder-identity="13">{{get_phrase('20%')}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow animate__fadeInUp" data-wow-delay=".2s">
                <div class="collection-banner-wrap2">
                    <img class="banner builder-editable" builder-identity="14" src="{{ asset('assets/frontend/fashion/images/images/collection-second-banner.webp') }}" alt="banner">
                    <a href="{{route('all_products')}}" class="btn fsh-btn-dark collection-banner-btn builder-editable" builder-identity="15">{{get_phrase('SHOP NOW')}}</a>
                </div>
            </div>
            <div class="col-md-6 wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="collection-banner-wrap3">
                    <img class="banner builder-editable" builder-identity="16" src="{{ asset('assets/frontend/fashion/images/images/collection-third-banner.webp') }}" alt="banner">
                    <div class="collection-trending-wrap ">
                        <h2 class="title builder-editable" builder-identity="17" >{{get_phrase('AUTUMNM')}}</h2>
                        <h1 class="sub-title builder-editable" builder-identity="18">{{get_phrase('TRENDING')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Collection Area End -->