<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IbanValidationController;
use App\Http\Middleware\AllowAdminOnly;
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

    Route::post('/iban/validate', [IbanValidationController::class, 'store'])->name('iban.validate');

    Route::middleware(AllowAdminOnly::class)
        ->get('/iban/list', [IbanValidationController::class, 'all'])
        ->name('iban.list');
});
