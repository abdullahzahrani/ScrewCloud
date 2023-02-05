<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSlider;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\MazdaComponent;
use App\Http\Livewire\FordComponent;
use App\Http\Livewire\ToyotaComponent;
use App\Http\Livewire\HyundaiComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/mazda', MazdaComponent::class)->name('mazda');
Route::get('/ford', FordComponent::class)->name('ford');
Route::get('/toyota', ToyotaComponent::class)->name('toyota');
Route::get('/hyundai', HyundaiComponent::class)->name('hyundai');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');

// User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orders', UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/order/{order_id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', UserReviewComponent::class)->name('user.review');
});

// Admin
Route::middleware('auth:sanctum', 'verified', 'authadmin')->group(function () {


    Route::get('/admin/categories', function () {
        return redirect('/');
    })->name('admin.categories');
    Route::get('/admin/category/add', function () {
        return redirect('/');
    })->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', function () {
        return redirect('/');
    })->name('admin.editcategory');
    Route::get('/admin/slider', function () {
        return redirect('/');
    })->name('admin.homeslider');

    Route::get('/admin/categories', function () {
        return redirect('/');
    })->name('admin.categories');

    Route::get('/admin/category/add', function () {
        return redirect('/');
    })->name('admin.addcategory');

    Route::get('/admin/dashboard', function () {
        return redirect('/');
    })->name('admin.dashboard');

    Route::get('/admin/category/edit/{category_slug}', function () {
        return redirect('/');
    })->name('admin.editcategory');
//    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
//    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
//    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/home-categories', function () {
        return redirect('/');
    })->name('admin.homecategories');
    Route::get('/admin/sale', function () {
        return redirect('/');
    })->name('admin.sale');
    Route::get('/admin/coupons', function () {
        return redirect('/');
    })->name('admin.coupons');
    Route::get('/admin/coupon/add', function () {
        return redirect('/');
    })->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', function () {
        return redirect('/');
    })->name('admin.editcoupon');


    Route::get('/admin/orders', AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}', AdminOrderDetailsComponent::class)->name('admin.orderdetails');
});
