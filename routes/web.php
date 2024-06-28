<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/products', function () {
    return view('products');
});

// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/details', [ProductController::class, 'details']);

Route::get('api/products', [ProductController::class, 'index']);
Route::post('/store/products', [ProductController::class, 'store'])->name('store.products');
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product}', [ProductController::class, 'update']);



// Route::get('/products', [ProductController ::class, 'index']);
