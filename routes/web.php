<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ProductMana\PurchaseController;
use App\Http\Controllers\ProductMana\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/image/upload_path', [CommonController::class, 'uploadImageWithPath']);

// Route::resource('/product', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
// Route::post('/product/list', [ProductController::class, 'list']);
// Route::post('/product/save', [ProductController::class, 'save']);

Route::resource('/product', ProductController::class);
Route::resource('/purchase', PurchaseController::class);