<?php

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
Route::prefix('v1/crm/customers')->group(function(){
    Route::name('customer.')->group(function () {
        Route::controller(customer::class)->group( function () {
            Route::post('/','store')->name('store');
            Route::get('/','findAll')->name('all');
            Route::get('/{id}','detail')->name('detail');
            Route::put('/{id}','update')->name('update');
            Route::delete('/{id}','delete')->name('delete');
        });
    });
});