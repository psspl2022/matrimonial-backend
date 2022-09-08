<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DropdownController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\Master\PackageController;
use App\Http\Controllers\Admin\Master\CasteController;
use App\Http\Controllers\Admin\Master\EducationController;
use App\Http\Controllers\Admin\Master\FamilyTypeController;
use App\Http\Controllers\Admin\Master\FamilyValueController;
use App\Http\Controllers\Admin\Master\HeightController;
use App\Http\Controllers\Admin\Master\HobbiesController;
use App\Http\Controllers\Admin\Master\IncomeController;
use App\Http\Controllers\Admin\Master\IntrestsController;
use App\Http\Controllers\Admin\Master\MotherTongueController;
use App\Http\Controllers\Admin\Master\OccupationController;
use App\Http\Controllers\Admin\Master\ReligionController;
use App\Http\Controllers\Admin\Master\ResidenceController;
use App\Http\Controllers\Admin\Master\SectController;
use App\Http\Controllers\Admin\ActionController;
use App\Http\Controllers\User\UserActionController;
use App\Http\Controllers\User\DesiredController;
use App\Http\Controllers\User\MembershipController;
use App\Http\Controllers\User\BrowseController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DetailProfileController;

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

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/getLoginUserDetails', [RegisterController::class, 'getLoginUserDetails']);
Route::post('/postBrowseProfile', [BrowseController::class, 'browseProfile']);
Route::post('/searchProfile', [BrowseController::class, 'searchProfile']);
Route::get('/homeProfile', [BrowseController::class, 'homeProfile']);

//ADMIN REGISTER USER


//Admin Route

Route::get('/getFamilyTypeList', [FamilyTypeController::class, 'getFamilyTypeList']);
Route::get('/desiredDropdown', [DropdownController::class, 'desiredDropdown']);
Route::post('/return-membership', [CheckoutController::class, 'returnRegister']);


//Home Browse Route
Route::get('/browseProfileBy', [BrowseController::class, 'browseProfileBy']);


