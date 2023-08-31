<?php

use App\Http\Controllers\Alarm\AlarmToAllController;
use App\Http\Controllers\Alarm\AlarmToIndividualController;
use App\Http\Controllers\Alarm\AlarmUserController;
use App\Http\Controllers\HelpMana\HelpCategoryController;
use App\Http\Controllers\HelpMana\HelpController;
use App\Http\Controllers\MessageMana\MessageController;
use App\Http\Controllers\MessageMana\MessageAdminController;
use App\Http\Controllers\MoneyManaController;
use App\Http\Controllers\NoginController;
use App\Http\Controllers\Payment\SquareController;
use App\Http\Controllers\ProductMana\SaleInfoController;
use App\Http\Controllers\ProductMana\WithdrawInfoController;
use App\Http\Controllers\WelcomeController;
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




// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/nogin/index',[ NoginController::class, 'index'])->name('nogin.index');

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
    Route::get('/sale-info/tariff', [SaleInfoController::class, 'tariff'])->name('sale-info.tariff');
    Route::post('/sale-info/tariff/update', [SaleInfoController::class, 'tariffUpdate'])->name('sale-info.tariff.update');
    Route::get('/withdraw-info', [WithdrawInfoController::class, 'index'])->name('withdraw-info.index');
    Route::get('/withdraw-info/csv', [WithdrawInfoController::class, 'exportCSV'])->name('withdraw-info.csv');
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
    // Route::resource('/withdrawal-request', WithdrawInfoController::class);
    
    Route::get('/nogin/create', [NoginController::class, 'create'])->name('nogin.create');
    Route::post('/nogin/store', [NoginController::class, 'store'])->name('nogin.store');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update/profile', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/money/credit', [MoneyManaController::class, 'credit'])->name('credit.index');
    Route::post('/money/credit/update', [MoneyManaController::class, 'updateCredit'])->name('credit.update');
    Route::get('/money/bank', [MoneyManaController::class, 'bank'])->name('bank.index');
    Route::post('/money/bank/update', [MoneyManaController::class, 'updateBank'])->name('bank.update');
    Route::get('/money/withdraw', [MoneyManaController::class, 'withdraw'])->name('withdraw.index');
    Route::post('/money/withdraw/setting', [MoneyManaController::class, 'settingWithdraw'])->name('withdraw.setting');

    /********************************* Common Page *****************************************/
});