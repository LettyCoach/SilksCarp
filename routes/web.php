<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ProductMana\PurchaseController;
use App\Http\Controllers\ProductMana\ProductController;
use App\Http\Controllers\ProductMana\SaleController;
use App\Http\Controllers\ProductMana\OwnController;
use App\Http\Controllers\ProfileController;

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

Route::middleware([Authenticate::class])->group(function () {

    Route::post('/image/upload_path', [CommonController::class, 'uploadImageWithPath']);

    // Route::resource('/product', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);
    // Route::post('/product/list', [ProductController::class, 'list']);
    // Route::post('/product/save', [ProductController::class, 'save']);

    Route::resource('/product', ProductController::class);
    Route::resource('/purchase', PurchaseController::class);
    Route::resource('/sale', SaleController::class);
    Route::resource('/own', OwnController::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

});