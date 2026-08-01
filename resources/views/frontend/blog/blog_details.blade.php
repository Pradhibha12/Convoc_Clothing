@extends('layouts.frontend')
@push('title', 'Blog Details')
@push('meta')
@endpush
@push('css')
@endpush

@section('content')
<style>
     .blog-large-banner{
        border-radius: 16px;
     }
    .blog-large-banner > .banner {
	height: 480px;
}
.doted-flex-list-item + .doted-flex-list-item::after{
    display: none;
}
.doted-flex-list-item{
    font-size: 14px;
    color: #0D0E10;
    font-weight: 400;
}
.table-bordered > :not(caption) > * {
	border-width: 0;
}
tbody, td, tfoot, th, thead, tr {
	border-style: none;
}
</style>

<!-- Breadcrumb Area Start -->
<section class="mb-30px mt-30px wow animate__fadeInUp" data-wow-delay=".1s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb fsh-breadcrumb justify-content-start">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('blog') }}">{{ get_phrase('Blog') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog_details->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->


<!-- Blog Details Banner Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".2s">
            <div class="col-12">
                <div class="blog-large-banner">
                    <img class="banner" src="{{ get_image($blog_details->banner) }}" alt="banner">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Banner Area End -->


<!-- Blog Details Middle Area Start -->
<section>
    <div class="container">
        <div class="row justify-content-center wow animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-xl-12 col-lg-12">
                <div>
                    <div class="mb-30px d-flex justify-content-between align-items-start gap-4 flex-wrap flex-sm-nowrap">
                        <div>
                            <h1 class="al-title-30px mb-3">{{ $blog_details->title }}</h1>
                            <ul class="d-flex align-items-center gap-12px flex-wrap">
                                <li class="doted-flex-list-item d-flex align-items-center">
                                    <svg class="me-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.009 10.5C14.215 10.5 16.009 8.706 16.009 6.5C16.009 4.294 14.215 2.5 12.009 2.5C9.80303 2.5 8.00903 4.294 8.00903 6.5C8.00903 8.706 9.80303 10.5 12.009 10.5ZM12.009 3.5C13.663 3.5 15.009 4.846 15.009 6.5C15.009 8.154 13.663 9.5 12.009 9.5C10.355 9.5 9.00903 8.154 9.00903 6.5C9.00903 4.846 10.354 3.5 12.009 3.5ZM14 12.5H10C5.94 12.5 4.5 15.473 4.5 18.019C4.5 20.296 5.71105 21.5 8.00305 21.5H15.9969C18.2889 21.5 19.5 20.296 19.5 18.019C19.5 15.473 18.06 12.5 14 12.5ZM15.9969 20.5H8.00305C6.27205 20.5 5.5 19.735 5.5 18.019C5.5 16.959 5.824 13.5 10 13.5H14C18.283 13.5 18.5 17.264 18.5 18.019C18.5 19.735 17.7289 20.5 15.9969 20.5Z" fill="#0D0E10"/>
                                    </svg>
                                    {{  $blog_details->user->name }}
                                </li>
                                 <li class="doted-flex-list-item d-flex align-items-center">
                                   <svg class="me-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 4H16.5V3C16.5 2.724 16.276 2.5 16 2.5C15.724 2.5 15.5 2.724 15.5 3V4H8.5V3C8.5 2.724 8.276 2.5 8 2.5C7.724 2.5 7.5 2.724 7.5 3V4H6C3.71 4 2.5 5.21 2.5 7.5V18C2.5 20.29 3.71 21.5 6 21.5H18C20.29 21.5 21.5 20.29 21.5 18V7.5C21.5 5.21 20.29 4 18 4ZM6 5H7.5V6C7.5 6.276 7.724 6.5 8 6.5C8.276 6.5 8.5 6.276 8.5 6V5H15.5V6C15.5 6.276 15.724 6.5 16 6.5C16.276 6.5 16.5 6.276 16.5 6V5H18C19.729 5 20.5 5.771 20.5 7.5V8.5H3.5V7.5C3.5 5.771 4.271 5 6 5ZM18 20.5H6C4.271 20.5 3.5 19.729 3.5 18V9.5H20.5V18C20.5 19.729 19.729 20.5 18 20.5Z" fill="#0D0E10"/>
                                        </svg>


                                   {{ $blog_details->created_at->format('d M, Y') }}
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                    <div class="mb-30px">
                        <p class="al-subtitle-18px mb-30px">{!! $blog_details->description !!}</p>
                    </div>
                    <div class="mb-3 pb-3 d-flex align-items-start gap-12px fsh-border-bottom">
                        <div class="d-flex align-items-center gap-6px mt-1">
                            <span class="svg-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.8305 8.7L15.3005 4.17C14.3505 3.22 13.0405 2.71 11.7005 2.78L6.70046 3.02C4.70046 3.11 3.11046 4.7 3.01046 6.69L2.77046 11.69C2.71046 13.03 3.21046 14.34 4.16046 15.29L8.69046 19.82C10.5505 21.68 13.5705 21.68 15.4405 19.82L19.8305 15.43C21.7005 13.58 21.7005 10.56 19.8305 8.7ZM9.50046 12.38C7.91046 12.38 6.62046 11.09 6.62046 9.5C6.62046 7.91 7.91046 6.62 9.50046 6.62C11.0905 6.62 12.3805 7.91 12.3805 9.5C12.3805 11.09 11.0905 12.38 9.50046 12.38Z" fill="#0D0E10"/>
                                </svg>
                            </span>
                            <h5 class="al-title-20px fw-medium lh-1 text-nowrap">{{ get_phrase('Tags') }} :</h5>
                        </div>
                        <ul class="d-flex align-items-center gap-3 flex-wrap">
                           @php 
                            $tags = json_decode($blog_details->keywords, true); 
                        @endphp
                            @if(!empty($tags))
                                @foreach($tags as $tag)
                                    <li>
                                        <a class="btn fsh-sm-btn-secondary" href="javascript:void(0)">
                                            {{ $tag['value'] }}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                       @php
                            $shareUrl = urlencode(url()->current()); 
                            $shareTitle = urlencode($blog_details->title);
                        @endphp

                        <div class="mb-5 pb-3 d-flex align-items-start gap-20px fsh-border-bottom">
                            <h5 class="al-title-20px fw-medium lh-1 text-nowrap">{{ get_phrase('Share :') }}</h5>
                            <ul class="d-flex align-items-center gap-3 flex-wrap">
                                {{-- Facebook --}}
                                <li>
                                    <a class="svg-link d-block"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                                    target="_blank"
                                    title="Share on Facebook">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                                            <path d="M20 10C20 4.47715 15.5229 0 10 0C4.47715 0 0 4.47715 0 10C0 14.9912 3.65684 19.1283 8.4375 19.8785V12.8906H5.89844V10H8.4375V7.79688C8.4375 5.29063 9.93047 3.90625 12.2146 3.90625C13.3084 3.90625 14.4531 4.10156 14.4531 4.10156V6.5625H13.1922C11.95 6.5625 11.5625 7.3334 11.5625 8.125V10H14.3359L13.8926 12.8906H11.5625V19.8785C16.3432 19.1283 20 14.9912 20 10Z" fill="#0D0E10"/>
                                        </svg>
                                    </a>
                                </li>

                                {{-- Twitter (X) --}}
                                <li>
                                    <a class="svg-link d-block"
                                    href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                                    target="_blank"
                                    title="Share on Twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                                            <path d="M11.8616 8.46864L19.147 0H17.4206L11.0947 7.3532L6.04225 0H0.214844L7.85515 11.1193L0.214844 20H1.94134L8.62162 12.2348L13.9574 20H19.7848L11.8612 8.46864H11.8616Z" fill="#0D0E10"/>
                                        </svg>
                                    </a>
                                </li>

                                {{-- Instagram (static) --}}
                                <li>
                                    <a class="svg-link d-block" href="https://www.instagram.com/" target="_blank" title="Open Instagram">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"> <g clip-path="url(#clip0_122_9270)"> <path d="M10 1.80078C12.6719 1.80078 12.9883 1.8125 14.0391 1.85937C15.0156 1.90234 15.543 2.06641 15.8945 2.20313C16.3594 2.38281 16.6953 2.60156 17.043 2.94922C17.3945 3.30078 17.6094 3.63281 17.7891 4.09766C17.9258 4.44922 18.0898 4.98047 18.1328 5.95312C18.1797 7.00781 18.1914 7.32422 18.1914 9.99219C18.1914 12.6641 18.1797 12.9805 18.1328 14.0313C18.0898 15.0078 17.9258 15.5352 17.7891 15.8867C17.6094 16.3516 17.3906 16.6875 17.043 17.0352C16.6914 17.3867 16.3594 17.6016 15.8945 17.7813C15.543 17.918 15.0117 18.082 14.0391 18.125C12.9844 18.1719 12.668 18.1836 10 18.1836C7.32812 18.1836 7.01172 18.1719 5.96094 18.125C4.98438 18.082 4.45703 17.918 4.10547 17.7813C3.64062 17.6016 3.30469 17.3828 2.95703 17.0352C2.60547 16.6836 2.39062 16.3516 2.21094 15.8867C2.07422 15.5352 1.91016 15.0039 1.86719 14.0313C1.82031 12.9766 1.80859 12.6602 1.80859 9.99219C1.80859 7.32031 1.82031 7.00391 1.86719 5.95312C1.91016 4.97656 2.07422 4.44922 2.21094 4.09766C2.39062 3.63281 2.60937 3.29688 2.95703 2.94922C3.30859 2.59766 3.64062 2.38281 4.10547 2.20313C4.45703 2.06641 4.98828 1.90234 5.96094 1.85937C7.01172 1.8125 7.32812 1.80078 10 1.80078ZM10 0C7.28516 0 6.94531 0.0117187 5.87891 0.0585938C4.81641 0.105469 4.08594 0.277344 3.45312 0.523438C2.79297 0.78125 2.23438 1.12109 1.67969 1.67969C1.12109 2.23438 0.78125 2.79297 0.523437 3.44922C0.277344 4.08594 0.105469 4.8125 0.0585938 5.875C0.0117188 6.94531 0 7.28516 0 10C0 12.7148 0.0117188 13.0547 0.0585938 14.1211C0.105469 15.1836 0.277344 15.9141 0.523437 16.5469C0.78125 17.207 1.12109 17.7656 1.67969 18.3203C2.23438 18.875 2.79297 19.2188 3.44922 19.4727C4.08594 19.7188 4.8125 19.8906 5.875 19.9375C6.94141 19.9844 7.28125 19.9961 9.99609 19.9961C12.7109 19.9961 13.0508 19.9844 14.1172 19.9375C15.1797 19.8906 15.9102 19.7188 16.543 19.4727C17.1992 19.2188 17.7578 18.875 18.3125 18.3203C18.8672 17.7656 19.2109 17.207 19.4648 16.5508C19.7109 15.9141 19.8828 15.1875 19.9297 14.125C19.9766 13.0586 19.9883 12.7188 19.9883 10.0039C19.9883 7.28906 19.9766 6.94922 19.9297 5.88281C19.8828 4.82031 19.7109 4.08984 19.4648 3.45703C19.2187 2.79297 18.8789 2.23438 18.3203 1.67969C17.7656 1.125 17.207 0.78125 16.5508 0.527344C15.9141 0.28125 15.1875 0.109375 14.125 0.0625C13.0547 0.0117188 12.7148 0 10 0Z" fill="#0D0E10"/> <path d="M10 4.86316C7.16406 4.86316 4.86328 7.16394 4.86328 9.99988C4.86328 12.8358 7.16406 15.1366 10 15.1366C12.8359 15.1366 15.1367 12.8358 15.1367 9.99988C15.1367 7.16394 12.8359 4.86316 10 4.86316ZM10 13.3319C8.16016 13.3319 6.66797 11.8397 6.66797 9.99988C6.66797 8.16003 8.16016 6.66785 10 6.66785C11.8398 6.66785 13.332 8.16003 13.332 9.99988C13.332 11.8397 11.8398 13.3319 10 13.3319Z" fill="#0D0E10"/> <path d="M16.5391 4.66004C16.5391 5.3241 16 5.85926 15.3398 5.85926C14.6758 5.85926 14.1406 5.32019 14.1406 4.66004C14.1406 3.99597 14.6797 3.46082 15.3398 3.46082C16 3.46082 16.5391 3.99988 16.5391 4.66004Z" fill="#0D0E10"/> </g> <defs> <clipPath id="clip0_122_9270"> <rect width="20" height="20" fill="white"/> </clipPath> </defs> </svg>
                                    </a>
                                </li>

                                {{-- LinkedIn --}}
                                <li>
                                    <a class="svg-link d-block"
                                    href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                                    target="_blank"
                                    title="Share on LinkedIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" fill="none" viewBox="0 0 21 20">
                                            <path d="M19.4477 0H1.55056C0.693241 0 0 0.644531 0 1.44141V18.5547C0 19.3516 0.693241 20 1.55056 20H19.4477C20.305 20 21.0023 19.3516 21.0023 18.5586V1.44141C21.0023 0.644531 20.305 0 19.4477 0ZM6.23097 17.043H3.11343V7.49609H6.23097V17.043ZM4.6722 6.19531C3.67131 6.19531 2.86321 5.42578 2.86321 4.47656C2.86321 3.52734 3.67131 2.75781 4.6722 2.75781C5.66899 2.75781 6.47709 3.52734 6.47709 4.47656C6.47709 5.42188 5.66899 6.19531 4.6722 6.19531ZM17.8971 17.043H14.7837V12.4023C14.7837 11.2969 14.7632 9.87109 13.1634 9.87109C11.5431 9.87109 11.297 11.0781 11.297 12.3242V17.043H8.18763V7.49609H11.1739V8.80078H11.2149C11.6292 8.05078 12.6465 7.25781 14.1602 7.25781C17.3146 7.25781 17.8971 9.23438 17.8971 11.8047V17.043Z" fill="#0D0E10"/>
                                        </svg>
                                    </a>
                                </li>

                                {{-- Google (Redirect to Gmail share) --}}
                                <li>
                                    <a class="svg-link d-block"
                                    href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}"
                                    title="Share via Email">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0373 5.45646C13.0048 4.47171 11.6268 3.93524 10.2012 3.95729C7.59232 3.95729 5.37664 5.71733 4.58662 8.08733C4.16773 9.32929 4.16773 10.6742 4.58662 11.9161H4.59029C5.38397 14.2825 7.59598 16.0426 10.2048 16.0426C11.5515 16.0426 12.7077 15.6981 13.6037 15.0897V15.0872C14.6583 14.3891 15.3785 13.2904 15.6026 12.0485H10.2012V8.19763H19.6335C19.7511 8.86638 19.8062 9.54983 19.8062 10.2296C19.8062 13.2711 18.7192 15.8426 16.8279 17.5843L16.8299 17.5858C15.1727 19.1144 12.8982 19.9999 10.2012 19.9999C6.42016 19.9999 2.96251 17.8687 1.26491 14.4919C-0.153412 11.6663 -0.153408 8.33724 1.26492 5.5116C2.96252 2.13111 6.42016 -8.9051e-05 10.2012 -8.9051e-05C12.6851 -0.0294846 15.0845 0.903824 16.8923 2.60142L14.0373 5.45646Z" fill="#0D0E10"/>
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
<!-- Blog Details Middle Area End -->

