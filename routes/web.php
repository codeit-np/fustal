<?php

use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('booking',BookingController::class);
Route::resource('fustalevents',EventController::class);
Route::resource('offers',OfferController::class);
Route::resource('teamplayers',PlayerController::class);