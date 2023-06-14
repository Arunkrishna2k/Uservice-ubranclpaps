<?php

use \App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MailController;
use \Illuminate\Support\Facades\Route;

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

Route::view('/', 'auth.login');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
    Route::resource('users', UserController::class);
    Route::get('health', [HealthController::class, 'index']);
});
//Route::resource('create_users', CreateCustomerController::class);
//Route::get('sendbasicemail',[MailController::class, 'basic_email']);
//Route::get('sendhtmlemail', [MailController::class, 'html_email']);
//Route::get('sendattachmentemail',[MailController::class, 'attachment_email']);
