<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;

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

Route::post('/register',[AuthenticationController::class,'register']);
Route::post('/login',[AuthenticationController::class,'login']);
// Route::middleware('auth:api')->get('/details', function (Request $request) {
//     return $request->user();
// // });


// Route::group(['middleware' => ['auth:api']], function(){
    Route::post('/createBasic',[ProfileController::class, 'createBasic']);
    Route::get('/showBasic/{id}',[ProfileController::class, 'showBasicById']);
    Route::post('/createCareer',[ProfileController::class, 'createCareer']);
    Route::get('/showCareer/{id}',[ProfileController::class, 'showCareerById']);
    Route::post('/createFamily',[ProfileController::class, 'createFamily']);
    Route::get('/showFamily/{id}',[ProfileController::class, 'showFamilyById']);
// });


