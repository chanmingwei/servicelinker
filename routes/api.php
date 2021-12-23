<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

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

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});
Route::get('/v1/service_providers', [ServiceProviderController::class, 'list']);
Route::post("/v1/service_providers", [ServiceProviderController::class, 'create']);
Route::get('/v1/orders', [OrderController::class, 'list']);
Route::post("/v1/orders", [OrderController::class, 'create']);
Route::post("/v1/customers", [CustomerController::class, 'create']);
