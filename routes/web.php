<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;

Route::get('/', [AppController::class, "index"]);

Route::get('/about', [AppController::class, "aboutShow"])->name("about");
Route::get('/promotions', [AppController::class, "promotionsShow"])->name("promotions");
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/account', [AppController::class, "accountShow"])->name("account");
    Route::get('/pay/card', [PaymentController::class, 'showCard'])->name('pay.card');
    Route::get('/pay/sbp', [PaymentController::class, 'showSbp'])->name('pay.sbp');
});
