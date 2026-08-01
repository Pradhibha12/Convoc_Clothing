<!-- Header -->
<div class="ol-header print-d-none d-flex align-items-center justify-content-between py-2 ps-3">
    <div class="header-title-menubar d-flex align-items-center">
        <button class="menu-toggler sidebar-plus">
            <span class="fi-rr-menu-burger"></span>
        </button>
       

        <div class="main-header-title">
            <h1 class="page-title fs-18px d-flex align-items-center gap-3">
                {{ $page_title ?? '' }}
            </h1>
           
        </div>
       
    </div>
    <div class="header-content-right d-flex align-items-center justify-content-end">
        
        <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('View site') }}">
             <a href="{{route('home')}}" target="_blank"  class="btn btn-sm pt-0 dropdown-toggle  text-14px text-muted">
                <i class="fi-rr-arrow-up-right-from-square text-20px text-muted"></i>
            </a>
           
        </div>
        <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ get_phrase('Help Center') }}">
            <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fi-rr-messages-question text-20px"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <div class="p-2">
                    <h5 class="title text-14px">{{ get_phrase('Help center') }}</h6>
                </div>
                <li>
                    <a href="https://creativeitem.com/docs/academy-lms" target="_blank" class="dropdown-item">
                        <i class="fi-rr-document-signed"></i>
                        <span>{{ get_phrase('Read documentation') }}</span>
                    </a>
                </li>

                <li>
                    <a href="https://www.youtube.com/watch?v=-HHhJUGQPeU&list=PLR1GrQCi5Zqvhh7wgtt-ShMAM1RROYJgE" target="_blank" class="dropdown-item">
                        <i class="fi-rr-video-arrow-up-right"></i>
                        <span>{{ get_phrase('Watch video tutorial') }}</span>
                    </a>
                </li>

                <li>
                    <a href="https://support.creativeitem.com" target="_blank" class="dropdown-item">
                        <i class="fi-rr-envelope-plus"></i>
                        <span>{{ get_phrase('Get customer support') }}</span>
                    </a>
                </li>

                <li>
                    <a href="https://support.creativeitem.com" target="_blank" class="dropdown-item">
                        <i class="fi-rr-box-up"></i>
                        <span>{{ get_phrase('Order customization') }}</span>
                    </a>
                </li>

                <li>
                    <a href="https://support.creativeitem.com" target="_blank" class="select-text text-capitalize">
                        <i class="fi-rr-add"></i>
                        <span>{{ get_phrase('Request a new feature') }}</span>
                    </a>
                </li>
                <li>
                    <a href="https://creativeitem.com/services" target="_blank" class="text-premium select-text text-capitalize d-flex align-items-center">
                        <i class="fi-rr-settings-sliders me-1"></i>
                        <span>{{ get_phrase('Get Services') }}</span>
                        <i class="fi-rr-crown ms-auto"></i>
                    </a>
                </li>
            </ul>
        </div>


        <!-- Profile -->
        <div class="header-dropdown-md">
            <button class="header-dropdown-toggle-md" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-profile-sm">
                    <img src="{{get_image(auth()->user()->photo)}}" alt="">
                </div>
            </button>
            <div class="header-dropdown-menu-md p-3">
                <div class="d-flex column-gap-2 mb-12px pb-12px ol-border-bottom-2">
                    <div class="user-profile-sm">
                        <img src="{{get_image(auth()->user()->photo)}}" alt="">
                    </div>
                    <div>
                        <h6 class="title fs-12px mb-2px">{{ auth()->user()->name }}</h6>
                        <p class="sub-title fs-12px">{{ auth()->user()->user_type }}</p>
                    </div>
                </div>
                <ul class="mb-12px pb-12px ol-border-bottom-2">
                    <li class="dropdown-list-1"><a class="dropdown-item-1" href="{{route('admin.profile')}}">{{ get_phrase('My Profile') }}</a></li>
                    <li class="dropdown-list-1"><a class="dropdown-item-1" href="{{route('admin.system.settings')}}">{{ get_phrase('Settings') }}</a></li>
                </ul>
                <ul>
                    <li class="dropdown-list-1"><a class="dropdown-item-1" href="{{ route('logout') }}">{{ get_phrase('Log Out') }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
