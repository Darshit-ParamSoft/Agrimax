<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Backend Controllers
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\RegisterController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\AuthSettingController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\CertificateController;
use App\Http\Controllers\Backend\CarouselItemController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactSettingController;
use App\Http\Controllers\Backend\EnquiryController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\HomeSectionController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RoleMasterController;
use App\Http\Controllers\Backend\UniversityMasterController;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CertificateController as FrontendCertificateController;
use App\Http\Controllers\Frontend\JoinUsController;
use App\Http\Controllers\Frontend\MachineStorageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Standard Auth Routes (includes login, register, password reset, etc.)
// Standard Auth Routes

/* all cache clear route start */

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    return "Cleared!";
});
/* all cache clear route end */

// In web.php
// Auth::routes(); // Disabled - using custom Backend\Auth routes instead

// Standard Authentication Routes (manually defined)
Route::group(['middleware' => 'guest'], function () {
    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register Routes
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Forgot Password Routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Captcha route
Route::get('/captcha', [LoginController::class, 'generateCaptcha'])->name('captcha');

// Email OTP routes
Route::get('/otp-verify', [LoginController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp-verify', [LoginController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/otp-resend', [LoginController::class, 'resendOtp'])->name('otp.resend');

// Mobile OTP routes
Route::get('/mobile-otp-verify', [LoginController::class, 'showMobileOtpForm'])
    ->name('mobile.otp.form');
Route::post('/mobile-otp-verify', [LoginController::class, 'verifyMobileOtp'])
    ->name('mobile.otp.verify');

// Two Factor routes
Route::get('/two-factor', [LoginController::class, 'showTwoFactorForm'])->name('twofa.form');
Route::get('/two-factor-verify', [LoginController::class, 'showTwoFactorVerify'])->name('twofa.verify.form');
Route::post('/two-factor', [LoginController::class, 'verifyTwoFactor'])->name('twofa.verify');

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => '/'], function () {
    // Home
    Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

    // Product Listing and Details
    Route::get('/products-list', [FrontendProductController::class, 'index'])->name('products-list.index');
    Route::get('/products-list/{id}', [FrontendProductController::class, 'show'])->name('products-list.show');

    // Other Product Routes
    Route::get('/other-products-list', [FrontendProductController::class, 'otherProductsIndex'])->name('other-products-list.index');
    Route::get('/other-products-list/{id}', [FrontendProductController::class, 'showOtherProduct'])->name('other-products-list.show');

    // About
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    // Certificate
    Route::get('/certificate-list', [FrontendCertificateController::class, 'index'])->name('certificate.index');

    // MACHINE & STORAGE AREA
    Route::get('/machine-storage-area', [MachineStorageController::class, 'index'])->name('machine-storage.index');

    // JOIN US
    Route::get('/join-us', [JoinUsController::class, 'index'])->name('join-us.index');
    Route::post('/applications', [JoinUsController::class, 'store'])->name('applications.store');

    // CONTACT US
    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us.index');

    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

    // Blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

    // Shop
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // FAQ
    Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

    // Team
    Route::get('/team', [TeamController::class, 'index'])->name('team.index');

    // Portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');

    // Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

    // Account (Protected)
    Route::middleware(['auth'])->group(function () {
        Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    });
});

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

// Protected Sidebar Routes (Auth Required)
Route::middleware('auth')->group(function () {

    // Home route
    Route::get('/dashboard', [HomeController::class, 'root'])->name('dashboard');

    // Language Translation
    Route::get('index/{locale}', [HomeController::class, 'lang']);

    Route::post('/formsubmit', [HomeController::class, 'FormSubmit'])->name('FormSubmit');

    // Profile Routes (protected by auth middleware)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    // Categories CRUD
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);
    Route::patch('/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');

    // Products CRUD
    Route::resource('products', ProductController::class)->names([
        'index' => 'products.index',
        'create' => 'products.create',
        'store' => 'products.store',
        'show' => 'products.show',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);

    // Carousel Items CRUD
    Route::resource('carousel', CarouselItemController::class)->names([
        'index' => 'carousel.index',
        'create' => 'carousel.create',
        'store' => 'carousel.store',
        'show' => 'carousel.show',
        'edit' => 'carousel.edit',
        'update' => 'carousel.update',
        'destroy' => 'carousel.destroy',
    ]);
    Route::post('/carousel/update-sort-order', [CarouselItemController::class, 'updateSortOrder'])->name('carousel.updateSortOrder');
    Route::patch('/carousel/{carousel}/toggle-status', [CarouselItemController::class, 'toggleStatus'])->name('carousel.toggleStatus');

    // Home Sections (CMS) CRUD
    Route::resource('home-sections', HomeSectionController::class)->names([
        'index' => 'home-sections.index',
        'create' => 'home-sections.create',
        'store' => 'home-sections.store',
        'show' => 'home-sections.show',
        'edit' => 'home-sections.edit',
        'update' => 'home-sections.update',
        'destroy' => 'home-sections.destroy',
    ]);

    // Certificates CRUD
    Route::resource('certificates', CertificateController::class)->names([
        'index' => 'certificates.index',
        'create' => 'certificates.create',
        'store' => 'certificates.store',
        'show' => 'certificates.show',
        'edit' => 'certificates.edit',
        'update' => 'certificates.update',
        'destroy' => 'certificates.destroy',
    ]);

    // Careers CRUD
    Route::resource('careers', CareerController::class)->names([
        'index' => 'careers.index',
        'create' => 'careers.create',
        'store' => 'careers.store',
        'show' => 'careers.show',
        'edit' => 'careers.edit',
        'update' => 'careers.update',
        'destroy' => 'careers.destroy',
    ]);
    Route::post('/careers/toggle-status', [CareerController::class, 'toggleStatus'])->name('careers.toggle-status');

    // Contact Settings CRUD
    Route::resource('contact-settings', ContactSettingController::class)->names([
        'index' => 'contact-settings.index',
        'create' => 'contact-settings.create',
        'store' => 'contact-settings.store',
        'show' => 'contact-settings.show',
        'edit' => 'contact-settings.edit',
        'update' => 'contact-settings.update',
        'destroy' => 'contact-settings.destroy',
    ]);

    // Enquiries (View Only)
    Route::get('enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('enquiries/{enquiry}', [EnquiryController::class, 'show'])->name('enquiries.show');

    // Applications (View & Delete)
    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // Product Toggle Routes
    Route::post('/products/{product}/toggle-status', [ProductController::class, 'toggleStatus'])->name('products.toggleStatus');
    Route::post('/products/{product}/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('products.toggleFeatured');
    Route::post('/products/{product}/toggle-is-main', [ProductController::class, 'toggleIsMain'])->name('products.toggleIsMain');

    // Check slug uniqueness
    Route::get('/products/check-slug/{slug}', [ProductController::class, 'checkSlugUnique'])->name('products.checkSlugUnique');

    // Product Images Management
    Route::get('/product-images', [ProductImageController::class, 'index'])->name('product-images.index');
    Route::get('/product-images/{productId}/edit', [ProductImageController::class, 'edit'])->name('product-images.edit');
    Route::put('/product-images/{productId}', [ProductImageController::class, 'update'])->name('product-images.update');
    Route::delete('/product-images/{productId}/delete-image', [ProductImageController::class, 'deleteImage'])->name('product-images.delete-image');
    Route::get('/product-images/{productId}/check-before-back', [ProductImageController::class, 'checkBeforeBack'])->name('product-images.check-before-back');
    Route::delete('/product-images/{productId}/delete-product-without-images', [ProductImageController::class, 'deleteProductWithoutImages'])->name('product-images.delete-product-without-images');

    // Roles CRUD
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index')->middleware('can:role-view');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('can:role-create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store')->middleware('can:role-create');
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show')->middleware('can:role-view');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('can:role-edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update')->middleware('can:role-edit');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('can:role-delete');

    // Permissions CRUD
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index')->middleware('can:permission-view');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create')->middleware('can:permission-create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store')->middleware('can:permission-create');
    Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('can:permission-edit');
    Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update')->middleware('can:permission-edit');
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy')->middleware('can:permission-delete');

    // Auth Settings
    Route::prefix('AuthPasswordSetting')->group(function () {
        // PAGE (Blade view)
        Route::get('/', [AuthSettingController::class, 'index'])
            ->name('auth.settings')->middleware('can:auth-settings-view');

        // AJAX APIs
        Route::get('/GetAuthenticationSettings', [AuthSettingController::class, 'getAuthenticationSettings'])
            ->name('getAuthenticationSettings');

        Route::post('/UpdateAuthenticationSettings', [AuthSettingController::class, 'updateAuthenticationSettings'])
            ->name('updateAuthenticationSettings')->middleware('can:auth-settings-edit');

        Route::get('/GetPasswordRules', [AuthSettingController::class, 'getPasswordRules'])
            ->name('getPasswordRules');

        Route::post('/UpdatePasswordRules', [AuthSettingController::class, 'updatePasswordRules'])
            ->name('updatePasswordRules')->middleware('can:auth-settings-edit');
    });

}); // End of auth middleware group


// Note: Catch-all route removed - use explicit frontend routes instead
Route::get('{any}', [FrontendHomeController::class, 'index'])->where('any', '.*');
