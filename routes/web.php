<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\FrontEnd\User\HomeController;
use App\Http\Controllers\FrontEnd\User\MakerController;
use App\Http\Controllers\FrontEnd\User\NoticeController;
use App\Http\Controllers\FrontEnd\User\OrderController;
use App\Http\Controllers\FrontEnd\User\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('/flash-sale', [HomeController::class, 'flashSale'])->name('flashSale');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::prefix('/buyer')->as('buyer.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'account'])->name('profile');
    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/address', [ProfileController::class, 'address'])->name('ship');
    Route::get('/notification', [NoticeController::class, 'notice'])->name('notice');
});

Route::prefix('/maker')->as('maker.')->group(function () {
    Route::get('/my-sell', [ProfileController::class, 'sell'])->name('my-sell');
    Route::get('/purchase-order', [ProfileController::class, 'purchaseOrder'])->name('purchase-order');
});

Route::get('/maker/{id}', [MakerController::class, 'index'])->name('maker');