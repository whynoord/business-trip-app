<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BusinessTripController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
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

Route::group(['middleware' => 'checkRole:hrd'], function(){
    Route::get('business-trip-submission', [BusinessTripController::class, 'submission'])->name('submission');
    Route::post('business-trip-submission/approve', [BusinessTripController::class, 'approve'])->name('approve');
    Route::group(['prefix' => 'city-master'], function(){
        Route::get('/', [CityController::class, 'index'])->name('cityMaster');
        Route::post('/', [CityController::class, 'store'])->name('storeCity');
        Route::post('update/{id}', [CityController::class, 'update'])->name('updateCity');
        Route::get('delete/{id}', [CityController::class, 'destroy'])->name('deleteCity');
    });
});

Route::get('my-business-trip', [BusinessTripController::class, 'index'])->middleware('checkRole:employee')->name('myBusinessTrip');
Route::post('my-business-trip/store', [BusinessTripController::class, 'store'])->middleware('checkRole:employee')->name('storeBusinessTrip');


Route::group(['middleware' => 'checkRole:admin'], function(){
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
    Route::post('admin', [AdminController::class, 'store'])->name('storeUser');
    Route::post('admin/update/{id}', [AdminController::class, 'update'])->name('updateUser');
});

Auth::routes();