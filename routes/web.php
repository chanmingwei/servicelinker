<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceProviderController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::get("/login", function () {
    return view("login");
});

Route::get('/profile', function () {
    info("check user", [Auth::user()]);
    return view("profile");
});


Route::post("/login/user", [LoginController::class, 'authenticateUser']);
Route::post("/login/customer", [LoginController::class, 'authenticateCustomer']);
Route::post("/logout", [LoginController::class, 'logout']);
