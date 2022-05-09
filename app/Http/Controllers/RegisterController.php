<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;

class RegisterController extends Controller
{
    public function createRegister(Request $req){
        $validator = Validator::make($req->all(),[
            'for' => 'required',
            'email'=>'required',
            // 'contact'=>'required',
                 
        ]);

        //Matrimony Id
        $total_rows = Register::orderBy('id', 'desc')->count();
        $matrimony_id = "NM/";
        if($total_rows==0){
            $matrimony_id .= '00001';
        }else{
            $last_id = Register::orderBy('id', 'desc')->first()->id;
            $matrimony_id .= sprintf("%'05d",$last_id + 1);
        }
        

        $data = new Register();
        $data->matrimony_id = $matrimony_id;
        $data->profile_for = $req->for;
        $data->email = $req->email;
        $data->contact = $req->contact;
        $data->stage_no = 1;

        // $data->added_by = Auth::user()->id;
         if($data->save()){
            return response()->json( ['msg'=>'Registered Succesfully']);
        }else{
            return response()->json( ['msg'=>'Error while registering!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
}
