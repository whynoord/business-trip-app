<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BusinessTripController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('business-trip-submission', [BusinessTripController::class, 'submission'])->name('submission');
Route::group(['prefix' => 'city-master'], function(){
    Route::get('/', [CityController::class, 'index'])->name('cityMaster');
});
Route::get('my-business-trip', [BusinessTripController::class, 'index'])->name('myBusinessTrip');