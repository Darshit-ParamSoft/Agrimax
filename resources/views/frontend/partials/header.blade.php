<!-- Header Start -->
<header class="main-header main-header-style1">

    <style>
        .header-phone-style1 .text p {
            white-space: nowrap;
            margin: 0;
        }
        .header-phone-style1 .text p a {
            white-space: nowrap;
        }
        .main-header-style1__content-top-right {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        }
        .header-phone-style1 {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: nowrap;
        }
        .main-menu__list {
            white-space: nowrap;
        }

        .stricky-header--style1 .main-menu__wrapper {
            padding: 0px 0px !important;
            margin: 0px 0px !important;
        }
    </style>

    <div class="main-header-style1__content">
        <div class="container">
            <div class="main-header-style1__content-inner">

                <!-- Top Bar -->
                <div class="main-header-style1__content-top">

                    <!-- Top Left -->
                    <div class="main-header-style1__content-top-left">
                        {{-- <div class="icon-holder">
                            <i class="icon-wheat"></i>
                        </div> --}}
                        {{-- <div class="text-box">
                            <p><span>Order Today –</span> Straight from Our Farm to You!</p>
                        </div> --}}
                        {{-- <div class="btn-box">
                            <a href="{{ route('contact.index') }}"><i class="icon-arrow"></i></a>
                        </div> --}}
                    </div>

                    <!-- Top Right -->
                    <div class="main-header-style1__content-top-right">
                        <div class="header-phone-style1">
                            <div class="icon">
                                <i class="icon-incoming-call"></i>
                            </div>
                            <div class="text">
                                <p style="white-space: nowrap; margin: 0;"><a href="tel:80045678901">+800 45 6789 01</a> Quality, Just a Call Away!</p>
                            </div>
                        </div>
                        {{-- <div class="header-social-link-style1">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/">
                                        <i class="icon-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://x.com/?lang=en">
                                        <i class="icon-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/">
                                        <i class="icon-instagram-logo"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/">
                                        <i class="icon-youtube"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="main-header-style1__content-bottom">

                    <!-- Left Side -->
                    <div class="main-header-style1__content-bottom-left">
                        <!-- Logo -->
                        <div class="header-logo-box-style1">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('frontend/theme/assets/images/resources/logo-1.png') }}" alt="Farmland Logo">
                            </a>
                        </div>

                        <!-- Main Navigation -->
                        <nav class="main-menu main-menu-style1">
                            <div class="main-menu__wrapper clearfix">
                                <div class="main-menu__wrapper-inner">
                                    <!-- Sticky Logo -->
                                    <div class="sticky-logo-box-style1">
                                        <a href="{{ route('home') }}">
                                            <img src="{{ asset('frontend/theme/assets/images/resources/stricky-v1-1.png') }}" alt="Farmland Logo">
                                        </a>
                                    </div>

                                    <!-- Menu Items -->
                                    <div class="main-menu-style1__left">
                                        <div class="main-menu-box">
                                            <a href="#" class="mobile-nav__toggler">
                                                <i class="fa fa-bars"></i>
                                            </a>

                                            <ul class="main-menu__list">
                                                <!-- Home -->
                                                <li class="dropdown {{ request()->routeIs('home') ? 'current' : '' }}">
                                                    <a href="{{ route('home') }}">Home</a>
                                                </li>

                                                <!-- Products -->
                                                <li class="dropdown {{ request()->routeIs('products-list.*') || request()->routeIs('other-products-list.*') ? 'current' : '' }}">
                                                    <a href="{{ route('products-list.index') }}">Products</a>
                                                    <ul>
                                                        <li><a href="{{ route('products-list.index') }}">Main Products</a></li>
                                                        <li><a href="{{ route('other-products-list.index') }}">Other Products</a></li>
                                                    </ul>
                                                </li>

                                                <!-- About -->
                                                    <li class="dropdown {{ request()->routeIs('about.*') ? 'current' : '' }}">
                                                    <a href="{{ route('about.index') }}">About us</a>
                                                    </li>

                                                    <!-- Certificate -->
                                                    <li class="dropdown {{ request()->routeIs('certificate.*') ? 'current' : '' }}">
                                                    <a href="{{ route('certificate.index') }}">Certificate</a>
                                                    </li>

                                                    <!-- MACHINE & STORAGE AREA -->
                                                    <li class="dropdown {{ request()->routeIs('machine-storage.*') ? 'current' : '' }}">
                                                    <a href="{{ route('machine-storage.index') }}">Machine & Storage</a>
                                                    </li>

                                                    <!-- Join Us -->
                                                    <li class="dropdown {{ request()->routeIs('join-us.*') ? 'current' : '' }}">
                                                    <a href="{{ route('join-us.index') }}">Join Us</a>
                                                    </li>

                                                    <!-- Contact Us -->
                                                    <li class="dropdown {{ request()->routeIs('contact-us.*') ? 'current' : '' }}">
                                                    <a href="{{ route('contact-us.index') }}">Contact Us</a>
                                                    </li>

                                                <!-- Services -->
                                                {{-- <li class="dropdown">
                                                    <a href="{{ route('services.index') }}">Services</a>
                                                    <ul>
                                                        <li><a href="{{ route('services.index') }}">View all Services</a></li>
                                                        <li><a href="{{ route('services.show', 'fresh-produce') }}">Fresh Produce</a></li>
                                                        <li><a href="{{ route('services.show', 'dairy-products') }}">Dairy Products</a></li>
                                                        <li><a href="{{ route('services.show', 'livestock') }}">Livestock</a></li>
                                                        <li><a href="{{ route('services.show', 'poultry-eggs') }}">Poultry & Eggs</a></li>
                                                        <li><a href="{{ route('services.show', 'grains-cereals') }}">Grains & Cereals</a></li>
                                                        <li><a href="{{ route('services.show', 'herbs-spices') }}">Herbs & Spices</a></li>
                                                    </ul>
                                                </li> --}}

                                                <!-- Blog -->
                                                {{-- <li class="dropdown">
                                                    <a href="{{ route('blog.index') }}">Blog</a>
                                                    <ul>
                                                        <li><a href="{{ route('blog.index') }}">All Posts</a></li>
                                                    </ul>
                                                </li> --}}

                                                <!-- Shop -->
                                                {{-- <li class="dropdown">
                                                    <a href="{{ route('shop.index') }}">Shop</a>
                                                    <ul>
                                                        <li><a href="{{ route('shop.index') }}">Products</a></li>
                                                        <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                                                        <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                                                        @auth
                                                        <li><a href="{{ route('account.index') }}">My Account</a></li>
                                                        @endauth
                                                    </ul>
                                                </li> --}}

                                                <!-- Contact -->
                                                {{-- <li>
                                                    <a href="{{ route('contact.index') }}">Contact</a>
                                                </li> --}}
                                            </ul>
                                        </div>

                                        <!-- CTA Button -->
                                        {{-- <div class="header-btn-style1 header-sticky-btn-one">
                                            <a class="btn-one" href="{{ route('contact.index') }}">
                                                <i class="icon-arrow"></i>
                                                <span class="txt">Book a Tour</span>
                                            </a>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <!-- Right Side -->
                    {{-- <div class="main-header-style1__content-bottom-right">
                        <!-- Search Icon -->
                        <div class="box-search-style1">
                            <a href="#" class="search-toggler">
                                <span class="icon-search"></span>
                            </a>
                        </div>

                        <!-- Cart Icon -->
                        <div class="header-cart-btn-style1">
                            <div class="cart-icon">
                                <span class="icon-empty-cart"></span>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="header-btn-style1">
                            <a class="btn-one" href="{{ route('contact.index') }}">
                                <i class="icon-arrow"></i>
                                <span class="txt">Book a Tour</span>
                            </a>
                        </div>

                        <!-- Location -->
                        <div class="header-address-style1">
                            <div class="icon">
                                <img src="{{ asset('frontend/theme/assets/images/icon/address-icon1.png') }}" alt="Location Icon">
                            </div>
                            <div class="text">
                                <h4>Brisbane, QLD 4000</h4>
                            </div>
                            <a href="{{ route('contact.index') }}" class="btn-box1">
                                <i class="icon-arrow"></i>
                            </a>
                        </div>

                    </div> --}}

                </div>
            </div>
        </div>
    </div>

</header>

<!-- Sticky Header -->
<div class="stricky-header stricky-header--style1 stricked-menu main-menu">
    <div class="sticky-header__content"></div>
</div>
<!-- End Header -->
