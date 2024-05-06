<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'showLogIn']);
Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/user-create', [UserController::class, 'userCreate']);
Route::post('/login', [UserController::class, 'LogIn']);
Route::get('/user-dashboard', [UserController::class, 'showDashboard']);


Route::get('/admin', [AdminController::class, 'showLogIn']);
Route::get('/admin-add', [AdminController::class, 'showRegister']);
Route::post('/admin-create', [AdminController::class, 'adminCreate']);
Route::post('/adminLogIn', [AdminController::class, 'LogIn']);
Route::get('/admin-dashboard', [AdminController::class, 'showDashboard']);
Route::post('/create-store-product', [StoreController::class, 'createStoreProduct']);
Route::get('/user-dashboard/{id}', [UserController::class, 'showCategory']);
Route::get('/cart', [UserController::class, 'showCart']);
Route::get('/add-to-cart/{id}', [StoreController::class, 'addToCart'])->name('add.to.cart');
Route::get('/remove-from-cart/{id}', [StoreController::class, 'removeFromCart'])->name('remove.from.cart');