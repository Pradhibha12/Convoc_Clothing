@extends('layouts.frontend')
@push('title', 'Store Details')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')

<!-- Breadcrumb Area Start -->
<section>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb-area mt-30px mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
                <h1 class="al-title-42px text-center mb-20px">{{ get_phrase('Store Details') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fsh-breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ get_phrase('Store Details') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Breadcrumb Area End -->


<!-- Store Details Area Start -->
<section>
    <div class="container">
        <div class="row gy-4 align-items-center mb-50px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-xl-6 col-lg-6">
                <div class="fsh-banner">
                    <img class="banner" src="{{ get_image($store_details->thumbnail) }}" alt="banner">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div>
                    <h1 class="al-title-30px mb-2">{{ $store_details->name }}</h1>
                    <p class="al-subtitle3-16px lh-base mb-30px">{{ $store_details->description }}</p>
                    <div class="d-flex gap-20px flex-wrap mb-50px">
                        <div class="max-w-173px">
                            <h3 class="al-title-20px lh-1 mb-20px">{{ get_phrase('Address') }}</h3>
                            <div class="mb-3">
                                <p class="al-subtitle3-16px lh-base">{{ $store_details->name }}</p>
                                <p class="al-subtitle3-16px lh-base">{{ $store_details->city.', '.$store_details->state.' '.$store_details->zip.', '.$store_details->country }}</p>
                            </div>
                           
                        </div>
                      
                        <div class="max-w-173px">
                            <h3 class="al-title-20px lh-1 mb-20px">{{get_phrase('Contact Us')}}</h3>
                            <p class="al-subtitle3-16px lh-base"> {{ $store_details->phone }}</p>
                        </div>
                    </div>
                    <div>
                         @php
                           
                            $store = \App\Models\StoreSetting::where('store_id',$store_details->id)->first();
                            
                        @endphp
                        <h3 class="al-title-20px lh-1 mb-20px">{{get_phrase('Social Media')}}</h3>
                        <ul class="d-flex align-items-center gap-20px flex-wrap">
                            <li>
                                <a href="{{ $store->facebook_url ?? ''}}"  target="_blank" class="svg-link d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <g clip-path="url(#clip0_441_10571)">
                                          <path d="M18.8134 9.50006C18.8134 4.52953 14.6019 0.500122 9.4067 0.500122C4.21152 0.500122 0 4.52953 0 9.50006C0 13.9921 3.43988 17.7155 7.9369 18.3907V12.1016H5.54848V9.50006H7.9369V7.51726C7.9369 5.26165 9.34129 4.01572 11.49 4.01572C12.5188 4.01572 13.5956 4.1915 13.5956 4.1915V6.40633H12.4095C11.241 6.40633 10.8765 7.10014 10.8765 7.81257V9.50006H13.4854L13.0683 12.1016H10.8765V18.3907C15.3735 17.7155 18.8134 13.9921 18.8134 9.50006Z" fill="#0D0E10"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_441_10571">
                                            <rect width="18.8134" height="17.9999" fill="white" transform="translate(0 0.500122)"/>
                                          </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $store->twitter_url ?? '' }}"  target="_blank" class="svg-link d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none">
                                        <g clip-path="url(#clip0_441_10573)">
                                          <path d="M11.951 8.13308L18.8499 0.552979H17.2151L11.2247 7.13467L6.44022 0.552979H0.921875L8.15697 10.5057L0.921875 18.4546H2.5568L8.88279 11.5041L13.9356 18.4546H19.4539L11.9506 8.13308H11.951ZM9.7117 10.5934L8.97864 9.60229L3.14589 1.71629H5.65704L10.3641 8.08054L11.0972 9.07161L17.2159 17.3442H14.7047L9.7117 10.5937V10.5934Z" fill="#0D0E10"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_441_10573">
                                            <rect width="18.9393" height="17.9016" fill="white" transform="translate(0.71875 0.552979)"/>
                                          </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="{{ $store->instagram_url  ?? ''}}"  target="_blank" class="svg-link d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <g clip-path="url(#clip0_441_10570)">
                                          <path d="M9.56412 2.12069C11.9682 2.12069 12.2529 2.13124 13.1984 2.17343C14.077 2.2121 14.5515 2.35975 14.8678 2.4828C15.2861 2.64452 15.5884 2.84139 15.9012 3.15428C16.2175 3.47068 16.4108 3.76951 16.5725 4.18787C16.6955 4.50427 16.8431 4.98239 16.8818 5.85778C16.924 6.80699 16.9345 7.09175 16.9345 9.49291C16.9345 11.8976 16.924 12.1823 16.8818 13.128C16.8431 14.0069 16.6955 14.4815 16.5725 14.798C16.4108 15.2163 16.214 15.5186 15.9012 15.8315C15.5849 16.1479 15.2861 16.3413 14.8678 16.503C14.5515 16.6261 14.0735 16.7737 13.1984 16.8124C12.2494 16.8546 11.9647 16.8651 9.56412 16.8651C7.16004 16.8651 6.87535 16.8546 5.92989 16.8124C5.0512 16.7737 4.57671 16.6261 4.26039 16.503C3.84214 16.3413 3.53987 16.1444 3.22706 15.8315C2.91073 15.5151 2.71742 15.2163 2.55574 14.798C2.43273 14.4815 2.28511 14.0034 2.24645 13.128C2.20427 12.1788 2.19373 11.8941 2.19373 9.49291C2.19373 7.08824 2.20427 6.80347 2.24645 5.85778C2.28511 4.97888 2.43273 4.50427 2.55574 4.18787C2.71742 3.76951 2.91425 3.46717 3.22706 3.15428C3.54338 2.83787 3.84214 2.64452 4.26039 2.4828C4.57671 2.35975 5.05472 2.2121 5.92989 2.17343C6.87535 2.13124 7.16004 2.12069 9.56412 2.12069ZM9.56412 0.5C7.12138 0.5 6.8156 0.510547 5.85608 0.552734C4.90007 0.594921 4.24282 0.749608 3.67343 0.971091C3.07944 1.20312 2.57683 1.50898 2.07774 2.01171C1.57513 2.51092 1.26935 3.01366 1.03738 3.60428C0.815952 4.17732 0.661304 4.83122 0.619127 5.78746C0.57695 6.75074 0.566406 7.0566 0.566406 9.49994C0.566406 11.9433 0.57695 12.2491 0.619127 13.2089C0.661304 14.1651 0.815952 14.8226 1.03738 15.3921C1.26935 15.9862 1.57513 16.489 2.07774 16.9882C2.57683 17.4874 3.07944 17.7968 3.66991 18.0253C4.24282 18.2468 4.89655 18.4014 5.85256 18.4436C6.81208 18.4858 7.11787 18.4964 9.5606 18.4964C12.0033 18.4964 12.3091 18.4858 13.2686 18.4436C14.2247 18.4014 14.8819 18.2468 15.4513 18.0253C16.0418 17.7968 16.5444 17.4874 17.0435 16.9882C17.5426 16.489 17.8519 15.9862 18.0803 15.3956C18.3017 14.8226 18.4564 14.1687 18.4986 13.2124C18.5407 12.2527 18.5513 11.9468 18.5513 9.50346C18.5513 7.06011 18.5407 6.75425 18.4986 5.7945C18.4564 4.83825 18.3017 4.18083 18.0803 3.61131C17.8589 3.01365 17.5531 2.51092 17.0505 2.01171C16.5514 1.51249 16.0488 1.20312 15.4583 0.974606C14.8854 0.753123 14.2317 0.598437 13.2757 0.55625C12.3126 0.510547 12.0069 0.5 9.56412 0.5Z" fill="#0D0E10"/>
                                          <path d="M9.56328 4.87683C7.01158 4.87683 4.94141 6.94752 4.94141 9.49985C4.94141 12.0522 7.01158 14.1229 9.56328 14.1229C12.115 14.1229 14.1852 12.0522 14.1852 9.49985C14.1852 6.94752 12.115 4.87683 9.56328 4.87683ZM9.56328 12.4987C7.90784 12.4987 6.56521 11.1557 6.56521 9.49985C6.56521 7.844 7.90784 6.50104 9.56328 6.50104C11.2187 6.50104 12.5613 7.844 12.5613 9.49985C12.5613 11.1557 11.2187 12.4987 9.56328 12.4987Z" fill="#0D0E10"/>
                                          <path d="M15.4471 4.69404C15.4471 5.29169 14.9621 5.77333 14.3681 5.77333C13.7706 5.77333 13.2891 5.28817 13.2891 4.69404C13.2891 4.09638 13.7741 3.61475 14.3681 3.61475C14.9621 3.61475 15.4471 4.0999 15.4471 4.69404Z" fill="#0D0E10"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_441_10570">
                                            <rect width="17.9954" height="17.9999" fill="white" transform="translate(0.566406 0.5)"/>
                                          </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Store Details Area End -->

<!-- Location Area Start -->
<section>
    <div class="container">
        <div class="row mb-4 wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <h1 class="al-title-30px mb-30px">{{get_phrase('Location')}}</h1>
                <div class="d-flex align-items-center gap-3 justify-content-between flex-wrap">
                    <div>
                        <h3 class="al-title-20px fw-medium lh-1 mb-2">{{ $store_details->country }}</h3>
                        <div class="d-flex gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M9.99844 11.8083C8.22344 11.8083 6.77344 10.3666 6.77344 8.5833C6.77344 6.79997 8.22344 5.36664 9.99844 5.36664C11.7734 5.36664 13.2234 6.80831 13.2234 8.59164C13.2234 10.375 11.7734 11.8083 9.99844 11.8083ZM9.99844 6.61664C8.9151 6.61664 8.02344 7.49997 8.02344 8.59164C8.02344 9.6833 8.90677 10.5666 9.99844 10.5666C11.0901 10.5666 11.9734 9.6833 11.9734 8.59164C11.9734 7.49997 11.0818 6.61664 9.99844 6.61664Z" fill="#0D0E10"/>
                                <path d="M10.0014 18.9667C8.76803 18.9667 7.52637 18.5 6.5597 17.575C4.10137 15.2084 1.3847 11.4334 2.4097 6.94169C3.3347 2.86669 6.89303 1.04169 10.0014 1.04169C10.0014 1.04169 10.0014 1.04169 10.0097 1.04169C13.118 1.04169 16.6764 2.86669 17.6014 6.95002C18.618 11.4417 15.9014 15.2084 13.443 17.575C12.4764 18.5 11.2347 18.9667 10.0014 18.9667ZM10.0014 2.29169C7.57637 2.29169 4.4597 3.58335 3.6347 7.21669C2.7347 11.1417 5.20137 14.525 7.4347 16.6667C8.87637 18.0584 11.1347 18.0584 12.5764 16.6667C14.8014 14.525 17.268 11.1417 16.3847 7.21669C15.5514 3.58335 12.4264 2.29169 10.0014 2.29169Z" fill="#0D0E10"/>
                            </svg>
                            <p class="al-subtitle-16px lh-1 mt-2px">{{ $store_details->city.', '.$store_details->state }}</p>
                        </div>
                    </div>
                   @php 
                        $latitude = $store_details->latitude; 
                        $longitude = $store_details->longitude; 
                    @endphp

                    @if(!empty($latitude) && !empty($longitude))
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $latitude }},{{ $longitude }}" 
                        class="btn fsh-btn-dark" 
                        target="_blank" 
                        rel="noopener noreferrer">
                            {{ get_phrase('GET DIRECTION') }}
                        </a>
                    @else
                        <button class="btn fsh-btn-dark" disabled>
                            {{ get_phrase('GET DIRECTION') }}
                        </button>
                    @endif

                </div>
            </div>
        </div>
        <div class="row mb-100px wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-12">
                <div class="fsh-google-map">
                   @if(!empty($latitude) && !empty($longitude))
                    <iframe 
                        src="https://www.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=es;z=14&output=embed" 
                        width="100%" 
                        height="400" 
                        style="border:0;" 
                        allowfullscreen 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Location Area End -->

@endsection

@push('js')
@endpush