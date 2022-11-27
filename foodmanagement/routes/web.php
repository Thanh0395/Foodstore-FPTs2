<?php

use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
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

Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/product/all', [ProductController::class, 'index'])->name('user.product.all');
Route::get('/product/cate/{Cate_name}', [ProductController::class, 'categories'])->name('user.product.cate');
Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('user.detail');
Route::get('/register', [RegisterController::class, 'index'])->name('user.register');
Route::get('/term', [RegisterController::class, 'term'])->name('user.term');
Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
Route::get('/user-login', [LoginUserController::class, 'index'])->name('user.login');
Route::get('/user-logout', [LoginUserController::class, 'logoutUser'])->name('user.logout');
Route::post('/user-login', [LoginUserController::class, 'processLoginUser'])->name('user.login.process');
Route::post('/register', [RegisterController::class, 'store'])->name('user.register.process');


/*---------------------------------------------------------Nguyen Tan Hung----------------------- */

Route::middleware('checkLogin')->get('/like/{F_id}', [ProductController::class, 'like'])->name('user.detail');

Route::get('/admin-login', [LoginController::class, 'login'])                    ->name('admin.login');
Route::post('/admin-login', [LoginController::class, 'processLogin'])            ->name('admin.processLogin');
Route::get('/admin-logout', [LoginController::class, 'logout'])                  ->name('admin.logout');


// Route::resource('admin/category',CategoryController::class);

Route::middleware('checkAdmin')->prefix('/admin')->group(function () {
    Route::get('/', function () {return view('adminlayout.index');})       ->name('admin');

    Route::prefix('/category')->group(function(){
        Route::get('/index', [CategoryController::class, 'index'])                  ->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])                ->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])                 ->name('admin.category.store');
        Route::get('/edit/{Cate_id}', [CategoryController::class, 'edit'])          ->name('admin.category.edit');
        Route::post('/update/{Cate_id}', [CategoryController::class, 'update'])     ->name('admin.category.update');
        Route::get('/view/{Cate_id}', [CategoryController::class, 'show'])          ->name('admin.category.view');
        Route::get('/delete/{Cate_id}', [CategoryController::class, 'destroy'])     ->name('admin.category.delete');
    });
    Route::prefix('/food')->group(function(){
        Route::get('/index', [FoodController::class, 'index'])                  ->name('admin.food.index');
        Route::get('/create', [FoodController::class, 'create'])                ->name('admin.food.create');
        Route::post('/store', [FoodController::class, 'store'])                 ->name('admin.food.store');
        Route::get('/edit/{F_id}', [FoodController::class, 'edit'])             ->name('admin.food.edit');
        Route::post('/update/{F_id}', [FoodController::class, 'update'])        ->name('admin.food.update');
        Route::get('/view/{F_id}', [FoodController::class, 'show'])             ->name('admin.food.view');
        Route::get('/delete/{F_id}', [FoodController::class, 'destroy'])        ->name('admin.food.delete');
    });
    Route::prefix('/user')->group(function(){
        Route::get('/index', [UserController::class, 'index'])                  ->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])                ->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])                 ->name('admin.user.store');
        Route::get('/edit/{U_id}', [UserController::class, 'edit'])             ->name('admin.user.edit');
        Route::post('/update/{U_id}', [UserController::class, 'update'])        ->name('admin.user.update');
        Route::get('/view/{U_id}', [UserController::class, 'show'])             ->name('admin.user.view');
        Route::get('/delete/{U_id}', [UserController::class, 'destroy'])        ->name('admin.user.delete');
    });
    Route::prefix('/order')->group(function(){
        Route::get('/index', [OrderController::class, 'index'])                         ->name('admin.order.index');
        Route::post('/edit', [OrderController::class, 'edit'])                          ->name('admin.order.edit');
        Route::get('/view/{O_id}', [OrderController::class, 'show'])                    ->name('admin.order.view');
        Route::get('/reason-cancel/{O_id}', [OrderController::class, 'reasonCancel'])   ->name('admin.order.reasonCancel');
        Route::post('/cancel', [OrderController::class, 'cancel'])                       ->name('admin.order.cancel');
        Route::get('/show-cancel', [OrderController::class, 'showCancel'])              ->name('admin.order.showCancel');
        Route::get('/delete/{O_id}', [OrderController::class, 'destroy'])               ->name('admin.order.delete');
        Route::post('/vnpay-payment', [PaymentController::class, 'vnpayPayment'])        ->name('admin.order.vnpayPayment');
        Route::post('/qrmomo-payment', [PaymentController::class, 'QRmomoPayment'])        ->name('admin.order.QRmomoPayment');
        Route::get('/thankyou', [PaymentController::class, 'thankyou'])               ->name('admin.order.thankyou');
    });
    Route::prefix('/rating')->group(function(){
        Route::get('/index', [RatingController::class, 'index'])                ->name('admin.rating.index');
        Route::get('/add/{F_name}', [RatingController::class, 'add'])                    ->name('admin.rating.add');
        Route::post('/rate', [RatingController::class, 'rate'])                 ->name('admin.rating.rate');
    });
    Route::prefix('/wishlist')->group(function(){
        Route::get('/index', [WishlistController::class, 'index'])                      ->name('admin.wishlist.index');
        Route::get('/add/{F_id}/{like}/{U_id}', [WishlistController::class, 'add'])     ->name('admin.wishlist.add');
        Route::get('/remove/{WL_id}', [WishlistController::class, 'remove'])        ->name('admin.wishlist.remove');
    });
    Route::prefix('/analysis')->group(function(){
        Route::get('/top-category', [AnalysisController::class, 'topCate'])     ->name('admin.analysis.topCate');
        Route::get('/top-food', [AnalysisController::class, 'topFoodIndex'])    ->name('admin.analysis.topFoodIndex');
        Route::post('/top-food/filter', [AnalysisController::class, 'topFood'])   ->name('admin.analysis.topFood');
        Route::get('/top-user', [AnalysisController::class, 'topUserIndex'])    ->name('admin.analysis.topUserIndex');
        Route::post('/top-user/filter', [AnalysisController::class, 'topUser'])   ->name('admin.analysis.topUser');
        Route::get('/trend-revenue', [AnalysisController::class, 'trendRevenue'])     ->name('admin.analysis.trendRevenue');

    });

});
