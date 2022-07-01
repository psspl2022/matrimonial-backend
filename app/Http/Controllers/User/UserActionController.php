<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\ProfileVisit;
use App\Models\UserPackage;


class UserActionController extends Controller
{
    public function sendIntrest(Request $req){
        $validator = Validator::make($req->all(),[
            'id'=>'required',
        ]);

            $data = new SendInterest();
            $data->by_reg_id =  Auth::user()->user_reg_id;
            $data->reg_id = $req->id;
            $data->revert = "0";
            // $data->added_by = Auth::user()->id;
            
        
            if($data->save()){
                return response()->json(['succmsg'=>'Intrest sent Succesfully!']);
            }else{
                return response()->json(['errmsg'=>'Error while sending interest!']);
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }


    }

    public function interestReceived(){        
        $reg_id = Auth::user()->user_reg_id;
        $data1 = SendInterest::where('reg_id', $reg_id)->where('revert','=', '0')->pluck('by_reg_id')->toArray();
        
        $basicData = BasicDetail::with('getUserRegister:id,gender','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->whereIn('reg_id', $data1)->get();
                             
        $data = $basicData;    
        
        return response()->json($data,200);
        
    }
    
    public function sendInterestRevert(Request $req){
        $validator = Validator::make($req->all(),[
            'id'=>'required',
            'revert'=>'required'
        ]);

            $data = SendInterest::where('by_reg_id', $req->id)->where('reg_id', Auth::user()->user_reg_id)->first();
            $data->revert = $req->revert;
            
            if($data->save()){
               return response()->json(['succmsg'=>'Reverted Succesfully']);
            }else{
                return response()->json(['errmsg'=>'Error while reverting!']);
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function interestSent(){        
        $reg_id = Auth::user()->user_reg_id;        
        
        $basicData = BasicDetail::whereRelation('getInterestSent','by_reg_id','=', $reg_id)->whereRelation('getInterestSent','revert','=', '0')->with('getUserRegister:id,gender','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city')->get();
                             
        $data = $basicData;    
        
        return response()->json($data,200);
        
    }

    public function shortlist(Request $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
        ]);
            $leftCount = UserPackage:: select('shortlist_count')->where('reg_id', Auth::user()->user_reg_id)->first();
            $check = Shortlist::where('by_reg_id', Auth::user()->user_reg_id)->where('saved_reg_id', $req->id)->first();
            if(empty($check)){
                if($leftCount['shortlist_count'] != 0){
                    $data = new Shortlist();
                    $data->by_reg_id = Auth::user()->user_reg_id;
                    $data->saved_reg_id = $req->id;
                    if($data->save()){
                        UserPackage::where('reg_id', Auth::user()->user_reg_id)->decrement('shortlist_count',1);
                        return response()->json(['succmsg'=>'Shortlisted!'], 200);
                    }
                }
                else{
                    return response()->json(['errmsg'=>'No Shortlist Count left!'], 203);
                }
            } else {
                Shortlist::where('id',$check->id)->delete();
                    return response()->json(['succmsg'=>'Remove Shortlisted!'], 200);             
            }
           
           
          

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function viewProfile($id, Request $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
        ]);

            $data = new ProfileVisit();
            $data->by_reg_id = $id;
            $data->reg_id = $req->id;
            $data->revert = 0;
            // $data->added_by = Auth::user()->id;
            
            if($data->save()){
                return response()->json('msg','Visited Succesfully');
            }else{
                return response()->json('msg','Error while visiting!');
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }


    }
}