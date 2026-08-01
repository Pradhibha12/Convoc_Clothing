{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

    <!-- Seasonal Area Start -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-between flex-column flex-lg-row column-gap-4 row-gap-4 seasonal-section-title-area">
                        <h1 class="section-title seasonal-section-title text-center text-lg-start wow animate__fadeInUp builder-editable" builder-identity="MESE1" data-wow-delay=".1s">{{get_phrase("This Season’s Must-Haves outfits styled for every occasion.")}}</h1>
                        <a href="{{route('all_products')}}" class="btn mc-btn-outline-black btn-min-218px px-26px text-nowrap wow animate__fadeInUp builder-editable" builder-identity="MESE2" data-wow-delay=".2s">{{get_phrase('Explore Fall Collection')}}</a>
                    </div>
                </div>
            </div>
            <div class="row seasonal-collection-row wow animate__fadeInUp" data-wow-delay=".3s">
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                <img class="banner builder-editable" builder-identity="MESE3"  src="{{ asset('assets/frontend/men-clothing/images/seasonal-image1.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title builder-editable" builder-identity="MESE4">{{get_phrase('Earth-tone Knits')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                 <img class="banner builder-editable" builder-identity="MESE5" src="{{ asset('assets/frontend/men-clothing/images/seasonal-image2.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title builder-editable" builder-identity="MESE6">{{get_phrase('Layered Neutrals')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="javascript:;" class="seasonal-product">
                        <div class="w-100 h-100">
                            <div class="seasonal-product-banner">
                                 <img class="banner builder-editable" builder-identity="MESE7" src="{{ asset('assets/frontend/men-clothing/images/seasonal-image3.webp') }}" alt="banner">
                            </div>
                            <div class="seasonal-product-body">
                                <h4 class="seasonal-product-title builder-editable" builder-identity="MESE8">{{get_phrase('Waterproof outerwear')}}</h4>
                                <span class="seasonal-product-arrow">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.4896 4.29164C22.6185 3.62188 22.18 2.97448 21.5102 2.84563L10.5958 0.746003C9.92601 0.617159 9.27861 1.05566 9.14977 1.72543C9.02092 2.39519 9.45942 3.04259 10.1292 3.17143L19.8309 5.03777L17.9646 14.7395C17.8357 15.4093 18.2742 16.0567 18.944 16.1855C19.6138 16.3143 20.2612 15.8758 20.39 15.2061L22.4896 4.29164ZM0.803223 17.9258L1.49578 18.9483L21.9695 5.08083L21.2769 4.05835L20.5844 3.03587L0.110666 16.9033L0.803223 17.9258Z" fill="#F7F7F7"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Seasonal Area End -->