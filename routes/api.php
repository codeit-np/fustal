<?php

use App\Http\Controllers\Api\Authuser;
use App\Http\Controllers\Api\BookingControllerApi;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login',[Authuser::class,'login']);
Route::post('register',[Authuser::class,'register']);

Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('logout',[Authuser::class,'logout']);
    Route::resource('booking',BookingControllerApi::class);
});