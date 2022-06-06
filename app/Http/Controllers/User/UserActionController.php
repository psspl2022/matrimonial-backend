<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\ProfileVisit;


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

    public function sendInterestRevert($id, Request $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
            'intrest_by_id'=>'required',
            'revert'=>'required'
        ]);

            $data = SendInterest::where('by_reg_id', $req->intrest_by_id)->where('reg_id', $id)->where('revert', $req->revert)->first();
            $data->by_reg_id = $id;
            $data->reg_id = $req->id;
            $data->revert = 0;
            
            if($data->save()){
                return response()->json('msg','Reverted Succesfully');
            }else{
                return response()->json('msg','Error while reverting!');
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function shortlist(Request $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
        ]);

            $data = new Shortlist();
            $data->by_reg_id = Auth::user()->user_reg_id;
            $data->saved_reg_id = $req->id;
            // $data->added_by = Auth::user()->id;
            
            if($data->save()){
                return response()->json(['succmsg'=>'Shortlisted Succesfully!'], 200);
            }else{
                return response()->json(['errmsg'=>'Error while shortlisting!'], 203);
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