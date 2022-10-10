<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\LoggedOutController::class, 'welcomeHome'])->name('welcomeHome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seller/home', [App\Http\Controllers\SellersController::class, 'index'])->name('seller.home');
Route::get('/seller/crops', [App\Http\Controllers\CropController::class, 'index'])->name('seller.crops');
