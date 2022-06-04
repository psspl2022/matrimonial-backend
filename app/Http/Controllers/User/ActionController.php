<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\ProfileVisit;

class ActionController extends Controller
{
    public function sendInterest($id, Request $req){
        $validator = Validator::make($req->all(),[
            'intrest_id'=>'required',
        ]);

            $data = new SendInterest();
            $data->by_reg_id = $id;
            $data->reg_id = $req->id;
            $data->revert = 0;
            // $data->added_by = Auth::user()->id;
            
            if($data->save()){
                return response()->json('msg','Interest sent Succesfully');
            }else{
                return response()->json('msg','Error while sending interest!');
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }


    }

    public function sendInterestRevert($id, Requqst $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
            'intrest_by_id'=>'required',
            'revert'=>'required'
        ]);

            $data = SendInterest()::where('by_reg_id', $req->intrest_by_id)->where('reg_id', $id)->where('revert', $req->revert)->first();
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

    public function shortlist($id, Requqst $req){
        $validator = Validator::make($req->all(),[
            'id' => 'required',   
        ]);

            $data = new Shortlist();
            $data->by_reg_id = $id;
            $data->saved_reg_id = $req->id;
            // $data->added_by = Auth::user()->id;
            
            if($data->save()){
                return response()->json('msg','Shortlisted Succesfully');
            }else{
                return response()->json('msg','Error while shortlisting!');
            }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function viewProfile($id, Requqst $req){
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