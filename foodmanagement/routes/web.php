<?php

use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\WishlistController;
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
/* ----------------------------------------------------Nguyen Tan Hung -----------------------*/
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\DetailController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\ProfileController;
use App\Models\Post;

Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/user-login', [LoginUserController::class, 'index'])->name('user.login');
Route::get('/user-logout', [LoginUserController::class, 'logoutUser'])->name('user.logout');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::post('/user-login', [LoginUserController::class, 'processLoginUser'])->name('user.login.process');
Route::post('/register', [RegisterController::class, 'store'])->name('user.register.process');
Route::get('/product/all', [ProductController::class, 'index'])->name('user.product.all');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('user.detail');
Route::get('/product/cate/{Cate_name}', [ProductController::class, 'categories'])->name('user.product.cate');
Route::get('Product/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('user.product.addToCart');
Route::get('Product/show-cart', [ProductController::class, 'showCart'])->name('user.product.showCart');
Route::get('Product/update-cart', [ProductController::class, 'updateCart'])->name('user.product.updateCart');
Route::get('Product/delete-cart', [ProductController::class, 'deleteCart'])->name('user.product.deleteCart');



/**Xem lai cac route nay */
Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
Route::get('/term', [RegisterController::class, 'term'])->name('user.term');
/**Xem lai cac route nay */


Route::middleware('checkUser')->prefix('/user')->group(function () {
    Route::prefix('/cart')->group(function () {
        Route::get('/Product/hot-deal', [ProductController::class, 'hotdeal'])->name('user.product.hotDeal');
        Route::get('/Product/check-out{total}', [ProductController::class, 'checkOut'])->name('user.product.checkOut');
        Route::post('/Product/pay-ment{total}', [ProductController::class, 'vnpayPayment_user'])->name('user.product.payment');
        Route::get('/Product/thank-you{total}', [ProductController::class, 'thankYou_user'])->name('user.product.thankYou');
        Route::get('/Product/contact-us', [HomeController::class, 'contactUs'])->name('user.home.contactUs');
        Route::post('/Product/contact-us-store', [HomeController::class, 'store_contact'])->name('user.home.contactUs.store');
        Route::get('/get_voucher{percent}', [HomeController::class, 'get_voucher'])->name('user.home.getVoucher');
        Route::get('/success-voucher', [HomeController::class, 'success_voucher'])->name('user.home.successVOucher');
        Route::get('/voucher', [HomeController::class, 'voucher'])->name('user.home.voucher');
    });
});




/*---------------------------------------------------------Nguyen Tan Hung----------------------- */

Route::get('/product/like/{F_id}/{likeColor}', [ProductController::class, 'like'])->middleware('checkLogin')->name('user.like');
Route::get('/product/rating/{F_id}/{rating}/{comment}', [ProductController::class, 'rating'])->middleware('checkLogin')->name('user.rating');
Route::get('product/compare/{array}', [ProductController::class, 'compare'])->name('user.product.compare');

Route::get('/blog/{P_id}', [PostController::class, 'showblog'])->name('showblog');
Route::middleware('checkLogin')->prefix('/user/profile')->group(function () {

    Route::get('/', [ProfileController::class, 'profile'])                                      ->name('user.profile');
    Route::get('/edit/{U_id}', [ProfileController::class, 'edit'])                      ->name('user.editprofile');
    Route::post('/update/{Cate_id}', [ProfileController::class, 'update'])               ->name('user.updateprofile');
    Route::get('/removewishlist/{WL_id}', [ProfileController::class, 'removewishlist'])       ->name('user.removewishlist');
    Route::get('/user-order/{O_id}', [ProfileController::class, 'userorder'])                  ->name('user.userorder');
});

Route::get('/admin-login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin-loginprocess', [LoginController::class, 'processLogin'])->name('admin.processLogin');
Route::get('/admin-logout', [LoginController::class, 'logout'])->name('admin.logout');


// Route::resource('admin/category',CategoryController::class);

Route::middleware('checkAdmin')->prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('adminlayout.index');
    })->name('admin');

    Route::prefix('/category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/edit/{Cate_id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{Cate_id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/view/{Cate_id}', [CategoryController::class, 'show'])->name('admin.category.view');
        Route::get('/delete/{Cate_id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    });
    Route::prefix('/food')->group(function () {
        Route::get('/index', [FoodController::class, 'index'])->name('admin.food.index');
        Route::get('/create', [FoodController::class, 'create'])->name('admin.food.create');
        Route::post('/store', [FoodController::class, 'store'])->name('admin.food.store');
        Route::get('/edit/{F_id}', [FoodController::class, 'edit'])->name('admin.food.edit');
        Route::post('/update/{F_id}', [FoodController::class, 'update'])->name('admin.food.update');
        Route::get('/view/{F_id}', [FoodController::class, 'show'])->name('admin.food.view');
        Route::get('/delete/{F_id}', [FoodController::class, 'destroy'])->name('admin.food.delete');
    });
    Route::prefix('/user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{U_id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{U_id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/view/{U_id}', [UserController::class, 'show'])->name('admin.user.view');
        Route::get('/delete/{U_id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });
    Route::prefix('/order')->group(function () {
        Route::get('/index', [OrderController::class, 'index'])->name('admin.order.index');
        Route::post('/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
        Route::get('/view/{O_id}', [OrderController::class, 'show'])->name('admin.order.view');
        Route::get('/reason-cancel/{O_id}', [OrderController::class, 'reasonCancel'])->name('admin.order.reasonCancel');
        Route::post('/cancel', [OrderController::class, 'cancel'])->name('admin.order.cancel');
        Route::get('/show-cancel', [OrderController::class, 'showCancel'])->name('admin.order.showCancel');
        Route::get('/delete/{O_id}', [OrderController::class, 'destroy'])->name('admin.order.delete');
        Route::post('/vnpay-payment', [PaymentController::class, 'vnpayPayment'])->name('admin.order.vnpayPayment');
        Route::post('/qrmomo-payment', [PaymentController::class, 'QRmomoPayment'])->name('admin.order.QRmomoPayment');
        Route::get('/thankyou/{O_id}', [PaymentController::class, 'thankyou'])->name('admin.order.thankyou');
    });
    Route::prefix('/rating')->group(function () {
        Route::get('/index', [RatingController::class, 'index'])->name('admin.rating.index');
        Route::get('/add/{F_name}', [RatingController::class, 'add'])->name('admin.rating.add');
        Route::post('/rate', [RatingController::class, 'rate'])->name('admin.rating.rate');
    });
    Route::prefix('/wishlist')->group(function () {
        Route::get('/index', [WishlistController::class, 'index'])->name('admin.wishlist.index');
        Route::get('/add/{F_id}/{like}/{U_id}', [WishlistController::class, 'add'])->name('admin.wishlist.add');
        Route::get('/remove/{WL_id}', [WishlistController::class, 'remove'])->name('admin.wishlist.remove');
    });
    Route::prefix('/analysis')->group(function () {
        Route::get('/top-category', [AnalysisController::class, 'topCate'])->name('admin.analysis.topCate');
        Route::get('/top-food', [AnalysisController::class, 'topFoodIndex'])->name('admin.analysis.topFoodIndex');
        Route::post('/top-food/filter', [AnalysisController::class, 'topFood'])->name('admin.analysis.topFood');
        Route::get('/top-user', [AnalysisController::class, 'topUserIndex'])->name('admin.analysis.topUserIndex');
        Route::post('/top-user/filter', [AnalysisController::class, 'topUser'])->name('admin.analysis.topUser');
        Route::get('/trend-revenue', [AnalysisController::class, 'trendRevenue'])->name('admin.analysis.trendRevenue');
    });
    Route::prefix('/post')->group(function () {
        Route::get('/index', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{P_id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/update/{P_id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('/view/{P_id}', [PostController::class, 'show'])->name('admin.post.view');
        Route::get('/delete/{P_id}', [PostController::class, 'destroy'])->name('admin.post.delete');
        Route::post('/edit', [PostController::class, 'changestatus'])->name('admin.post.changestatus');
    });
});
