<?php

use App\Http\Controllers\Api\Authuser;
use App\Http\Controllers\Api\BookingControllerApi;
use App\Http\Controllers\Api\ChallangeController;
use App\Http\Controllers\Api\EventsController;
use App\Http\Controllers\Api\OfferController as ApiOfferController;
use App\Http\Controllers\Api\RegisteredTeam;
use App\Http\Controllers\OfferController;
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


Route::post('login',[Authuser::class,'login']);
Route::post('register',[Authuser::class,'register']);

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('logout',[Authuser::class,'logout']);
    Route::resource('booking',BookingControllerApi::class);
    Route::resource('events',EventsController::class);
    Route::resource('offers',ApiOfferController::class);
    Route::resource('challange',ChallangeController::class);
    Route::resource('teams',RegisteredTeam::class);
});

