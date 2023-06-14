<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::post("login_user",[ApiController::class, 'login_user'])->name('login_user');
Route::post("register_user",[ApiController::class, 'register_user'])->name('register_user');
Route::get("get_category", [ApiController::class, 'get_category'])->name('get_category');
Route::post("get_sub_category_by_id", [ApiController::class, 'get_sub_category_by_id'])
    ->name('get_sub_category_by_id');
Route::post("get_product_by_sub_category", [ApiController::class, 'get_product_by_sub_category'])
    ->name('get_product_by_sub_category');
Route::post("order_details", [ApiController::class, 'order_details'])
    ->name('order_details');
Route::post("verifyOTP", [ApiController::class, 'verifyOTP'])
    ->name('verifyOTP');
