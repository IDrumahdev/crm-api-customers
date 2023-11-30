<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController as customer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1/core/customers')->group(function(){
    Route::name('customer.')->group(function () {
        Route::controller(customer::class)->group( function () {
            Route::post('/','store')->name('store');
        });
    });
});