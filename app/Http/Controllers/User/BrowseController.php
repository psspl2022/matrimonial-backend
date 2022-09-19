<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\BasicDetail;
use App\Models\ProfileVisit;
use App\Models\UserRegister;
use App\Models\Religion;
use App\Models\Caste;
use App\Models\MotherTongue;
use App\Models\State;
use App\Models\City;
use App\Models\Occupation;

class BrowseController extends Controller
{

  public function acceptByMe(Request $req)
  {

    $reg_id = Auth::user()->user_reg_id;

    $basicData = BasicDetail::whereRelation('getInterestReceived', 'revert', '=', "1")->with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->where("reg_id", ">", $req->page)->get()->take(6);

    $ids = BasicDetail::whereRelation('getInterestReceived', 'revert', '=', "1")->select('reg_id')->get();

    $data = $basicData;
    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 6 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current];
    return response()->json($data, 200);
  }

  public function acceptMe(Request $req)
  {

    $reg_id = Auth::user()->user_reg_id;
    $data = BasicDetail::whereRelation('getInterestSent', 'revert', '=', "1")->with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->where("reg_id", ">", $req->page)->get()->take(6);

    $ids = BasicDetail::whereRelation('getInterestSent', 'revert', '=', "1")->select('reg_id')->get();

    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 6 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current];
    return response()->json($data, 200);
  }

  public function getShortlist(Request $req)
  {

    $reg_id = Auth::user()->user_reg_id;

    $data = BasicDetail::where('reg_id', '!=', $reg_id)->whereRelation('getshortlist', 'by_reg_id', '=', $reg_id)->with('getshortlist', 'getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getInterestSent:reg_id,reg_id,revert', 'getShortlist:id,saved_reg_id', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', '>', $req->page)->get()->take(6);
    $ids = BasicDetail::select('reg_id')->where('reg_id', '!=', $reg_id)->whereRelation('getshortlist', 'by_reg_id', '=', $reg_id)->get();
    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 6 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data3 = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current];
    return response()->json($data3, 200);
  }

  public function visitProfile($id)
  {

    $data = ProfileVisit::where('by_reg_id', $id)->get();

    return response()->json('msg', 'Profile you visted');
  }

  public function visitByProfile($id)
  {

    $data = ProfileVisit::where('reg_id', $id)->get();

    return response()->json('msg', 'Profile visited by ');
  }


  public function dailyRecommendation(Request $req)
  {
    $reg_id = Auth::user()->user_reg_id;
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;
    // mother tounge
    $moth = explode(',', $req->moth);
    // Religion 
    $relgion = explode(',', $req->religion);
    // marital status 
    $martital = explode(',', $req->martital);
    // if mother tongue value nul set thius value
    if ($req->moth == 'null') {
      $moth = BasicDetail::get('mother_tongue');
    }
    // if religion value nul set thius value
    if ($req->religion == 'null') {
      $relgion = BasicDetail::get('religion');
    }
    // if marital statu value nul set thius value
    if ($req->martital == 'null') {
      $martital = ['0', '1', '2', '3', '4', '5'];
    }
    if ($gender == 1  || $gender == 2) {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id,revert', 'getShortlist:id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
      $ids = BasicDetail::select('reg_id')->where('reg_id', '!=', Auth::user()->user_reg_id)->whereRelation('getUserRegister', 'gender', '!=', $gender)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
    } else {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id,revert', 'getshortlist:saved_reg_id,saved_reg_id', 'getShortlist:id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->where('reg_id', '!=', $reg_id)->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->inRandomOrder()->limit(2)->get();
      $ids = BasicDetail::select('reg_id')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
    }
    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 4 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data3 = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 4), 'page' => $current];
    return response()->json($data3, 200);
  }

  public function latestProfile(Request $req)
  {
    $reg_id = Auth::user()->user_reg_id;
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;
    if ($req->page == 0) {
      $p = BasicDetail::select('reg_id')->orderByDesc('reg_id')->first();
      $req->page = $p->reg_id + 1;
    }
    // mother tounge
    $moth = explode(',', $req->moth);
    // Religion 
    $relgion = explode(',', $req->religion);
    // marital status 
    $martital = explode(',', $req->martital);
    // if mother tongue value nul set thius value
    if ($req->moth == 'null') {
      $moth = BasicDetail::get('mother_tongue');
    }
    // if religion value nul set thius value
    if ($req->religion == 'null') {
      $relgion = BasicDetail::get('religion');
    }
    // if marital statu value nul set thius value
    if ($req->martital == 'null') {
      $martital = ['0', '1', '2', '3', '4', '5'];
    }
    if ($gender == 1  || $gender == 2) {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id,revert', 'getshortlist:saved_reg_id,saved_reg_id', 'getUserRegister:id,gender', 'getShortlist:id,saved_reg_id',  'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '<', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->orderByDesc('reg_id')->get()->take(4);
      $ids =  BasicDetail::select("reg_id")->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->orderByDesc('reg_id')->get();
    } else {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id,revert', 'getshortlist:saved_reg_id,saved_reg_id',  'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '<', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->orderByDesc('reg_id')->get()->take(4);
      $ids =  BasicDetail::select("reg_id")->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->orderByDesc('reg_id')->get();
    }
    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 4 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 4), 'page' => $current];
    return response()->json($data, 200);
  }

  public function browseProfileBy()
  {
    $data['religion'] = Religion::select('id', 'religion')->get();
    $data['caste'] = Caste::select('id', 'caste')->get();
    $data['mother_tongue'] = MotherTongue::select('id', 'type', 'mother_tongue')->get();
    $data['state'] = State::select('id', 'name',)->where('country_id', 101)->get();
    $data['city'] = City::select('id', 'name',)->wherE('country_id', 101)->get();
    $data['occupation'] = Occupation::select('id', 'occupation')->get();


    return response()->json($data, 200);
  }

  public function browseProfile(Request $req)
  {
    // mother tounge
    $moth = explode(',', $req->moth);
    // Religion 
    $relgion = explode(',', $req->religion);
    // if mother tongue value nul set thius value
    if ($req->moth == 'null') {
      $moth = BasicDetail::get('mother_tongue');
    }
    // if religion value nul set thius value
    if ($req->religion == 'null') {
      $relgion = BasicDetail::get('religion');
    }
    // if marital statu value nul set thius value
    $check = [];
    if ($req->caste != 'null' && $req->caste != "undefined") {
      $check[0] = ['caste', $req->caste];
    }

    // // if marital statu value nul set thius value
    // if ($req->occupation != 'null') {
    //     $check = ['occupation', '==', $req->occupation];
    // }
    // if marital statu value nul set thius value
    if ($req->state != 'null' && $req->state != "undefined") {
      $check[0]   = ['state', $req->state];
    }
    // if marital statu value nul set thius value
    if ($req->city != 'null' && $req->city != "undefined") {
      $check[0]  = ['city', $req->city];
    }
    $gender = $req->gender;
    if ($req->gender != "null" && $req->gender != "undefined") {
      // $check[0] = ['getUserRegister:gender', $req->gender];
      $cond = "=";
      $gender = $req->gender;
    } else {
      $cond = ">";
      $gender = ">= 1";
    }
    //  if gender is male or female
    $data = BasicDetail::with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getState:id,name', 'getCity:id,name', 'getOccupation:occupations.id,occupations.occupation', 'getIncome:incomes.id,incomes.income', 'getEducation:educations.education')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city', 'state', 'marital_status')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->whereRelation('getUserRegister', 'gender', $cond, $gender)->where($check)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->whereBetween('dob', [$req->maxage, $req->minage])->get()->take(6);
    // get unique id for pagination 
    $ids = BasicDetail::select("reg_id")->where($check)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->whereRelation('getUserRegister', 'gender', $cond, $gender)->whereBetween('dob', [$req->maxage, $req->minage])->get();


    // counting number of time loop runing 
    $i = 1;
    // to counting number of page for set the value of current active page
    $page = 0;
    // to setting  current active page
    $current = 0;
    // key for total pagination page 
    $key = [0];
    foreach ($ids as $id) {
      // whene loop reach division of 4 
      if ($i % 6 == 0) {
        $page++;
        // whene rquest page and reg_id match then set current page 
        if ($id->reg_id == $req->page) {
          $current =  $page;
        }
        // whene total number off page divede by 4 then push the reg id as key 
        array_push($key, $id->reg_id);
      }
      $i++;
    }
    $data3 = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current, 'test' => $req->all(), 'test2' => $gender];
    return response()->json($data3, 200);
  }

  public function searchProfile(Request $req)
  {

    $whereData = [];

    if ($req->religion != 'undefined') {
      $array = ['religion', $req->religion];
      array_push($whereData, $array);
    }

    if ($req->mother != 'undefined') {
      $array = ['mother_tongue', $req->mother];
      array_push($whereData, $array);
    }

    if ($req->min_age != 'undefined') {
      $min_dob = date('Y-m-d', strtotime('-' . $req->min_age . 'years'));
      $array = ['dob', '<=', $min_dob];
      array_push($whereData, $array);
    }

    if ($req->max_age != 'undefined') {
      $max_dob = date('Y-m-d', strtotime('-' . $req->max_age . 'years'));
      $array = ['dob', '>=', $max_dob];
      array_push($whereData, $array);
    }

    if ($req->gender == 'undefined' && count($whereData) > 0) {
      $data = BasicDetail::where($whereData)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->get();
    } else {

      $data = BasicDetail::whereRelation('getUserRegister', 'gender', $req->gender)->where($whereData)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->get();
    }
    return response()->json($data, 200);
  }

  public function homeProfile()
  {
    $data = BasicDetail::with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->inRandomOrder()->limit(5)->get();

    return response()->json($data, 200);
  }
}
