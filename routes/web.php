<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

Route::get('/', [AppController::class, "index"]);

Route::get('/about', [AppController::class, "aboutShow"])->name("about");
Route::get('/promotions', [AppController::class, "promotionsShow"])->name("promotions");
Route::middleware('auth')->group(function () {
    Route::post('/reviews', [AppController::class, 'reviewStore'])->name('reviews.store');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

Route::middleware('auth')->group(function () {
    Route::get('/account', [AppController::class, "accountShow"])->name("account");
    Route::get('/pay/card', [PaymentController::class, 'showCard'])->name('pay.card');
    Route::get('/pay/sbp', [PaymentController::class, 'showSbp'])->name('pay.sbp');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/promotions', [AdminController::class, 'promotionsIndex'])->name('promotions.index');
        Route::get('/promotions/create', [AdminController::class, 'promotionsCreate'])->name('promotions.create');
        Route::post('/promotions', [AdminController::class, 'promotionsStore'])->name('promotions.store');
        Route::get('/promotions/{promotion}/edit', [AdminController::class, 'promotionsEdit'])->name('promotions.edit');
        Route::put('/promotions/{promotion}', [AdminController::class, 'promotionsUpdate'])->name('promotions.update');
        Route::delete('/promotions/{promotion}', [AdminController::class, 'promotionsDestroy'])->name('promotions.destroy');

        Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
        Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
        Route::post('/users', [AdminController::class, 'usersStore'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminController::class, 'usersEdit'])->name('users.edit');
        Route::put('/users/{user}', [AdminController::class, 'usersUpdate'])->name('users.update');
        Route::delete('/users/{user}', [AdminController::class, 'usersDestroy'])->name('users.destroy');
        Route::post('/users/{user}/topup', [AdminController::class, 'usersTopUp'])->name('users.topup');
    });
});
