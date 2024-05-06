# .env Setup (Sandbox)
```
SANDBOX = true
BKASH_USERNAME = '01770618567'
BKASH_PASSWORD = 'D7DaC<*E*eG'
BKASH_APP_KEY = '0vWQuCRGiUX7EPVjQDr0EUAYtc'
BKASH_APP_SECRET ='jcUNPBgbcqEDedNKdvE4G1cAK7D3hCjmJccNPZZBq96QIxxwAMEx'

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
use App\Http\Controllers\BkashController;

// Checkout (URL) User Part
Route::get('/bkash-pay', [BkashController::class, 'payment'])->name('url-pay');
Route::post('/bkash-create', [BkashController::class, 'createPayment'])->name('url-create');
Route::get('/bkash-callback', [BkashController::class, 'callback'])->name('url-callback');

// Checkout (URL) Admin Part
Route::get('/bkash-refund', [BkashController::class, 'getRefund'])->name('url-get-refund');
Route::post('/bkash-refund', [BkashController::class, 'refundPayment'])->name('url-post-refund');
Route::get('/bkash-search', [BkashController::class, 'getSearchTransaction'])->name('url-get-search');
Route::post('/bkash-search', [BkashController::class, 'searchTransaction'])->name('url-post-search');

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
Now run the application & go to '/bkash-pay' route
```
# Refund Test
```
Now run the application & go to '/bkash-refund' route
```
# Sandbox Testing Credentials 
```
Testing Number: 01929918378, 01619777283, 01619777282, 01823074817
OTP: 123456
PIN: 12121
```
