<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DropdownController;

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
Route::get('/login',[AuthenticationController::class,'login'])->name('login');
// Route::middleware('auth:api')->get('/details', function (Request $request) {
//     return $request->user();
// // });


Route::middleware('auth:api')->group(function () {
    Route::post('/logout',[AuthenticationController::class,'logout']);

    Route::get('/showAbout/{id}',[ProfileController::class, 'showAboutById']);

    Route::post('/createBasic',[ProfileController::class, 'createBasic']);
    Route::get('/showBasic/{id}',[ProfileController::class, 'showBasicById']);
    Route::post('/createCareer',[ProfileController::class, 'createCareer']);
    Route::get('/showCareer/{id}',[ProfileController::class, 'showCareerById']);
    Route::post('/createFamily',[ProfileController::class, 'createFamily']);
    Route::get('/showFamily/{id}',[ProfileController::class, 'showFamilyById']);

    Route::get('/basicDropdown',[DropdownController::class, 'basicDropdown']);
    Route::get('/careerDropdown',[DropdownController::class, 'careerDropdown']);
    Route::get('/familyDropdown',[DropdownController::class, 'familyDropdown']);
    
    Route::get('/stateDropdown/{c_id}',[DropdownController::class, 'stateDropdown']);
    Route::get('/cityDropdown/{s_id}',[DropdownController::class, 'cityDropdown']);
   
});


