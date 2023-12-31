<?php

use App\Http\Controllers\API\V1\ContinentController;
use App\Http\Controllers\API\V1\CountryController;
use App\Http\Controllers\API\V1\StateController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'V1'], function () {
    Route::apiResource('country', CountryController::class);
    Route::apiResource('continent', ContinentController::class);
    Route::apiResource('state', StateController::class);
});
