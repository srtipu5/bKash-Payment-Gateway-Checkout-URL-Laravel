<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BkashController;


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
    return view('welcome');
});


// Checkout (URL) User Part
Route::get('/bkash/pay', [App\Http\Controllers\BkashController::class, 'payment'])->name('url-pay');
Route::post('/bkash/create', [App\Http\Controllers\BkashController::class, 'createPayment'])->name('url-create');
Route::get('/bkash/callback', [App\Http\Controllers\BkashController::class, 'callback'])->name('url-callback');

// Checkout (URL) Admin Part
Route::get('/bkash/refund', [App\Http\Controllers\BkashController::class, 'getRefund'])->name('url-get-refund');
Route::post('/bkash/refund', [App\Http\Controllers\BkashController::class, 'refundPayment'])->name('url-post-refund');
Route::post('/bkash/search', [App\Http\Controllers\BkashController::class, 'searchTransaction'])->name('url-post-search');