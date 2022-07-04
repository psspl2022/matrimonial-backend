<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\BasicDetail;
use App\Models\ProfileVisit;
use App\Models\UserRegister;

class BrowseController extends Controller
{

  public function acceptByMe(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $basicData = BasicDetail::whereRelation('getInterestSent','revert','=', "1")->with('getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
                          
    $data = $basicData;    
    
    return response()->json($data,200);
  }

  public function acceptMe(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $basicData = BasicDetail::whereRelation('getInterestReceived','revert','=', "1")->with('getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
                          
    $data = $basicData;    
    
    return response()->json($data,200);
  }

   public function getShortlist(){

    $reg_id = Auth::user()->user_reg_id;        
        
    $data = BasicDetail::with('getProfileImage:by_reg_id,identity_card_doc','getUserRegister:id,gender','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
     
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


  public function dailyRecommendation(){
    $reg_id = Auth::user()->user_reg_id;  
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;   
    
    if($gender == 1  || $gender == 2)
    {$data = BasicDetail::whereRelation('getUserRegister', 'gender','!=', $gender)->with('getInterestSent:reg_id,reg_id','getshortlist:saved_reg_id,saved_reg_id','getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->inRandomOrder()->limit(2)->get();
    } else{
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id','getshortlist:saved_reg_id,saved_reg_id','getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->where('reg_id', '!=', $reg_id)->inRandomOrder()->limit(2)->get();
    }

    return response()->json($data, 200);
  }

  public function latestProfile(){
    $reg_id = Auth::user()->user_reg_id;  
    $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;   
    
    if($gender == 1  || $gender == 2)
    {$data = BasicDetail::whereRelation('getUserRegister', 'gender','!=', $gender)->with('getInterestSent:reg_id,reg_id','getshortlist:saved_reg_id,saved_reg_id','getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->orderByDesc('id')->limit(2)->get();
    } else{
      $data = BasicDetail::with('getInterestSent:reg_id,reg_id','getshortlist:saved_reg_id,saved_reg_id','getUserRegister:id,gender','getProfileImage:by_reg_id,identity_card_doc','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->where('reg_id', '!=', $reg_id)->orderByDesc('id')->limit(2)->get();
    }
    
    return response()->json($data, 200);
  }
}
