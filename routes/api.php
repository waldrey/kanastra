<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Api\Billing\Controllers\BillingController;

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
Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'billings'], function(){
        Route::post('/batch', 'App\Api\Billing\Controllers\BillingController@batch');
        Route::post('/webhook', 'App\Api\Billing\Controllers\BillingController@webhook');
    });

});
