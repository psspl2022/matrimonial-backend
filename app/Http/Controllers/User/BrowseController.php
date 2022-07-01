<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\BasicDetail;
use App\Models\ProfileVisit;

class BrowseController extends Controller
{

  public function acceptByMe(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $basicData = BasicDetail::whereRelation('getUserRegister:id,gender','getInterestSent','revert','=', "1")->whereRelation('getInterestSent','by_reg_id','=', $reg_id)->with('getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
                          
    $data = $basicData;    
    
    return response()->json($data,200);
  }

  public function acceptMe(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $basicData = BasicDetail::whereRelation('getUserRegister:id,gender','getInterestReceived','revert','=', "1")->whereRelation('getInterestReceived','reg_id','=', $reg_id)->with('getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
                          
    $data = $basicData;    
    
    return response()->json($data,200);
  }

   public function getShortlist(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $data = BasicDetail::whereRelation('getShortlist','by_reg_id','=', $reg_id)->with('getUserRegister:id,gender','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
     
    return response()->json($data,200);
  }

  public function visitProfile($id){

    $data = ProfileVisit::where('by_reg_id', $id)->get();

    return response()->json('msg','Profile you visted');
  }

  public function visitByProfile($id){

    $data = ProfileVisit::where('reg_id', $id)->get();

    return response()->json('msg','Profile visited by ');
  }
}
