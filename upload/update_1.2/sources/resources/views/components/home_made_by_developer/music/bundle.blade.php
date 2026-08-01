{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

  <!-- Bundles Area Start  -->
    <section class="section-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bundles-section-title-area">
                        <h2 class="section-title text-center mb-18px  mx-auto wow animate__fadeInUp builder-editable" builder-identity="MBO1" data-wow-delay=".1s">{{get_phrase('Everything You Need to Get Started')}}ðŸš€</h2>
                        <p class="section-subtitle text-center max-w-834px mx-auto nap-section-subtitle wow animate__fadeInUp builder-editable" builder-identity="MBO2" data-wow-delay=".2s">{{get_phrase('Our curated kits are ideal for beginners, music students, and home creators â€” offering all the essential gear you need to start playing, recording, and creating with confidence and ease.')}}</p>
                        <div class="text-center wow animate__fadeInUp" data-wow-delay=".3s">
                            <a href="{{route('all_products')}}" class="btn mi-btn-outline-dark px-28px builder-editable" builder-identity="MBO3">{{get_phrase('View all Bundles')}}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row wow animate__fadeInUp" data-wow-delay=".4s">
                <div class="col-12">
                    <div class="bundles-product-wrap">
                        <a href="{{route('all_products')}}" class="bp-large-card">
                            <div class="w-100 h-100">
                                <img class="bpl-card-banner builder-editable" builder-identity="MBO4" src=" {{ asset('assets/frontend/music/images/bundle-banner1.webp') }}" alt="banner">
                                <div class="bpl-card-body">
                                    <h3 class="bpl-card-title builder-editable" builder-identity="MBO5">{{get_phrase('Guitar Starter Kits')}}</h3>
                                    <p class="bpl-card-subtitle builder-editable" builder-identity="MBO6">{{get_phrase('Get everything from a quality guitar to picks, strap, tuner, and amp â€” all in one affordable bundle.')}}</p>
                                    <span class="bpl-card-btn">
                                        <span class="builder-editable" builder-identity="MBO7">{{get_phrase('Shop Kit Now')}}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                            <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="bp-small-card-wrap">
                            <a href="{{route('all_products')}}" class="bp-small-card mb-14px">
                                <div class="w-100 h-100">
                                    <img class="bps-card-banner builder-editable" builder-identity="MBO8" src="{{ asset('assets/frontend/music/images/bundle-banner2.webp') }}" alt="banner">
                                    <div class="bps-card-body">
                                        <h3 class="bps-card-title builder-editable" builder-identity="MBO9">{{get_phrase('Drum Set Bundles')}}</h3>
                                        <div class="bps-subtitle-btn">
                                            <p class="bps-card-subtitle builder-editable" builder-identity="MBO10">{{get_phrase('Complete acoustic and electronic drum kits with sticks, throne, and headphones')}}</p>
                                            <span class="bps-card-btn">
                                                <span class="builder-editable" builder-identity="MBO11">{{get_phrase('Shop Kit Now')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                                    <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('all_products')}}" class="bp-small-card">
                                <div class="w-100 h-100">
                                    <img class="bps-card-banner builder-editable" builder-identity="MBO12" src="{{ asset('assets/frontend/music/images/bundle-banner3.webp') }}" alt="banner">
                                    <div class="bps-card-body">
                                        <h3 class="bps-card-title builder-editable" builder-identity="MBO13">{{get_phrase('Home Recording Starter Pack')}}</h3>
                                        <div class="bps-subtitle-btn">
                                            <p class="bps-card-subtitle builder-editable" builder-identity="MBO14">{{get_phrase('Mic, audio interface, headphones, and software')}}</p>
                                            <span class="bps-card-btn">
                                                <span class="builder-editable" builder-identity="MBO15">{{get_phrase('Shop Kit Now')}}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                                                    <path d="M14.6674 7.14911C14.9941 6.82244 14.9941 6.2928 14.6674 5.96612L9.34399 0.64269C9.01732 0.316017 8.48768 0.316017 8.161 0.64269C7.83433 0.969362 7.83433 1.499 8.161 1.82568L12.8929 6.55762L8.161 11.2896C7.83433 11.6162 7.83433 12.1459 8.161 12.4725C8.48768 12.7992 9.01732 12.7992 9.34399 12.4725L14.6674 7.14911ZM0.691978 6.55762V7.39411H14.0759V6.55762V5.72112H0.691978V6.55762Z" fill="white"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bundles Area End  -->
