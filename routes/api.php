<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TransactionController;

Route::prefix('v1')->group(function () {
    // User Routes
    Route::apiResource('users', UserController::class);

    // Transaction Routes
    Route::apiResource('transactions', TransactionController::class);
});
