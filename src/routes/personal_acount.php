<?php

use App\Http\Controllers\PersonalAcount\PersonalAcountController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->controller(PersonalAcountController::class)->group(function () {
    Route::get('/{url}', 'index')->name('pa');
    Route::get('/auth/reset-password', 'resetPassword')->withoutMiddleware('auth:sanctum');
});
