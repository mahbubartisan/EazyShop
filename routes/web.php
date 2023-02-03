<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FilterController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('login', [AdminController::class, 'store'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');

});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', function () {

    $user_id = Auth::id();
    $user = User::findOrFail($user_id);

    return view('user.dashboard', compact('user'));
})->name('dashboard');

Route::controller(UserController::class)->prefix('user')->group(function () {

    Route::get('/profile', 'Profile')->name('user.profile');
    Route::post('/profile-update', 'ProfileUpdate')->name('profile.update');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/change/password', 'UpdatePassword')->name('update.password');
    Route::get('/logout', 'Logout')->name('user.logout');
    Route::get('/orders', 'UserOrder')->name('user.order');
    Route::get('/order/detail/{id}', 'OrderDetail');
    Route::get('/invoice/download/{id}', 'InvoiceDownload');
    Route::post('/return/product/{id}', 'ReturnProduct')->name('return.product');

});

// ProductController

Route::controller(ProductController::class)->prefix('products')->group(function () {

    Route::get('/', 'ShowProduct')->name('show.product');
    Route::get('/create', 'CreateProduct')->name('create.product');
    Route::post('/store', 'StoreProduct')->name('store.product');
    Route::get('/edit/{id}', 'EditProduct');
    Route::post('/update/{id}', 'UpdateProduct')->name('update.product');
    Route::get('/delete/{id}', 'DeleteProduct');
    Route::get('/image/{id}/delete/', 'DeleteProductImages');
    Route::get('/tags/ajax/{type_id}', 'ShowTags');
    Route::get('/attributes/ajax/{attr_id}', 'ShowAttributes');
    Route::get('/categories/ajax/{type_id}', 'FetchCategory');
    Route::get('/brands/ajax/{type_id}', 'FetchBrand');
    Route::get('/tags/ajax/{type_id}', 'FetchTag');
    Route::post('category-filter', 'CategoryFilter');

});


// Product Attribute All Routes

Route::controller(AttributeController::class)->prefix('attributes')->group(function () {

    Route::get('/', 'ShowAttribute')->name('show.attribute');
    Route::get('/create', 'CreateAttribute')->name('create.attribute');
    Route::post('/store', 'StoreAttribute')->name('store.attribute');
    Route::get('/edit/{key}', 'EditAttribute');
    Route::post('/update/{id}', 'UpdateAttribute')->name('update.attribute');
    Route::get('/delete/{id}', 'DeleteAttribute');


});

// Product Filter Routes

Route::controller(FilterController::class)->prefix('filters')->group(function () {

    Route::get('/', 'ShowFilter')->name('show.filter');
    Route::get('/create', 'CreateFilter')->name('create.filter');
    Route::post('/store', 'StoreFilter')->name('store.filter');
    Route::get('/edit/{id}', 'EditFilter');
    Route::post('/update/{id}', 'UpdateFilter')->name('update.filter');


});

// Product Tag All Routes

Route::controller(TagController::class)->prefix('tags')->group(function () {

    Route::get('/', 'ShowTag')->name('show.tag');
    Route::get('/create', 'CreateTag')->name('create.tag');
    Route::post('/store', 'StoreTag')->name('store.tag');
    Route::get('/edit/{key}', 'EditTag');
    Route::post('/update/{id}', 'UpdateTag')->name('update.tag');
    Route::get('/delete/{id}', 'DeleteTag');

});


// Product Brand All Routes

Route::controller(BrandController::class)->prefix('brands')->group(function () {

    Route::get('/', 'ShowBrand')->name('show.brand');
    Route::get('/create', 'CreateBrand')->name('create.brand');
    Route::post('/store', 'StoreBrand')->name('store.brand');
    Route::get('/edit/{id}', 'EditBrand');
    Route::post('/update/{id}', 'UpdateBrand')->name('update.brand');
    Route::get('/delete/{id}', 'DeleteBrand');

});

// Product Category All Routes

Route::controller(CategoryController::class)->prefix('categories')->group(function () {

    Route::get('/', 'ShowCategory')->name('show.category');
    Route::get('/create', 'CreateCategory')->name('create.category');
    Route::post('/store', 'StoreCategory')->name('store.category');
    Route::get('/edit/{id}', 'EditCategory');
    Route::post('/update/{id}', 'UpdateCategory')->name('update.category');
    Route::get('/delete/{id}', 'DeleteCategory');
    Route::get('ajax/{type_id}', 'ParentCategory');

});

// Product Type All Routes

Route::controller(TypeController::class)->prefix('types')->group(function () {

    Route::get('/', 'ShowType')->name('show.type');
    Route::get('/create', 'Createtype')->name('create.type');
    Route::post('/store', 'StoreType')->name('store.type');
    Route::get('/edit/{id}', 'EditType');
    Route::post('/update/{id}', 'UpdateType')->name('update.type');
    Route::get('/delete/{id}', 'DeleteType');


});

// Order Controller Routes

Route::controller(OrderController::class)->prefix('orders')->group(function () {

    route::get('/', 'ShowOrders')->name('show.order');
    route::get('/detail/{id}', 'OrderDetail')->name('order.detail');
    route::post('/status/update/{id}', 'OrderStatusUpdate');
});

