<!-- Footer Start -->
<footer class="footer-style1">

    <!-- Footer Main -->
    <div class="footer-main">
        <div class="container">
            <div class="row">

                <!-- About Widget -->
                <div class="col-xl-3 col-lg-6 col-md-6 single-widget">
                    <div class="single-footer-widget">
                        <div class="single-footer-widget-about">
                            <div class="footer-logo-style1">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('frontend/theme/assets/images/resources/footer-1-logo-1.png') }}" alt="Farmland">
                                </a>
                            </div>
                            <div class="single-footer-widget-about-text">
                                <p>India's premium nutri-cereal and spice exporters since 2005. Delivering quality with a zero-complaint track record.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Widget -->
                <div class="col-xl-3 col-lg-6 col-md-6 single-widget">
                    <div class="single-footer-widget">
                        <div class="title">
                            <h3>Products</h3>
                            <div class="border-dot"></div>
                        </div>
                        <div class="footer-widget-useful-links">
                            <ul>
                                <li>
                                    <a href="{{ route('services.show', 'fresh-produce') }}">
                                        <i class="icon-corn"></i>
                                        Fresh Produce
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.show', 'dairy-products') }}">
                                        <i class="icon-corn"></i>
                                        Dairy Products
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.show', 'livestock') }}">
                                        <i class="icon-corn"></i>
                                        Livestock Products
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.show', 'poultry-eggs') }}">
                                        <i class="icon-corn"></i>
                                        Organic Farming
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.show', 'grains-cereals') }}">
                                        <i class="icon-corn"></i>
                                        Grains & Cereals
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services.show', 'poultry-eggs') }}">
                                        <i class="icon-corn"></i>
                                        Poultry
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Mobile App Widget -->
                <div class="col-xl-3 col-lg-6 col-md-6 single-widget">
                    <div class="single-footer-widget">
                        <div class="title">
                            <h3>Our Divisions</h3>
                            <div class="border-dot"></div>
                        </div>
                        <div class="footer-widget-mobile-app">
                            <div class="footer-widget-mobile-app-bottom">
                                <p style="border-bottom: 3px solid #FFC107; display: inline-block; font-weight: 600;">Agrimax Divisions</p>
                                <div class="footer-widget-about-certification-title">
                                    <h4>Sesame Seeds, Cumin Seeds, Coriander, Maize</h4>
                                </div>
                                <br>
                                <p style="border-bottom: 3px solid #FFC107; display: inline-block; font-weight: 600; margin-top: 12px;">Maxwell Divisions</p>
                                <div class="footer-widget-about-certification-title">
                                    <h4>Green Mung, Dry Ginger, Chillies, Premium Spices</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Posts Widget -->
                <div class="col-xl-3 col-lg-6 col-md-6 single-widget">
                    <div class="single-footer-widget">
                        <div class="title">
                            <h3>Contact Us</h3>
                            <div class="border-dot"></div>
                        </div>
                        <div class="footer-widget-useful-links">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset('frontend/theme/assets/images/icon/location.png') }}" alt="Location Icon" style="width: 16px; height: 16px; margin-right: 8px;">
                                        123 Main Street, City, Country
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:+1234567890">
                                        <img src="{{ asset('frontend/theme/assets/images/icon/phone.png') }}" alt="Phone Icon" style="width: 16px; height: 16px; margin-right: 8px;">
                                        +1 (234) 567-890
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:info@example.com">
                                        <img src="{{ asset('frontend/theme/assets/images/icon/mail.png') }}" alt="Email Icon" style="width: 16px; height: 16px; margin-right: 8px;">
                                        info@example.com
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="copyright-text">
                    <p>
                        Copyrights © {{ date('Y') }} <a href="{{ route('home') }}">Agrimax</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="footer-menu">
                    <ul class="clearfix">
                        <li>
                            <a href="{{ route('about.index') }}">Return Policy</a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}">Terms & Conditions</a>
                        </li>
                        <li>
                            <a href="{{ route('about.index') }}">Shipping & Delivery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</footer>
