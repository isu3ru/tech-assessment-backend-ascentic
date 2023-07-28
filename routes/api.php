<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IbanValidationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->as('auth')->group(
    function () {
        Route::post('/signin', 'signIn')->name('signin');
        Route::post('/signup', 'signUp')->name('signup');
    }
);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn (Request $request) => $request->user());
    Route::post('/signout', [AuthController::class, 'signOut'])->name('signout');

    Route::post('/validate', [IbanValidationController::class, 'store'])->name('iban.validate');
});
