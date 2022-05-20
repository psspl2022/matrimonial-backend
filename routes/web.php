<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\Master\PackageController;

//Backend Part of Namdeo Matrimonial 
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

Route::get('/{route?}',function(){
    return view('welcome');
})->where('path','.*');

Route::post('/login',[AuthenticationController::class,'login']);
Route::get('/login',[AuthenticationController::class,'login'])->name('login');


Route::get('/getPackageList',[PackageController::class,'getPackageList']);
Route::middleware('auth:api')->group(function () {
    Route::post('/logout',[AuthenticationController::class,'logout']);
    
});