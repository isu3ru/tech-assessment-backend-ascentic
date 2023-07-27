<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->as('auth')->group(
    function () {
        Route::post('/signin', 'signIn')->name('signin');
        Route::post('/signup', 'signUp')->name('signup');
    }
);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
