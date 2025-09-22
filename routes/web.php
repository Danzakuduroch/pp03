<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, "index"]);

Route::get('/about', [AppController::class, "aboutShow"])->name("about");
Route::get('/promotions', [AppController::class, "promotionsShow"])->name("promotions");
Route::get('/account', [AppController::class, "accountShow"])->name("account");
