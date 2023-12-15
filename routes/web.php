<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);


Route::resource('listing', \App\Http\Controllers\ListingController::class)
    ->only(['index', 'show']);

Route::resource('user-account', \App\Http\Controllers\UserAccountController::class)
    ->only(['create', 'store']);

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'store'])->name('login.store');
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'destroy'])->name('logout');



    Route::prefix('realtor')
        ->name('realtor.')
        ->middleware('auth')
        ->group(function () {
            Route::name('listing.restore')->put('listing/{listing}/restore', [\App\Http\Controllers\RealtorListingController::class, 'restore'])->withTrashed();
            Route::resource('listing', \App\Http\Controllers\RealtorListingController::class)
                ->only(['index', 'destroy', 'edit', 'update', 'create', 'store',])
                ->withTrashed();

            Route::resource('listing.image', \App\Http\Controllers\RealtorListingImageController::class)
                ->only(['create', 'store', 'destroy']);
        });



