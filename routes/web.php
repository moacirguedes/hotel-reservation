<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;

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

Route::get('set-locale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('locale.setting');


Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('auth/login');
    });
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('hotels', HotelController::class)->except(['index', 'show']);
    Route::resource('users', UserController::class)->except(['index', 'show']);
    Route::resource('hotels/{hotel}/rooms', RoomController::class)->except(['show']);
    Route::resource('{hotel}/reservations', ReservationController::class)->except(['show', 'destroy', 'update', 'edit']);
});