// Slider Routes

Route::controller(SliderController::class)->prefix('sliders')->group(function () {

    Route::get('/', 'ShowSlider')->name('show.slider');
    Route::get('/create', 'CreateSlider')->name('create.slider');
    Route::post('/store', 'StoreSlider')->name('store.slider');
    Route::get('/edit/{id}', 'EditSlider');
    Route::post('/update/{id}', 'UpdateSlider')->name('update.slider');
    Route::get('/delete/{id}', 'DeleteSlider');

});


// Coupon Routes
Route::controller(CouponController::class)->prefix('coupons')->group(function () {

    Route::get('/', 'ShowCoupon')->name('show.coupon');
    Route::get('/create', 'CreateCoupon')->name('create.coupon');
    Route::post('/store', 'StoreCoupon')->name('store.coupon');
    Route::get('/{id}/edit', 'EditCoupon');
    Route::post('/{id}/update', 'UpdateCoupon')->name('update.coupon');
    Route::get('/{id}/delete', 'DeleteCoupon');

});


// Shipping Routes

Route::controller(ShippingController::class)->prefix('shippings')->group(function () {

    Route::get('/', 'ShowShipping')->name('show.shipping');
    Route::get('/create', 'CreateShipping')->name('create.shipping');
    Route::post('/store', 'StoreShipping')->name('store.shipping');
    Route::get('/{id}/edit', 'EditShipping');
    Route::post('/{id}/update', 'UpdateShipping')->name('update.shipping');
    Route::get('/{id}/delete', 'DeleteShipping');

});

// Report Controller

Route::controller(ReportController::class)->prefix('reports')->group(function () {

    Route::get('/', 'ShowReports')->name('show.report');
    Route::post('/filter/orders', 'ShowReports')->name('dateFilter');


});


// Multi Language Routes
Route::controller(LanguageController::class)->group(function () {
    Route::get('/english', 'EnglishLanguage')->name('english.language');
    Route::get('/hindi', 'HindiLanguage')->name('hindi.language');
});



//Checkout Controller Routes

Route::controller(CheckoutController::class)->group(function () {

    Route::get('/get-district-cities/{district_id}', 'FetchCities');
    Route::post('/checkout', 'PlaceOrder')->name('checkout');

});

// Review Controller Routes

Route::controller(ReviewController::class)->prefix('reviews')->group(function () {
    Route::get('/', 'ShowReviews')->name('show.review');
    Route::post('/store/review', 'StoreReview')->name('store.review');
    Route::get('/delete/{id}', 'DeleteReview');
    Route::post('/status/update/{id}', 'ReviewStatusUpdate');
});

// Setting Controller Routes

Route::controller(SettingController::class)->prefix('settings')->group(function () {
    Route::get('/', 'ShowSettings')->name('show.setting');
    Route::post('/update/settings', 'UpdateSettings')->name('update.settings');
});


//Homepage Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Homepage');
    Route::get('/product/detail/{id}', 'ProductDetail');
    Route::get('/product/{tag_id}', 'TagWiseProduct');
    Route::get('/{type_slug}/{cat_slug}', 'CategoryWiseProduct');
    Route::match (['get', 'post'], '/{type_slug}/{parent_slug}/{child_slug}', 'ChildCategoryWiseProduct');
    Route::post('/product-filter/{brand_id}', 'FilterBrandProduct');

});


// addToCartRoute
Route::controller(CartController::class)->group(function () {
    Route::post('/cart/data/store/{id}', 'addToCart');
    Route::get('/basket-item', 'MiniCart');
    Route::get('/cart/item/remove/{rowId}', 'CartItemRemove');
    Route::get('/my-cart', 'ViewMyCart')->name('my-cart');
    Route::get('/my-cart-products', 'MyCartProduct');
    Route::get('/mycart/item/remove/{rowId}', 'MyCartProductRemove');
    Route::get('/cart/qty/increment/{rowId}', 'CartQtyIncrement');
    Route::get('/cart/qty/decrement/{rowId}', 'CartQtyDecrement');
    Route::post('/coupon-apply', 'ApplyCoupon');
    Route::get('/coupon-amount-calculation', 'CouponAmountCalc');
    Route::get('/coupon-remove', 'CouponRemove');
    Route::get('/checkout', 'CheckoutPage')->name('checkout');

});


// Wishlist Routes
Route::controller(WishListController::class)->group(function () {
    Route::post('/wishlist/product/{product_id}', 'WishlistProduct');
    Route::get('/my-wishlist', 'ShowWishlist')->name('wishlist');
    Route::get('/wishlist-products', 'AllWishlistProduct');
    Route::get('/wishlist/item/remove/{id}', 'RemoveWishlistProduct');
});

// Payment Routes

Route::controller(PaymentController::class)->group(function () {

    Route::post('/stripe-payment', 'StripePayment')->name('stripe.payment');
    Route::post('/cash-on-delivery', 'CashOnDelivery')->name('cash.payment');

});

// Search Product

Route::post('/search', [HomeController::class, 'SearchProduct'])->name('search.product');
Route::post('/search-product', [HomeController::class, 'AjaxProductSearch']);
