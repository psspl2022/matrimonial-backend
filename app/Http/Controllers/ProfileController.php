<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\FamilyDetail;

class ProfileController extends Controller
{
    public function createBasic(Request $req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            // 'dob' => 'required',
            // 'maritial_status' => 'required',
            // 'religion' => 'required',
            // 'caste' => 'required',
            // 'sub_caste' => 'required',
            // 'mother_tongue' => 'required',
            // 'horrorscope_match_required' => 'required',
            // 'height' => 'required',
            // 'manglik' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'city' => 'required',
            // 'city_live_in' => 'required',
            // 'sect' => 'required',
            // 'live_with_family' => 'required',
            // 'desc' => 'required'
        ]);
        // return response()->json($req->name);
        $data = new BasicDetail();
        // $data->reg_id = $reg_id;
        $data->name = $req->name;
        // $data->dob = $req->dob;
        // $data->maritial_status = $req->maritial_status;
        // $data->religion = $req->religion;
        // $data->caste = $req->caste;
        // $data->sub_caste = $req->sub_caste;
        // $data->mother_tongue = $req->mother_tongue;
        // $data->horrorscope_match_required = $req->horrorscope_match_required;
        // $data->height = $req->height;
        // $data->manglik = $req->manglik;
        // $data->country = $req->country;
        // $data->state = $req->state;
        // $data->city = $req->city;
        // $data->sect = $req->sect;
        // $data->live_with_family = $req->live_with_family;
        // $data->description = $req->description;
        // $data->added_by = Auth::user()->id;
        if($data->save()){
            return response()->json( ['msg'=>'Basic Details updated Succesfully']);
        }else{
            return response()->json( ['msg'=>'Error while uploading basic details!']);
        }
       
        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }        
    }

    // public function updateBasic($id, Request $req){
    //     $validator = Validator::make($req->all(),[
    //         'name' => 'required',
    //         // 'dob' => 'required',
    //         // 'maritial_status' => 'required',
    //         // 'religion' => 'required',
    //         // 'caste' => 'required',
    //         // 'sub_caste' => 'required',
    //         // 'mother_tongue' => 'required',
    //         // 'horrorscope_match_required' => 'required',
    //         // 'height' => 'required',
    //         // 'manglik' => 'required',
    //         // 'country' => 'required',
    //         // 'state' => 'required',
    //         // 'city' => 'required',
    //         // 'city_live_in' => 'required',
    //         // 'sect' => 'required',
    //         // 'live_with_family' => 'required',
    //         // 'desc' => 'required'
    //     ]);
    //     // return response()->json($req->name);
    //     $data = BasicDetail::find($id);
    //     // $data->reg_id = $reg_id;
    //     $data->name = $req->name;
    //     $data->dob = $req->dob;
    //     $data->maritial_status = $req->maritial_status;
    //     $data->religion = $req->religion;
    //     $data->caste = $req->caste;
    //     $data->sub_caste = $req->sub_caste;
    //     $data->mother_tongue = $req->mother_tongue;
    //     $data->horrorscope_match_required = $req->horrorscope_match_required;
    //     $data->height = $req->height;
    //     $data->manglik = $req->manglik;
    //     $data->country = $req->country;
    //     $data->state = $req->state;
    //     $data->city = $req->city;
    //     $data->sect = $req->sect;
    //     $data->live_with_family = $req->live_with_family;
    //     $data->income = $req->income;
    //     $data->description = $req->description;
    //     $data->added_by = Auth::user()->id;
    //     $data->save();
       
    //     if($validator->fails()){
    //         return response()->json($validator->errors(),202);
    //     }        
    // }


    public function showBasicById($id){     
        $data = BasicDetail::find($id);       
        return response()->json( $data);
    }

    public function createCareer(Request $req){
        $validator = Validator::make($req->all(),[
            'highest_qualification' => 'required',
            'schooling'=>'required',
            // 'ug_qualification'=>'required',
            // 'ug_clg'=>'required',
            // 'pg_qualification'=>'required',
            // 'pg_clg'=>'required',
            // 'employement_sector'=>'required',
            // 'occupation'=>'required',
            // 'income'=>'required',
            // 'express_yourself'=>'required'
        ]);

        $data = new CareerDetail();
        // $data->reg_id = $reg_id;
        $data->highest_qualification = $req->highest_qualification;
        $data->schooling = $req->schooling;
        // $data->ug_qualification = $req->ug_qualification;
        // $data->ug_clg = $req->ug_clg;
        // $data->pg_qualification = $req->pg_qualification;
        // $data->pg_clg = $req->pg_clg;
        // $data->employement_sector = $req->employement_sector;
        // $data->occupation = $req->occupation;
        // $data->income = $req->income;
        // $data->express_yourself = $req->express_yourself;
         // $data->added_by = Auth::user()->id;
         if($data->save()){
            return response()->json( ['msg'=>'Career Details updated Succesfully']);
        }else{
            return response()->json( ['msg'=>'Error while uploading career details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function showCareerById($id){     
        $data = CareerDetail::find($id);   
        return response()->json( $data);  
    }  

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

    public function showFamilyById($id){     
        $data = FamilyDetail::find($id);   
        return response()->json( $data);  
    } 
}