Route::middleware('auth:api')->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);

    Route::get('/showAbout', [ProfileController::class, 'showAboutById']);
    Route::post('/EditAbout', [ProfileController::class, 'EditAbout']);

    Route::post('/createBasic', [ProfileController::class, 'createBasic']);
    Route::get('/showBasic/{id}', [ProfileController::class, 'showBasicById']);
    Route::post('/editBasic', [ProfileController::class, 'editBasic']);
    Route::post('/EditCareer', [ProfileController::class, 'EditCareer']);
    Route::post('/createCareer', [ProfileController::class, 'createCareer']);
    Route::get('/showCareer', [ProfileController::class, 'showCareerById']);
    Route::post('/EditCareer', [ProfileController::class, 'EditCareer']);
    Route::post('/createFamily', [ProfileController::class, 'createFamily']);
    Route::get('/showFamily', [ProfileController::class, 'showFamilyById']);
    Route::post('/editFamily', [ProfileController::class, 'editFamily']);
    Route::get('/showContact', [ProfileController::class, 'showContactById']);
    Route::post('/editContact', [ProfileController::class, 'editContact']);
    Route::get('/showLifeStyle', [ProfileController::class, 'showLifeStyleById']);
    Route::post('/editLifeStyle', [ProfileController::class, 'editLifestyle']);
    Route::get('/showLikesDetails', [ProfileController::class, 'showLikesDetails']);
    Route::post('/editLikesDetails', [ProfileController::class, 'editLikesDetails']);

    //Desired Profile

    Route::post('/desiredBasic', [DesiredController::class, 'createBasic']);
    Route::post('/desiredReligion', [DesiredController::class, 'createReligion']);
    Route::post('/desiredCareer', [DesiredController::class, 'createCareer']);
    Route::post('/desiredLifestyle', [DesiredController::class, 'createLifestyle']);
    Route::post('/desiredAbout', [DesiredController::class, 'createAbout']);
    Route::get('/showDesiredDetails', [DesiredController::class, 'showDesiredDetail']);
    Route::post('/showDesiredProfiles', [DesiredController::class, 'showDesiredProfiles']);


    //Action Routes

    Route::post('/sendIntrest', [UserActionController::class, 'sendIntrest']);
    Route::get('/interestReceived', [UserActionController::class, 'interestReceived']);
    Route::post('/interestRevert', [UserActionController::class, 'sendInterestRevert']);
    Route::get('/interestSent', [UserActionController::class, 'interestSent']);
    Route::post('/shortlist', [UserActionController::class, 'shortlist']);

    Route::get('/acceptMe', [BrowseController::class, 'acceptMe']);
    Route::get('/acceptByMe', [BrowseController::class, 'acceptByMe']);
    Route::post('/getShortlist', [BrowseController::class, 'getShortlist']);
    Route::get('/dailyRecommendation', [BrowseController::class, 'dailyRecommendation']);
    Route::post('/latestProfile', [BrowseController::class, 'latestProfile']);

    //Dropdown API

    Route::get('/basicDropdown', [DropdownController::class, 'basicDropdown']);
    Route::get('/careerDropdown', [DropdownController::class, 'careerDropdown']);
    Route::get('/familyDropdown', [DropdownController::class, 'familyDropdown']);
    Route::get('/likesDropdown', [DropdownController::class, 'likesDropdown']);
    Route::get('/lifestyleDropdown', [DropdownController::class, 'lifestyleDropdown']);


    Route::get('/countryDropdown/{r_id}', [DropdownController::class, 'countryDropdown']);
    Route::get('/stateDropdown/{c_id}', [DropdownController::class, 'stateDropdown']);
    Route::get('/cityDropdown/{s_id}', [DropdownController::class, 'cityDropdown']);
    Route::get('/casteDropdown/{r_id}', [DropdownController::class, 'casteDropdown']);

    //Masters
    Route::get('/allStateDropdown', [DropdownController::class, 'allStateDropdown']);
    Route::get('/allCityDropdown', [DropdownController::class, 'allCityDropdown']);
    Route::get('/sectDropdown', [DropdownController::class, 'sectDropdown']);

    Route::get('/getRegisterFormStatus', [ProfileController::class, 'getRegisterFormStatus']);

    Route::get('/sendOtp', [ProfileController::class, 'sendOtpToMail']);
    Route::post('/checkOtp', [ProfileController::class, 'checkOtpToMail']);

    //Skip Otp Section
    Route::get('/skipOtp', [ProfileController::class, 'skipOtp']);

    Route::post('/storeProfileImage', [ProfileController::class, 'storeProfileImage']);
    Route::get('/getProfileImage', [ProfileController::class, 'getProfileImage']);

    Route::get('/profileSidebar', [DashboardController::class, 'profileSidebar']);
    Route::get('/profileDashboard', [DashboardController::class, 'profileDashboard']);
    //Membership Plan
    Route::get('/getMembershipDetail/{package_id}', [MembershipController::class, 'getMembershipDetail']);

    //Payment Gateway
    Route::post('/checkoutMembership', [CheckoutController::class, 'checkoutMembership']);

    //Detail Profile
    Route::get('/introduction/{id}', [DetailProfileController::class, 'introduction']);
    Route::post('/about', [DetailProfileController::class, 'about']);
    Route::post('/education', [DetailProfileController::class, 'education']);
    Route::post('/family', [DetailProfilecontroller::class, 'family']);
    Route::post('/lifestyle', [DetailProfilecontroller::class, 'lifestyle']);
    Route::post('/likes', [DetailProfilecontroller::class, 'likes']);
    Route::post('/desired', [DetailProfilecontroller::class, 'desired']);
    // All User Profiles
    Route::post('/getAllUserProfiles', [ProfileController::class, 'getAllUserProfiles']);






    //ADMIN ROUTES
    Route::post('/adminRegister', [AuthenticationController::class, 'adminRegister']);

    Route::post('/updateStatus', [ActionController::class, 'updateStatus']);


    Route::post('/addPackage', [PackageController::class, 'addPackage']);
    Route::post('/addPackage', [PackageController::class, 'addPackage']);
    Route::post('/addCaste', [CasteController::class, 'addCaste']);
    Route::post('/addEducation', [EducationController::class, 'addEducation']);
    Route::post('/addFamilyType', [FamilyTypeController::class, 'addFamilyType']);
    Route::post('/addFamilyValue', [FamilyValueController::class, 'addFamilyValue']);
    Route::post('/addHeight', [HeightController::class, 'addHeight']);
    Route::post('/addHobbies', [HobbiesController::class, 'addHobby']);
    Route::post('/addIncome', [IncomeController::class, 'addIncome']);
    Route::post('/addIntrest', [IntrestsController::class, 'addIntrest']);
    Route::post('/addMotherTongue', [MotherTongueController::class, 'addMotherTongue']);
    Route::post('/addOccupation', [OccupationController::class, 'addOccupation']);
    Route::post('/addReligion', [ReligionController::class, 'addReligion']);
    Route::post('/addResidence', [ResidenceController::class, 'addResidence']);
    Route::post('/addSect', [SectController::class, 'addSect']);

    Route::get('/getAdminList', [AuthenticationController::class, 'getAdminList']);
    Route::get('/getUserList', [AuthenticationController::class, 'getUserList']);

    Route::get('/getPackageList', [PackageController::class, 'getPackageList']);
    Route::get('/getCasteList', [CasteController::class, 'getCasteList']);
    Route::get('/getEducationList', [EducationController::class, 'getEducationList']);
    Route::get('/getFamilyValueList', [FamilyValueController::class, 'getFamilyValueList']);
    Route::get('/getFamilyTypeList', [FamilyTypeController::class, 'getFamilyTypeList']);
    Route::get('/getHeightList', [HeightController::class, 'getHeightList']);
    Route::get('/getHobbiesList', [HobbiesController::class, 'getHobbiesList']);
    Route::get('/getIncomeList', [IncomeController::class, 'getIncomeList']);
    Route::get('/getIntrestsList', [IntrestsController::class, 'getIntrestsList']);
    Route::get('/getMotherTongueList', [MotherTongueController::class, 'getMotherTongueList']);
    Route::get('/getOccupationList', [OccupationController::class, 'getOccupationList']);
    Route::get('/getReligionList', [ReligionController::class, 'getReligionList']);
    Route::get('/getResidenceList', [ResidenceController::class, 'getResidenceList']);
    Route::get('/getSectList', [SectController::class, 'getSectList']);
});


// Route::group(['namespace' => 'Admin', 
           
//             'middleware' => 'auth:is_admin'], function() {
//                 Route::get('/getPackageList',[PackageController::class,'getPackageList']);
// });

// Route::middleware('auth:is_admin')->group(function () {
//     Route::get('/getPackageList',[PackageController::class,'getPackageList']);
    
// });
