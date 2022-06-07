<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\Master\PackageController;
use App\Http\Controllers\User\CheckoutController;

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

//     return view('welcome');
// Route::get('/', function () {
// });

Route::get('/{route?}',function(){
    return view('welcome');
})->where('path','.*');

Route::post('/return-membership', [CheckoutController::class, 'returnRegister']);

// header('Access-Control-Allow-Origin:  *');
// header('Access-Control-Allow-Origin:  http://localhost');
// header('Access-Control-Allow-Methods:   GET,POST');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

// Route::post('/login',[AuthenticationController::class,'login']);
// Route::get('/login',[AuthenticationController::class,'login'])->name('login');


// Route::get('/getPackageList',[PackageController::class,'getPackageList']);
// Route::middleware('auth:api')->group(function () {
//     Route::post('/logout',[AuthenticationController::class,'logout']);
    
// });