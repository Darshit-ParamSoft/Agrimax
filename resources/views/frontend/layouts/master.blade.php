<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Farmland || Responsive Agricultural Platform')</title>

    <!-- Favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/theme/assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/theme/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/theme/assets/images/favicons/favicon-16x16.png') }}" />
    <meta name="description" content="@yield('meta_description', 'Farmland - Your trusted agricultural platform')" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/aos/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/fancybox/fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/nice-select/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/vendor/thm-icons/style.css') }}" />

    <!-- Module CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/01-header-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/02-banner-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/03-about-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/04-fact-counter-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/05-testimonial-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/06-partner-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/07-footer-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/08-blog-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/09-breadcrumb-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/10-contact.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/11-services-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/12-shop.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/module-css/13-team-section.css') }}" />

    <!-- Quality & Compliance Styles -->
    <link rel="stylesheet" href="{{ asset('css/quality-compliance.css') }}" />

    <!-- Template styles -->
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/theme/assets/css/responsive.css') }}" />

    @stack('css')
</head>

<body class="body-bg-1">

    <!-- Global Notification Container -->
    <div id="global-notification-container" style="position: fixed; top: 20px; right: 20px; z-index: 10000000; pointer-events: none;"></div>
    <!-- End Global Notification Container -->

    <!-- Preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div id="handle-preloader" class="handle-preloader">
                <div class="layer layer-one">
                    <span class="overlay"></span>
                </div>
                <div class="layer layer-three">
                    <span class="overlay"></span>
                </div>
                <div class="layer layer-two">
                    <span class="overlay"></span>
                </div>
                <div class="animation-preloader">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!-- Cursor End -->

    <div class="page-wrapper boxed_wrapper">

        <!-- Header -->
        @include('frontend.partials.header')
        <!-- End Header -->

        @yield('content')

        <!-- Footer -->
        @include('frontend.partials.footer')
        <!-- End Footer -->

    </div>
    <!-- /.page-wrapper -->

    <!-- Mobile Nav Wrapper -->
    @include('frontend.partials.mobile-nav')
    <!-- End Mobile Nav Wrapper -->

    <!-- Search Popup -->
    @include('frontend.partials.search-popup')
    <!-- End Search Popup -->

    <!-- Scroll to top -->
    <div class="scroll-to-top">
        <div>
            <div class="scroll-top-inner">
                <div class="scroll-bar">
                    <div class="bar-inner"></div>
                </div>
                <div class="scroll-bar-text">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to top End -->

    <!-- Vendor JS -->
    <script src="{{ asset('frontend/theme/assets/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/isotope/isotope.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/wow/wow.js') }}"></script>

    <!-- Gsap JS files -->
    <script src="{{ asset('frontend/theme/assets/vendor/gsap/gsap.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/gsap/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/gsap/SplitText.js') }}"></script>

    <script src="{{ asset('frontend/theme/assets/vendor/extra-scripts/extra-scripts.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/curved-text/jquery.circleType.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/curved-text/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('frontend/theme/assets/vendor/curved-text/jquery.fittext.js') }}"></script>

    <!-- Template js -->
    <script src="{{ asset('frontend/theme/assets/js/custom.js') }}"></script>

    <script>
    window.showNotification = function(message, type = 'success', duration = 5000) {
        const container = document.getElementById('global-notification-container');

        const notification = document.createElement('div');
        const bgColor = type === 'success' ? '#d4edda' : '#f8d7da';
        const borderColor = type === 'success' ? '#c3e6cb' : '#f5c6cb';
        const textColor = type === 'success' ? '#155724' : '#721c24';
        const icon = type === 'success' ? '<i class="fas fa-check-circle" style="margin-right: 8px;"></i>' : '<i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>';

        notification.style.cssText = `
            background-color: ${bgColor};
            border: 1px solid ${borderColor};
            color: ${textColor};
            padding: 15px 20px;
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            max-width: 300px;
            margin-bottom: 10px;
            animation: slideIn 0.3s ease-out;
            pointer-events: auto;
            display: flex;
            align-items: center;
        `;

        notification.innerHTML = `${icon}<span>${message}</span>`;
        container.insertBefore(notification, container.firstChild);

        // Auto remove after duration
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, duration);
    };

    // Add animation styles
    if (!document.getElementById('notification-styles')) {
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
    </script>

    @stack('js')

</body>

</html>
