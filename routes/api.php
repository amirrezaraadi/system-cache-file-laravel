<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/serviceUser', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->prefix('dashboard')->name('dashboard.')->group(function () {
//    Route::
   Route::apiResource('posts' , \App\Http\Controllers\Panel\PostController::class);
});

Route::prefix('auth')->name('auth.')->group(function () {
   Route::post('register' , [\App\Http\Controllers\Auth\RegisteredUserController::class , 'store'])->name('register');
   Route::post('login' , [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login');
    Route::middleware(['auth:sanctum'])
        ->post('check_code' , [\App\Http\Controllers\Auth\RegisteredUserController::class , 'check'])
        ->name('check');
//   Route::post('register' , [\App\Http\Controllers\Auth\RegisteredUserController::class , 'store'])->name('register');
});


//require __DIR__.'/auth.php';
