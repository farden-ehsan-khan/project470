<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// new

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);

Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/view_product', [AdminController::class, 'view_product']);

Route::post('/add_product', [AdminController::class, 'add_product']);

Route::get('/show_product', [AdminController::class, 'show_product']);

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/update_product/{id}', [AdminController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart']);

Route::get('/search', [HomeController::class, 'search']);

Route::post('/search_author', [HomeController::class, 'search_author']);

Route::get('/view_users', [AdminController::class, 'view_users']);

Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);

Route::get('/view_orders', [AdminController::class, 'view_orders']);

Route::get('/start_delivery/{id}', [AdminController::class, 'start_delivery']);

Route::get('/remove_delivery/{id}', [AdminController::class, 'remove_delivery']);

Route::get('/add_order', [HomeController::class, 'add_order']);

Route::get('/show_order', [HomeController::class, 'show_order']);

Route::get('/stripe/{pay}', [HomeController::class, 'stripe']);

Route::post('stripe/{pay}', [HomeController::class,'stripePost'])->name('stripe.post');





