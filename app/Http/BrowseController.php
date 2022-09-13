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

  public function acceptByMe()
  {

    $reg_id = Auth::user()->user_reg_id;

    $basicData = BasicDetail::whereRelation('getInterestReceived', 'revert', '=', "1")->with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->get();


    $data = $basicData;

    return response()->json($data, 200);
  }

  public function acceptMe()
  {

    $reg_id = Auth::user()->user_reg_id;
    $basicData = BasicDetail::whereRelation('getInterestSent', 'revert', '=', "1")->with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->get();

    $data = $basicData;

    return response()->json($data, 200);
  }

  public function getShortlist()
  {

    $reg_id = Auth::user()->user_reg_id;

    $data = BasicDetail::where('reg_id', '!=', $reg_id)->whereRelation('getshortlist', 'by_reg_id', '=', $reg_id)->with('getshortlist', 'getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->get();

    return response()->json($data, 200);
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


  public function dailyRecommendation()
  {
    $reg_id = Auth::user()->user_reg_id;
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;

    if ($gender == 1  || $gender == 2) {
      $data = BasicDetail::whereRelation('getUserRegister', 'gender', '!=', $gender)->with('getInterestSent:reg_id,reg_id', 'getshortlist:saved_reg_id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->inRandomOrder()->limit(2)->get();
    } else {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id', 'getshortlist:saved_reg_id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->where('reg_id', '!=', $reg_id)->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->inRandomOrder()->limit(2)->get();
    }

    return response()->json($data, 200);
  }

  public function latestProfile()
  {
    $reg_id = Auth::user()->user_reg_id;
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;

    if ($gender == 1  || $gender == 2) {
      $data = BasicDetail::whereRelation('getUserRegister', 'gender', '!=', $gender)->with('getInterestSent:reg_id,reg_id', 'getshortlist:saved_reg_id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->orderByDesc('id')->limit(2)->get();
    } else {
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id', 'getshortlist:saved_reg_id,saved_reg_id', 'getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', '!=', $reg_id)->orderByDesc('id')->limit(2)->get();
    }

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
    $whereData = [];
    switch ($req->browse) {
      case ('religion'):
        $whereData = ['religion' => $req->browseId];
        break;

      case ('caste'):
        $whereData = ['caste' => $req->browseId];
        break;


      case ('mother'):
        $whereData = ['mother_tongue' => $req->browseId];
        break;


      case ('state'):
        $whereData = ['state' => $req->browseId];
        break;


      case ('city'):
        $whereData = ['city' => $req->browseId];
        break;


      case ('occupation'):
        $data['data'] = BasicDetail::whereRelation('getOccupation', 'occupations.id', '=', $req->browseId)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->limit(1)->offset(0)->get();

        $data['count'] = BasicDetail::whereRelation('getOccupation', 'occupations.id', '=', $req->browseId)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->count();
        break;

      default:
        $data = '';
    }

    if (count($whereData) > 0) {
      $data['data']  = BasicDetail::where($whereData)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->limit(1)->offset(0)->get();

      $data['count'] = BasicDetail::where($whereData)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->count();
    }


    return response()->json($data, 200);
  }

  public function searchProfile(Request $req)
  {
    $min_dob = date('Y-m-d', strtotime('+' . $req->min_age . 'years'));
    $max_dob = date('Y-m-d', strtotime('+' . $req->max_age . 'years'));

    $data = BasicDetail::whereRelation('getUserRegister', 'gender', $req->gender)->where('dob', '<=', $min_dob)->where('dob', '<=', $max_dob)->where('religion', $req->religion)->where('mother_tongue', $req->mother)->with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->get();

    return response()->json($data, 200);
  }

  public function homeProfile()
  {
    $data = BasicDetail::with('getUserRegister:id,gender', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->inRandomOrder()->limit(5)->get();

    return response()->json($data, 200);
  }
}
