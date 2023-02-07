<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutURLController;


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
Route::get('/bkash/pay', [CheckoutURLController::class, 'payment'])->name('url-pay');
Route::post('/bkash/create', [CheckoutURLController::class, 'createPayment'])->name('url-create');
Route::get('/bkash/callback', [CheckoutURLController::class, 'callback'])->name('url-callback');

// Checkout (URL) Admin Part
Route::get('/bkash/refund', [CheckoutURLController::class, 'getRefund'])->name('url-get-refund');
Route::post('/bkash/refund', [CheckoutURLController::class, 'refundPayment'])->name('url-post-refund');
