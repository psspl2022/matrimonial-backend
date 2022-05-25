<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\AdminRegister;

class AdminRegisterController extends Controller
{
    public function createRegister(Request $req){
        $validator = Validator::make($req->all(),[
           
            // 'contact'=>'required',
                 
        ]);

    

        //Admin User Id
        // $total_rows = UserRegister::orderBy('id', 'desc')->count();
        // $matrimony_id = "NM/";
        // if($total_rows==0){
        //     $matrimony_id .= '00001';
        // }else{
        //     $last_id = UserRegister::orderBy('id', 'desc')->first()->id;
        //     $matrimony_id .= sprintf("%'05d",$last_id + 1);
        // }
        

        $data = new AdminRegister();
        $data->user_id= 'NULL';
        $data->name = $req->name;
        $data->email = $req->email;
        $data->gender = $req->gender;
        $data->contact = $req->contact;
        $data->country = $req->country;
        $data->state = $req->state;
        $data->city = $req->city;
        $data->address = $req->address;
        $data->added_by = Auth::user()->id;
        $data->save();
              
        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
}
