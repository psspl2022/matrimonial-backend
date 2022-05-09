<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function createFamily(Request $req){
        $validator = Validator::make($req->all(),[
            'family_type' => 'required',
            'family_values'=>'required',
            // 'family_status'=>'required',
            // 'father_occupation'=>'required',
            // 'mother_occupation'=>'required',
            // 'brother_count'=>'required',
            // 'married_brother_count'=>'required',
            // 'sister_count'=>'required',
            // 'married_sister_count'=>'required',
            // 'family_address'=>'required',
            // 'native_city'=>'required',
            // 'family_live_in'=>'required',
            // 'family_income'=>'required',
            // 'gotra'=>'required',
            // 'about_family'=>'required'            
        ]);

        $data = new FamilyDetail();
        // $data->reg_id = $reg_id;
        $data->family_type = $req->family_type;
        $data->family_values = $req->family_values;
        // $data->family_status = $req->family_status;
        // $data->father_occupation = $req->father_occupation;
        // $data->mother_occupation = $req->mother_occupation;
        // $data->brother_count = $req->brother_count;
        // $data->married_brother_count = $req->married_brother_count;
        // $data->sister_count = $req->sister_count;
        // $data->married_sister_count = $req->married_sister_count;
        // $data->family_address = $req->family_address;
        // $data->native_city = $req->native_city;
        // $data->family_live_in = $req->family_live_in;
        // $data->family_income = $req->family_income;
        // $data->gotra = $req->gotra;
        // $data->about_family = $req->about_family;
        // $data->added_by = Auth::user()->id;
         if($data->save()){
            return response()->json( ['msg'=>'Family Details updated Succesfully']);
        }else{
            return response()->json( ['msg'=>'Error while uploading family details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
}
