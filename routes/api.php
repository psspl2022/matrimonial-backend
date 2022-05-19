<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DropdownController;
<<<<<<< Updated upstream
use App\Http\Controllers\User\RegisterController;
=======
use App\Http\Controllers\Admin\Master\PackageController;
use App\Http\Controllers\Admin\Master\CasteController;
use App\Http\Controllers\Admin\Master\EducationController;
use App\Http\Controllers\Admin\Master\FamilyTypeController;
use App\Http\Controllers\Admin\Master\FamilyValueController;
use App\Http\Controllers\Admin\Master\HeightController;
use App\Http\Controllers\Admin\Master\getHobbiesList;
use App\Http\Controllers\Admin\Master\IncomeController;
use App\Http\Controllers\Admin\Master\IntrestsController;
use App\Http\Controllers\Admin\Master\MotherTongueController;
use App\Http\Controllers\Admin\Master\OccupationController;
use App\Http\Controllers\Admin\Master\ReligionController;
use App\Http\Controllers\Admin\Master\ResidenceController;
use App\Http\Controllers\Admin\Master\SectController;
>>>>>>> Stashed changes

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


Route::get('/getLoginUserDetails', [RegisterController::class, 'getLoginUserDetails']);
// Route::middleware('auth:api')->get('/details', function (Request $request) {
//     return $request->user();
// // });


//Admin Route


Route::get('/getPackageList',[PackageController::class,'getPackageList']);

Route::get('/getCasteList',[CasteController::class,'getCasteList']);

Route::get('/getEducationList',[EducationController::class,'getEducationList']);

Route::get('/getFamilyTypeList',[FamilyTypeController::class,'getFamilyTypeList']);

Route::get('/getFamilyValueList',[FamilyValueController::class,'getFamilyValueList']);

Route::get('/getHeightList',[HeightController::class,'getHeightList']);

Route::get('/getHobbiesList',[getHobbiesList::class,'getHobbiesList']);

Route::get('/getIncomeList',[IncomeController::class,'getIncomeList']);
Route::get('/getIntrestsList',[IntrestsController::class,'getPackageList']);
Route::get('/getMotherTongueList',[MotherTongueController::class,'getMotherTongueList']);
Route::get('/getOccupationList',[OccupationController::class,'getOccupationList']);
Route::get('/getReligionList',[ReligionController::class,'getReligionList']);
Route::get('/getResidenceList',[ResidenceController::class,'getResidenceList']);
Route::get('/getSectList',[SectController::class,'getSectList']);

Route::middleware('auth:api')->group(function () {
    Route::get('/logout',[AuthenticationController::class,'logout']);

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

    Route::get('/getRegisterFormStatus', [ProfileController::class, 'getRegisterFormStatus']);

    Route::get('/sendOtp', [ProfileController::class, 'sendOtpToMail']);
    Route::post('/checkOtp', [ProfileController::class, 'checkOtpToMail']);

    Route::post('/storeProfileImage', [ProfileController::class, 'storeProfileImage']);

   
});



