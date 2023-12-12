# .env Setup (Sandbox)
```
SANDBOX = true
BKASH_USERNAME = 'sandboxTokenizedUser02'
BKASH_PASSWORD = 'sandboxTokenizedUser02@12345'
BKASH_APP_KEY = '4f6o0cjiki2rfm34kfdadl1eqq'
BKASH_APP_SECRET ='2is7hdktrekvrbljjh44ll3d9l1dtjo4pasmjvs5vl5qr3fug4b'

```
# .env Setup (Live)
```
SANDBOX = false
BKASH_USERNAME = 'your username'
BKASH_PASSWORD = 'your password'
BKASH_APP_KEY = 'your app_key'
BKASH_APP_SECRET ='your app_secret'

```
# web.php Setup
```
// Checkout (URL) User Part
Route::get('/bkash/pay', [App\Http\Controllers\BkashController::class, 'payment'])->name('url-pay');
Route::post('/bkash/create', [App\Http\Controllers\BkashController::class, 'createPayment'])->name('url-create');
Route::get('/bkash/callback', [App\Http\Controllers\BkashController::class, 'callback'])->name('url-callback');

// Checkout (URL) Admin Part
Route::get('/bkash/refund', [App\Http\Controllers\BkashController::class, 'getRefund'])->name('url-get-refund');
Route::post('/bkash/refund', [App\Http\Controllers\BkashController::class, 'refundPayment'])->name('url-post-refund');
Route::post('/bkash/search', [App\Http\Controllers\BkashController::class, 'searchTransaction'])->name('url-post-search');

```
# Add Controller
```
Create a new Controller named 'BkashController'
Controller Location --- App\Http\Controllers\BkashController
You can now copy paste code from this project 'BkashController' code

```

# Add Blades
```
Create a new view folder named 'bkash'
View Folder Loaction --- Resources\Views\bkash
--- Under 'bkash' folder create pay.blade.php  
--- Under 'bkash' folder create success.blade.php
--- Under 'bkash' folder create fail.blade.php
--- Under 'bkash' folder create refund.blade.php
Now you can copy paste code from this project
```
# Payment Test
```
Now run the application & go to '/bkash/pay' route
```
# Refund Test
```
Now run the application & go to '/bkash/refund' route
```
# Sandbox Testing Credentials 
```
Testing Number:  01619777283 , 01877722345, 01823074817
OTP: 123456
PIN: 12121
```
