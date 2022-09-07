<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\Master\PackageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\CitiesController;

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

Route::get('/{route?}', function () {
    return "";
})->where('path', '.*');

// Route::post('/return-membership', [CheckoutController::class, 'returnRegister']);
Route::get('/insert', [CitiesController::class, 'index']);
