<?php

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');
Route::get('/flash-sale', [HomeController::class, 'flashSale'])->name('flashSale');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/payment', [HomeController::class, 'payment'])->name('payment');

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::prefix('/setting')->as('setting.')->group(function () {
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