<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Carbon;
use App\Models\VerifyUser;
use App\Models\DesiredProfile;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\Age;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\UserRegister;
use Illuminate\Support\Facades\DB;

class DesireTest extends Controller
{
    public function showDesiredProfiles(Request $req)
    {
        return $req->all();
        // $reg_id = Auth::user()->user_reg_id;
        // $data1 = DesiredProfile::where('reg_id', $reg_id)->first();
        // // $data3 = DB::table('basic_details')->select(['height', 'caste', DB::raw("(case when (height > 21)  then 1 else 0 end) as present"), DB::raw("(case when (caste = 1) then 1  else 0 end) as cast"), DB::raw("SUM(present,cast) as total")])->get()->take(4);

        // $result = DB::select("Select reg_id, height, caste, (100*(IF(height > 21,1, 0)+IF(caste = 1, 1, 0))/4) as percentage from basic_details  order by percentage, reg_id desc limit 5 , 2");
        // $da =  DB::select("Select reg_id, height, caste, (100*(IF(height > 21,1, 0)+IF(caste = 1, 1, 0))/4) as percentage from basic_details  order by percentage desc ");
        // $data3 = BasicDetail::with('getInterestSent:reg_id,reg_id', 'getShortlist:id,saved_reg_id', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->first();

        // $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;
        // // mother tounge
        // $moth = explode(',', $req->moth);
        // // Religion 
        // $relgion = explode(',', $req->religion);
        // // marital status 
        // $martital = explode(',', $req->martital);
        // // if mother tongue value nul set thius value
        // if ($req->moth == 'null') {
        //     $moth = BasicDetail::get('mother_tongue');
        // }
        // // if religion value nul set thius value
        // if ($req->religion == 'null') {
        //     $relgion = BasicDetail::get('religion');
        // }
        // // if marital statu value nul set thius value
        // if ($req->martital == 'null') {
        //     $martital = ['0', '1', '2', '3', '4', '5'];
        // }
        // if (!empty($data1)) {
        //     if ($gender == 1  || $gender == 2) {
        //         $data2 = BasicDetail::get()->take(4);
        //     } else {
        //         $data2 = BasicDetail::with('getCareer:career_details.reg_id,highest_qualification,occupation,income', 'getLifeStyle:lifestyle_details.reg_id,diet_habit,drink_habit,smoking_habit,challenged')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
        //     }
        //     // return $data2;
        //     $count = count($data2);

        //     $marital_arr = explode(",", $data1->marital);
        //     $country_arr = explode(",", $data1->country);
        //     $religion_arr = explode(",", $data1->religion);
        //     $caste_arr = explode(",", $data1->caste);
        //     $mother_arr = explode(",", $data1->mother_tongue);
        //     $manglik_arr = explode(",", $data1->manglik);
        //     $residential_arr = explode(",", $data1->residential);
        //     $education_arr = explode(",", $data1->highest_education);
        //     $occupation_arr = explode(",", $data1->occupation);
        //     $diet_arr = explode(",", $data1->diet);
        //     $drinking_arr = explode(",", $data1->drinking);
        //     $smoking_arr = explode(",", $data1->smoking);
        //     $challenge_arr = explode(",", $data1->challenged);

        //     $k = 0;
        //     $allData = BasicDetail::with('getInterestSent:reg_id,reg_id', 'getShortlist:id,saved_reg_id', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->first();

        //     // $data = ['data' => $data3, 'result' => $result];
        //     $data = ['result' => $result, 'test' => $da];
        //     return response()->json($data, 200);
        // } else {
        //     return response()->json(['msg' => 'Please, Fill desired details first!!'], 201);
        // }
    }
}
