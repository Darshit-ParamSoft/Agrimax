<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20">
            </span>
        </a>

        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="uil-home-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categories.index') }}" class="waves-effect">
                            <i class="uil-folder"></i>
                            <span>Categories</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="uil-box"></i>
                            <span>Products</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('products.index') }}">All Products</a></li>
                            <li><a href="{{ route('product-images.index') }}">Manage Images</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('home-sections.index') }}" class="waves-effect">
                            <i class="uil-home"></i>
                            <span>Home Content</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carousel.index') }}" class="waves-effect">
                            <i class="uil-image-v"></i>
                            <span>Product Carousel</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('certificates.index') }}" class="waves-effect">
                            <i class="uil-award"></i>
                            <span>Certificates</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('careers.index') }}" class="waves-effect">
                            <i class="uil-briefcase"></i>
                            <span>Careers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact-settings.index') }}" class="waves-effect">
                            <i class="uil-envelope"></i>
                            <span>Contact Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('enquiries.index') }}" class="waves-effect">
                            <i class="uil-message"></i>
                            <span>Enquiries</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('applications.index') }}" class="waves-effect">
                            <i class="uil-file-alt"></i>
                            <span>Applications</span>
                        </a>
                    </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-window-section"></i>
                        <span>@lang('translation.Layouts')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">@lang('translation.Vertical')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-dark-sidebar">@lang('translation.Dark_Sidebar')</a></li>
                                <li><a href="layouts-compact-sidebar">@lang('translation.Compact_Sidebar')</a></li>
                                <li><a href="layouts-icon-sidebar">@lang('translation.Icon_Sidebar')</a></li>
                                <li><a href="layouts-boxed">@lang('translation.Boxed_Width')</a></li>
                                <li><a href="layouts-preloader">@lang('translation.Preloader')</a></li>
                                <li><a href="layouts-colored-sidebar">@lang('translation.Colored_Sidebar')</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">@lang('translation.Horizontal')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal">@lang('translation.Horizontal')</a></li>
                                <li><a href="layouts-hori-topbar-dark">@lang('translation.Dark_Topbar')</a></li>
                                <li><a href="layouts-hori-boxed-width">@lang('translation.Boxed_Width')</a></li>
                                <li><a href="layouts-hori-preloader">@lang('translation.Preloader')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

                    {{-- <li>
                        <a href="{{ route('roles.index') }}" class="waves-effect">
                            <i class="uil-comments-alt"></i>
                            <span>Role</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('permissions.index') }}" class="waves-effect">
                            <i class="uil-comments-alt"></i>
                            <span>Permission</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('auth.settings') }}" class="waves-effect">
                            <i class="uil-comments-alt"></i>
                            <span>Auth Setting</span>
                        </a>
                    </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
