<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

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

//Landing
Route::get('/', [LandingController::class, 'index']);
Route::get('/show-product', [LandingController::class, 'showproduct']);
Route::get('/detail-product/{product}', [LandingController::class, 'detailproduct']);

//login
Route::get('/login', [LandingController::class, 'login']);
Route::post('/login', [LandingController::class, 'authenticate'])->name('login');
//logout
Route::get('/logout', [LandingController::class, 'logout'])->middleware('auth');
//register
Route::get('/register', [LandingController::class, 'register']);
Route::post('/register', [LandingController::class, 'store_register'])->name('register');

//For Customer
Route::get('/homepage', [LandingController::class, 'index_customer'])->middleware('auth');
Route::get('/edit-profile', [CustomerController::class, 'edit_profile'])->middleware('auth');
Route::get('/change-password', [CustomerController::class, 'change_password'])->middleware('auth');
Route::get('/my-cart', [CustomerController::class, 'my_cart'])->middleware('auth', 'role:customer');
Route::get('/my-transaction', [CustomerController::class, 'my_transaction'])->middleware('auth', 'role:customer');
Route::post('/edit-profile', [CustomerController::class, 'store_profile'])->middleware('auth');
Route::post('/add-to-cart', [CustomerController::class, 'add_cart'])->middleware('auth', 'role:customer');
Route::post('edit-cart', [CustomerController::class, 'edit_cart'])->middleware('auth', 'role:customer');
Route::post('/checkout', [CustomerController::class, 'checkout'])->middleware('auth', 'role:customer');
Route::post('/change-password', [CustomerController::class, 'store_password'])->middleware('auth');
Route::get('/my-cart/edit/{cart}', [CustomerController::class, 'edit_product']);
Route::get('/my-cart/delete/{cart}', [CustomerController::class, 'delete_product']);

//Manage Items
Route::resource('/product', ProductController::class)->middleware('auth');
