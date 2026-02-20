<!-- Search Popup -->
<div class="search-popup">
    <!-- Overlay -->
    <div class="search-popup__overlay search-toggler">
        <div class="search-popup__close-btn">
            <span class="fa fa-times"></span>
        </div>
    </div>

    <!-- Content -->
    <div class="search-popup__content">
        <form action="{{ route('shop.index') }}" method="GET">
            <label for="search" class="sr-only">search here</label>
            <input type="text" id="search" name="q" placeholder="Search Products, Blog Posts, Services..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-search"></i>
            </button>
        </form>
    </div>
</div>