@if (!empty($related_blogs) && $related_blogs->count())
<!-- Related Blogs Area Start -->
<section>
    <div class="container">
        <div class="row mb-30px wow animate__fadeInUp" data-wow-delay=".1s">
            <div class="col-12">
                <h1 class="al-title-36px text-center">{{ get_phrase('Related Blogs') }}</h1>
            </div>
        </div>
        <div class="row gx-20px gy-30px mb-100px wow animate__fadeInUp" data-wow-delay=".2s">
            @foreach($related_blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="fsh-blog-card">
                        <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="fsh-blog-banner mb-3">
                            <img class="banner" src="{{ get_image($blog->thumbnail) }}" alt="banner">
                        </a>
                        <div>
                            <p class="al-subtitle2-16px mb-12px">{{ $blog->created_at->format('d M, Y') }}</p>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="al-title-20px mb-20px text-link2">{{ $blog->title }}</a>
                            <a href="{{ route('blog_details', ['slug' => $blog->slug]) }}" class="btn fsh-btn-dark pe-4 icon-right fsh-blog-card-btn">
                                <span>{{ strtoupper(get_phrase('READ MORE')) }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none">
                                    <path d="M17.5303 8.46975L12.2802 3.21975C12.1388 3.08313 11.9493 3.00754 11.7527 3.00924C11.5561 3.01095 11.3679 3.08983 11.2289 3.22889C11.0898 3.36794 11.011 3.55605 11.0092 3.7527C11.0075 3.94935 11.0831 4.1388 11.2198 4.28025L15.1895 8.25H2C1.80109 8.25 1.61032 8.32902 1.46967 8.46967C1.32902 8.61032 1.25 8.80109 1.25 9C1.25 9.19891 1.32902 9.38968 1.46967 9.53033C1.61032 9.67098 1.80109 9.75 2 9.75H15.1895L11.2198 13.7197C11.1481 13.7889 11.091 13.8717 11.0517 13.9632C11.0124 14.0547 10.9917 14.1531 10.9908 14.2527C10.9899 14.3523 11.0089 14.451 11.0466 14.5432C11.0843 14.6354 11.14 14.7191 11.2105 14.7895C11.2809 14.86 11.3646 14.9157 11.4568 14.9534C11.549 14.9911 11.6477 15.0101 11.7473 15.0092C11.8469 15.0083 11.9453 14.9876 12.0368 14.9483C12.1283 14.909 12.2111 14.8519 12.2802 14.7803L17.5303 9.53025C17.6709 9.3896 17.7498 9.19887 17.7498 9C17.7498 8.80113 17.6709 8.6104 17.5303 8.46975Z" fill="white"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blogs Area End -->

@endif

@endsection

@push('js')
@endpush