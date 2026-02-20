<!-- Mobile Navigation -->
<div class="mobile-nav__wrapper">
    <!-- Mobile Nav Overlay -->
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>

    <!-- Mobile Nav Content -->
    <div class="mobile-nav__content">
        <!-- Close Button -->
        <span class="mobile-nav__close mobile-nav__toggler">
            <i class="fa fa-times-circle"></i>
        </span>

        <!-- Logo -->
        <div class="logo-box">
            <a href="{{ route('home') }}" aria-label="logo image">
                <img src="{{ asset('frontend/theme/assets/images/resources/mobile-nav-logo-1.png') }}" alt="Farmland Logo" />
            </a>
        </div>

        <!-- Search Box -->
        <div class="mobile-nav-search-box">
            <form class="search-form" action="#">
                <input placeholder="Keyword" type="text" />
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Mobile Nav Container (Menu will be added via JS) -->
        <div class="mobile-nav__container"></div>

        <!-- Contact Info -->
        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:info@example.com">info@example.com</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:123456789">+800 45 6789 01</a>
            </li>
        </ul>

        <!-- Social Links -->
        <div class="mobile-nav__social">
            <a href="https://www.facebook.com/" class="fab fa-facebook-square"></a>
            <a href="https://x.com/?lang=en" class="fab fa-twitter"></a>
            <a href="https://www.instagram.com/" class="fab fa-instagram"></a>
            <a href="https://www.youtube.com/" class="fab fa-youtube"></a>
        </div>
    </div>
</div>


