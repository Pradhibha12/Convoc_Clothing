@php $current_route = Route::currentRouteName(); @endphp

<div class="sidebar-logo-area">
    <a href="javascript:;" class="sidebar-logos">
        <img class="sidebar-logo-lg" height="50px" src="{{ get_image(get_frontend_settings('dark_logo')) }}" alt="">
        <img class="sidebar-logo-sm" height="40px" src="{{ get_image(get_frontend_settings('favicon')) }}" alt="">
    </a>
    <button class="sidebar-cross menu-toggler d-block d-lg-none">
        <span class="fi-rr-cross"></span>
    </button>
</div>
<h3 class="sidebar-title fs-12px px-30px pb-20px mt-4 text-uppercase">{{ get_phrase('Main Menu') }}</h3>
<div class="sidebar-nav-area">

    <nav class="sidebar-nav">
        <ul class="px-14px pb-24px">
            <li class="sidebar-first-li {{ $current_route == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon fi-rr-apps"></span>
                    <div class="text">
                        <span>{{ get_phrase('Dashboard') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Order Management') }}</h3>
        <ul class="px-14px pb-24px">
            <li class="sidebar-first-li {{ $current_route == 'admin.orders' || $current_route == 'admin.order.details' || $current_route == 'admin.order.add' ? 'active' : '' }}">
                <a href="{{ route('admin.orders') }}">
                    <span class="icon fi-rr-clipboard-list-check"></span>
                    <div class="text">
                        <span>{{ get_phrase('Orders') }}</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-first-li {{ $current_route == 'admin.order.return_requests'  || $current_route == 'admin.order.return_details' ? 'active' : '' }}">
                <a href="{{ route('admin.order.return_requests') }}">
                    <span class="icon fi-rr-house-laptop"></span>
                    <div class="text">
                        <span>{{ get_phrase('Return Requests') }}</span>
                    </div>
                </a>
            </li>
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.payments' || $current_route == 'admin.payment.invoice' || $current_route == 'admin.payments.offline_request' ) active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-usd-circle"></span>
                    <div class="text">
                        <span>{{ get_phrase('Payments') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payments') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.payments' || $current_route == 'admin.payment.invoice' || $current_route == 'admin.revenue') active @endif">
                        <a href="{{ route('admin.payments') }}">{{ get_phrase('Payment History') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.payments.offline_request') active @endif">
                        <a href="{{ route('admin.payments.offline_request') }}">{{ get_phrase('Pending request(Offline)') }}</a>
                    </li>
                </ul>
            </li>

             <li class="sidebar-first-li first-li-have-sub @if ( $current_route == 'admin.vendor.settings' || $current_route == 'admin.vendor.payout' ) active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi fi-rr-file-invoice-dollar"></span>
                    <div class="text">
                        <span>{{ get_phrase('Payouts') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Payouts') }}</li>
                     <li class="sidebar-second-li @if ($current_route == 'admin.vendor.payout') active @endif">
                        <a href="{{ route('admin.vendor.payout') }}">{{ get_phrase('Vendor Payout') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.vendor.settings') active @endif">
                        <a href="{{ route('admin.vendor.settings') }}">{{ get_phrase('Revenue Settings') }}</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-first-li {{ $current_route == 'admin.order.statuses'  || $current_route == 'admin.order.status_edit' || $current_route == 'admin.order.status_add' ? 'active' : '' }}">
                <a href="{{ route('admin.order.statuses') }}">
                    <span class="icon  fi-rr-chart-pyramid"></span>
                    <div class="text">
                        <span>{{ get_phrase('Manage Status') }}</span>
                    </div>
                </a>
            </li>

            <li class="sidebar-first-li first-li @if ($current_route == 'admin.pos.sales.index') active @endif">
                <a href="{{ route('admin.pos.sales.index') }}">
                    <span class="icon fi-rr-box-open-full"></span>
                    <div class="text">
                        <span>{{ get_phrase('POS') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Product Management') }}</h3>
        <ul class="px-14px pb-24px">

            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.categories' || $current_route == 'admin.category.add' || $current_route == 'admin.category.edit' || $current_route == 'admin.attribute_types' || $current_route == 'admin.attribute_type.edit' || $current_route == 'admin.attribute_type.add' || $current_route == 'admin.attributes') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-chart-tree-map"></span>
                    <div class="text">
                        <span>{{ get_phrase('Category') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Category') }}</li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.categories' || $current_route == 'admin.category.edit' || $current_route == 'admin.category.add') active @endif">
                        <a href="{{ route('admin.categories') }}">{{ get_phrase('Categories') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.attribute_types' || $current_route == 'admin.attribute_type.edit' || $current_route == 'admin.attribute_type.add' || $current_route == 'admin.attributes') active @endif">
                        <a href="{{ route('admin.attribute_types') }}">{{ get_phrase('Attributes') }}</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.products' || $current_route == 'admin.product.add' || $current_route == 'admin.product.edit' || $current_route == 'admin.coupons' || $current_route == 'admin.coupon.add' || $current_route == 'admin.coupon.edit') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-box-open-full"></span>
                    <div class="text">
                        <span>{{ get_phrase('Product') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Product') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.products' || $current_route == 'admin.product.add' || $current_route == 'admin.product.edit') active @endif">
                        <a href="{{ route('admin.products') }}">{{ get_phrase('Products') }}</a>
                    </li>
                </ul>
            </li>

          <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.stores' || $current_route == 'admin.store.add' ||  $current_route == 'admin.store.edit' || $current_route == 'admin.store.profile'|| $current_route == 'admin.store.settings' || $current_route == 'admin.vendor.application') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-home-location"></span>
                    <div class="text">
                        <span>{{ get_phrase('Store Management') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Store Management') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.stores' || $current_route == 'admin.store.add' || $current_route == 'admin.store.edit') active @endif">
                        <a href="{{ route('admin.stores') }}">{{ get_phrase('Store List') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.store.profile') active @endif">
                        <a href="{{ route('admin.store.profile') }}">{{ get_phrase('My store profile') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.store.settings') active @endif">
                        <a href="{{ route('admin.store.settings') }}">{{ get_phrase('My store settings') }}</a>
                    </li>
                    <li class="sidebar-second-li @if ($current_route == 'admin.vendor.application') active @endif">
                        <a href="{{ route('admin.vendor.application') }}">{{ get_phrase('Application') }}</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-first-li {{ $current_route == 'admin.brands' || $current_route == 'admin.brand.edit' || $current_route == 'admin.brand.add' ? 'active' : '' }}">
                <a href="{{ route('admin.brands') }}">
                    <span class="icon fi-rr-badge-sheriff"></span>
                    <div class="text">
                        <span>{{ get_phrase('Brands') }}</span>
                    </div>
                </a>
            </li>

            <li class="sidebar-first-li {{ $current_route == 'admin.events' || $current_route == 'admin.event.add' || $current_route == 'admin.event.edit' ? 'active' : '' }}">
                <a href="{{ route('admin.events') }}">
                    <span class="icon fi-rr-stopwatch"></span>
                    <div class="text">
                        <span>{{ get_phrase('Events') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Website') }}</h3>
        <ul class="px-14px pb-24px">
            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.customers' || $current_route == 'admin.customer.add' || $current_route == 'admin.customer.edit' || $current_route == 'admin.staffs' || $current_route == 'admin.staff.add' || $current_route == 'admin.staff.edit' || $current_route == 'admin.roles' || $current_route == 'admin.role.add' || $current_route == 'admin.role.edit' ) active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-users-alt"></span>
                    <div class="text">
                        <span>{{ get_phrase('User') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Users') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.customers' || $current_route == 'admin.customer.add' || $current_route == 'admin.customer.edit') active @endif">
                        <a href="{{ route('admin.customers') }}">{{ get_phrase('Customers') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.staffs' || $current_route == 'admin.staff.add' || $current_route == 'admin.staff.edit') active @endif">
                        <a href="{{ route('admin.staffs') }}">{{ get_phrase('Staffs') }}</a>
                    </li>

                </ul>
            </li>
            <li class="sidebar-first-li {{ $current_route == 'admin.messages' ? 'active' : '' }}">
                <a href="{{ route('admin.messages') }}">
                    <span class="icon fi-rr-messages"></span>
                    <div class="text">
                        <span>{{ get_phrase('Message') }}</span>
                    </div>
                    @php
                        $count_unread_message = App\Models\Message::where('read_status', 0)
                            ->where(function ($query) {
                                $query->where('sender_id', auth()->user()->id)->orWhere('receiver_id', auth()->user()->id);
                            })
                            ->count();
                    @endphp
                    @if ($count_unread_message > 0)
                        <span class="d-inline-block mt-2px badge bg-danger ms-auto">
                            {{ $count_unread_message }}
                        </span>
                    @endif
                </a>
            </li>


            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.blogs' || $current_route == 'admin.blog.add' || $current_route == 'admin.blog.edit' || $current_route == 'admin.blog.categories' || $current_route == 'admin.blog.category.add' || $current_route == 'admin.blog.category.edit') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-blog-text"></span>
                    <div class="text">
                        <span>{{ get_phrase('Blog') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Blog') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.blogs' || $current_route == 'admin.blog.add' || $current_route == 'admin.blog.edit') active @endif">
                        <a href="{{ route('admin.blogs') }}">{{ get_phrase('Blogs') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.blog.categories' || $current_route == 'admin.blog.category.add' || $current_route == 'admin.blog.category.edit') active @endif">
                        <a href="{{ route('admin.blog.categories') }}">{{ get_phrase('Categories') }}</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.countries' || $current_route == 'admin.country.add' || $current_route == 'admin.country.edit' || $current_route == 'admin.states' || $current_route == 'admin.state.add' || $current_route == 'admin.state.edit' || $current_route == 'admin.cities' || $current_route == 'admin.city.add' || $current_route == 'admin.city.edit') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-location-alt"></span>
                    <div class="text">
                        <span>{{ get_phrase('Location') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Locations') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.countries' || $current_route == 'admin.country.add' || $current_route == 'admin.country.edit') active @endif">
                        <a href="{{ route('admin.countries') }}">{{ get_phrase('Countries') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.states' || $current_route == 'admin.state.add' || $current_route == 'admin.state.edit') active @endif">
                        <a href="{{ route('admin.states') }}">{{ get_phrase('States') }}</a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.cities' || $current_route == 'admin.city.add' || $current_route == 'admin.city.edit') active @endif">
                        <a href="{{ route('admin.cities') }}">{{ get_phrase('Cities') }}</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-first-li first-li-have-sub @if ($current_route == 'admin.contacts' || $current_route == 'admin.contact.settings') active showMenu @endif">
                <a href="javascript:void(0);">
                    <span class="icon fi-rr-lock-alt"></span>
                    <div class="text">
                        <span>{{ get_phrase('Contact Us') }}</span>
                        @php
                            $unread_contacts = App\Models\Contact::where('is_read', 0)->count()
                        @endphp
                        @if($unread_contacts > 0)
                            <span class="badge bg-danger">
                                {{$unread_contacts}}
                            </span>
                        @endif
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('Contact Us') }}</li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.contacts' || $current_route == 'admin.contacts.add' || $current_route == 'admin.contacts.edit') active @endif">
                        <a href="{{ route('admin.contacts') }}">
                            {{ get_phrase('Contact List') }}
                            @if($unread_contacts > 0)
                                ({{$unread_contacts}})
                            @endif
                        </a>
                    </li>

                    <li class="sidebar-second-li @if ($current_route == 'admin.contact.settings') active @endif">
                        <a href="{{ route('admin.contact.settings') }}">{{ get_phrase('Contact settings') }}</a>
                    </li>

                </ul>
            </li>

        </ul>
    </nav>








    <nav class="sidebar-nav">
        <h3 class="sidebar-title fs-12px px-30px pb-3 text-uppercase">{{ get_phrase('Settings') }}</h3>
        <ul class="px-14px pb-24px pb-5 mb-5">
            <li class="sidebar-first-li first-li-have-sub {{ $current_route == 'admin.system.settings' || $current_route == 'admin.website.settings' || $current_route == 'admin.settings' || $current_route == 'admin.smtp.settings' || $current_route == 'admin.payment.settings' || $current_route == 'admin.seo.settings' || $current_route == 'admin.about' || $current_route == 'admin.pages' || $current_route == 'admin.page.add' || $current_route == 'admin.page.edit' || $current_route == 'admin.languages' || $current_route == 'admin.language.edit' || $current_route == 'admin.themes' || $current_route == 'admin.theme.edit' || $current_route == 'admin.language.phrases.edit' ? 'active' : '' }}">
                <a href="javascript:void(0);">
                    <span class="icon fi fi-rr-settings"></span>
                    <div class="text">
                        <span>{{ get_phrase('Settings') }}</span>
                    </div>
                </a>
                <ul class="first-sub-menu">
                    <li class="first-sub-menu-title fs-14px mb-18px">{{ get_phrase('System Settings') }}</li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.system.settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.system.settings') }}">{{ get_phrase('System Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.website.settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.website.settings') }}">{{ get_phrase('Website Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.themes' || $current_route == 'admin.theme.edit' ? 'active' : '' }}">
                        <a href="{{ route('admin.themes') }}">{{ get_phrase('Frontend themes') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.smtp.settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.smtp.settings') }}">{{ get_phrase('SMTP Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.payment.settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.payment.settings') }}">{{ get_phrase('Payment Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.languages' || $current_route == 'admin.language.edit' || $current_route == 'admin.language.phrases.edit' ? 'active' : '' }}">
                        <a href="{{ route('admin.languages') }}">{{ get_phrase('Languages') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.seo.settings' ? 'active' : '' }}">
                        <a href="{{ route('admin.seo.settings') }}">{{ get_phrase('SEO Settings') }}</a>
                    </li>
                    <li class="sidebar-second-li {{ $current_route == 'admin.about' ? 'active' : '' }}">
                        <a href="{{ route('admin.about') }}">{{ get_phrase('About') }}</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-first-li {{ $current_route == 'admin.profile' ? 'active' : '' }}">
                <a href="{{ route('admin.profile') }}">
                    <span class="icon fi-rr-clipboard-user"></span>
                    <div class="text">
                        <span>{{ get_phrase('Profile') }}</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>


<script>
    "use strict";

    document.addEventListener("DOMContentLoaded", function() {
        // Restore scroll position if it exists in localStorage
        const scrollPos = localStorage.getItem('navScrollPos');
        const sidebarNavArea = document.querySelector('.sidebar-nav-area');
        if (scrollPos) {
            sidebarNavArea.scrollTop = scrollPos;
        }

        // Ensure the active element is visible
        const activeElement = document.querySelector('.sidebar-nav-area .active');
        if (activeElement) {
            const activeElementTop = activeElement.getBoundingClientRect().top;
            const navAreaTop = sidebarNavArea.getBoundingClientRect().top;
            const navAreaBottom = navAreaTop + sidebarNavArea.clientHeight;

            if (activeElementTop < navAreaTop || activeElementTop > navAreaBottom) {
                sidebarNavArea.scrollTop = activeElement.offsetTop - sidebarNavArea.offsetTop;
            }
        }

        // Save scroll position before page unload
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('navScrollPos', sidebarNavArea.scrollTop);
        });
    });
</script>
