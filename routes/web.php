<?php

use App\Http\Controllers\Alarm\AlarmToAllController;
use App\Http\Controllers\Alarm\AlarmToIndividualController;
use App\Http\Controllers\Alarm\AlarmUserController;
use App\Http\Controllers\HelpMana\HelpCategoryController;
use App\Http\Controllers\HelpMana\HelpController;
use App\Http\Controllers\MessageMana\MessageController;
use App\Http\Controllers\MessageMana\MessageAdminController;
use App\Http\Controllers\Payment\SquareController;
use App\Http\Controllers\ProductMana\SaleInfoController;
use App\Http\Controllers\ProductMana\WithdrawInfoController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ProductMana\PurchaseController;
use App\Http\Controllers\ProductMana\ProductController;
use App\Http\Controllers\ProductMana\SaleController;
use App\Http\Controllers\ProductMana\OwnController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Payment\PresettingController;

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

    /********************************* Payment *****************************************/
    Route::get('/square', [SquareController::class, 'index'])->name('square.index');
    Route::post('/square/process-payment', [SquareController::class, 'process_payment']);



    /********************************* Admin Page *****************************************/
    Route::resource('/product', ProductController::class);
    Route::resource('/a2a', AlarmToAllController::class);
    Route::resource('/a2i', AlarmToIndividualController::class);
    Route::get('/sale-info', [SaleInfoController::class, 'index'])->name('sale-info.index');
    Route::get('/sale-info/csv', [SaleInfoController::class, 'exportCSV'])->name('sale-info.csv');
    Route::get('/withdraw-info', [WithdrawInfoController::class, 'index'])->name('withdraw-info.index');
    // Route::resource('/sale-info', SaleInfoController::class);
    Route::get('/message-admin/resposne-state', [MessageAdminController::class, 'setResponseState'])->name('message-admin.response-state');
    Route::resource('/message-admin', MessageAdminController::class);
    Route::resource("/help-category", HelpCategoryController::class);
    Route::resource("/help", HelpController::class);


    /********************************* User Page *****************************************/
    Route::resource('/purchase', PurchaseController::class);
    Route::resource('/sale', SaleController::class);
    Route::resource('/own', OwnController::class);
    Route::resource('/alarm-user', AlarmUserController::class);
    Route::resource('/message', MessageController::class);
    Route::resource('/presetting', PresettingController::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    /********************************* Common Page *****************************************/
});