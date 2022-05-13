<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\FamilyDetail;
use App\Models\Register;

class ProfileController extends Controller
{
    public function createBasic(Request $req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'dob' => 'required',
            'maritial_status' => 'required',
            'religion' => 'required',
            'caste' => 'required',
            // 'sub_caste' => 'required',
            'mother_tongue' => 'required',
            'horrorscope_match_required' => 'required',
            'height' => 'required',
            'manglik' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required'
            // 'city_live_in' => 'required',
            // 'sect' => 'required',
            // 'live_with_family' => 'required',
            // 'desc' => 'required'
        ]);
        // return response()->json($req->name);
        $data = new BasicDetail();
        // $data->reg_id = $reg_id;
        $data->name = $req->name;
        $data->dob = $req->dob;
        $data->maritial_status = $req->maritial_status;
        $data->religion = $req->religion;
        $data->caste = $req->caste;
        // $data->sub_caste = $req->sub_caste;
        $data->mother_tongue = $req->mother_tongue;
        $data->horrorscope_match_required = $req->horrorscope_match_required;
        $data->height = $req->height;
        $data->manglik = $req->manglik;
        $data->country = $req->country;
        $data->state = $req->state;
        $data->city = $req->city;
        $data->pincode = $req->pincode;
        // $data->sect = $req->sect;
        // $data->live_with_family = $req->live_with_family;
        // $data->description = $req->description;
        // $data->added_by = Auth::user()->id;
        if($data->save()){

            $data1 = Register::find(Auth::user()->reg_id);
            $data1->stage_no = 2;
            $data1->save();
            
            return response()->json( ['msg'=>'Basic Details added Succesfully']);
        }else{
            return response()->json( ['error_msg'=>'Error while uploading basic details!']);
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


    public function createCareer(Request $req){
        $validator = Validator::make($req->all(),[
            'highest_qualification' => 'required',
            'schooling'=>'required',
            'ug_qualification'=>'required',
            // 'ug_clg'=>'required',
            'pg_qualification'=>'required',
            // 'pg_clg'=>'required',
            'employement_sector'=>'required',
            'occupation'=>'required',
            'income'=>'required',
            'express_yourself'=>'required'
        ]);

        $data = new CareerDetail();
        // $data->reg_id = $reg_id;
        $data->highest_qualification = $req->highest_qualification;
        $data->schooling = $req->schooling;
        $data->ug_qualification = $req->ug_qualification;
        // $data->ug_clg = $req->ug_clg;
        $data->pg_qualification = $req->pg_qualification;
        // $data->pg_clg = $req->pg_clg;
        $data->employement_sector = $req->employement_sector;
        $data->occupation = $req->occupation;
        $data->income = $req->income;
        $data->express_yourself = $req->express_yourself;
         // $data->added_by = Auth::user()->id;
         if($data->save()){

            $data1 = Register::find(Auth::user()->reg_id);
            $data1->stage_no = 3;
            $data1->save();

            return response()->json(['msg'=>'Career Details Added Succesfully']);
        }else{
            return response()->json(['error_msg'=>'Error while uploading career details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
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
            // 'native_state'=>'required',
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
        // $data->native_state = $req->native_city;
        // $data->family_live_in = $req->family_live_in;
        // $data->family_income = $req->family_income;
        // $data->gotra = $req->gotra;
        // $data->about_family = $req->about_family;
        // $data->added_by = Auth::user()->id;
         if($data->save()){

            $data1 = Register::find(Auth::user()->reg_id);
            $data1->stage_no = 4;
            $data1->save();

            return response()->json('msg','Family Details added Succesfully', 200);
        }else{
            return response()->json('msg','Error while uploading family details!');
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

   



    //

    public function showBasicById($id){     
        $data = BasicDetail::find($id);       
        return response()->json( $data, 200);
    }

    public function editbasic(Request $req){
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
        // $data = BasicDetail::find(Auth::user()->reg_id);

        $data = BasicDetail::find(1);
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
        if($data->save()){
            return response()->json( 'msg','Basic Details updated Succesfully' , 200);
        }else{
            return response()->json( 'msg','Error while uploading basic details!');
        }
       
        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }        
    }


    public function showAboutById($id){ 
        
        // $id = Auth::user()->reg_id;
        $id = 1;
        $data['yourself'] = BasicDetail::select('description')->where('reg_id',$id)->get();   
        $data['family'] = FamilyDetail::select('about_family')->where('reg_id', $id)->get();
        $data['career'] = CareerDetail::select('express_yourself')->where('reg_id', $id)->get();
        return response()->json( $data,200);  
    } 


    public function EditAbout(Request $req){ 
        
        // $id = Auth::user()->reg_id;
        $id = 1;
        $data = BasicDetail::find($id);
        $data->description = $req->yourself;
        $data->save();

        $data1 = FamilyDetail::fund($id);
        $data1->about_family = $req->family;
        $data1->save();


        $data2 = FamilyDetail::fund($id);
        $data2->express_yourself = $req->career;
        $data2->save();
        
        return response()->json( 'msg','Data has been updated successfully!',200);  
    } 

    public function showCareerById(){  
         // $id = Auth::user()->reg_id;
         $id = 1;

        $data = CareerDetail::find($id);   
        return response()->json( $data, 200);  
    } 

    public function EditCareer(Request $req){        
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

         // $id = Auth::user()->reg_id;
         $id = 1;

        $data = CareerDetail::find($id);
        $data->highest_qualification = $req->highest_qualification;
        $data->schooling = $req->schooling;
        // $data->ug_qualification = $req->ug_qualification;
        // $data->ug_clg = $req->ug_clg;
        // $data->pg_qualification = $req->pg_qualification;
        // $data->pg_clg = $req->pg_clg;
        // $data->employement_sector = $req->employement_sector;
        // $data->occupation = $req->occupation;
        // $data->organization_name = $req->organization;
        // $data->income = $req->income;
        // $data->express_yourself = $req->express_yourself;
         if($data->save()){
            return response()->json('msg','Career Details updated Succesfully');
        }else{
            return response()->json('msg','Error while uploading career details!');
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
     
    public function showFamilyById($id){     
        $data = FamilyDetail::find($id);   
        return response()->json( $data, 200);  
    } 

    public function editFamily(Request $req){     
        $validator = Validator::make($req->all(),[
            'family_type' => 'required',
            'family_values'=>'required',
            // 'family_status'=>'required',
            //'profile_handler_name' => 'required',
            // 'father_occupation'=>'required',
            // 'mother_occupation'=>'required',
            // 'brother_count'=>'required',
            // 'married_brother_count'=>'required',
            // 'sister_count'=>'required',
            // 'married_sister_count'=>'required',
            // 'family_address'=>'required',
            // 'native_state'=>'required',
            // 'family_live_in'=>'required',
            // 'family_income'=>'required',
            // 'gotra'=>'required',
            // 'gotra_maternal'=>'required',
            // 'about_family'=>'required'            
        ]);

        $data = new FamilyDetail();
        $data->family_type = $req->family_type;
        $data->family_values = $req->family_values;
        // $data->family_status = $req->family_status;
        // $data->profile_handler_name = $req->handler_name
        // $data->father_occupation = $req->father_occupation;
        // $data->mother_occupation = $req->mother_occupation;
        // $data->brother_count = $req->brother_count;
        // $data->married_brother_count = $req->married_brother_count;
        // $data->sister_count = $req->sister_count;
        // $data->married_sister_count = $req->married_sister_count;
        // $data->family_address = $req->family_address;
        // $data->native_state = $req->native_city;
        // $data->family_live_in = $req->family_live_in;
        // $data->family_income = $req->family_income;
        // $data->gotra = $req->gotra;
        // $data->gotra_maternal = $req->gotra_maternal;
        // $data->about_family = $req->about_family;
         if($data->save()){
            return response()->json('msg','Family Details updated Succesfully', 200);
        }else{
            return response()->json('msg','Error while uploading family details!');
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }          
    }   

    public function showContactById($id){     
        $data = Register::find($id);   
        return response()->json( $data, 200);  
    }  
    
    public function editContact(Request $req){
        $validator = Validator::make($req->all(),[
            'contact' => 'required',
            // 'email'=>'required',
            // 'landline' => 'required',
            // 'contact_address'=>'required',
            // 'contact_pincode'=>'required',
            // 'parent_address'=>'required',
            // 'parent_pincode'=>'required',  
            // 'time_for_call' =>'required'        
        ]);

        $data = new FamilyDetail();
        $data->contact = $req->contact;
        if(empty($req->a_contact) ? NULL : $req->a_contact)
        $data->email = $req->email;
        if(empty($req->a_email) ? NULL : $req->a_email)
        // $data->landline = $req->landline;
        // $data->contact_address = $req->contact_address
        // $data->contact_pincode = $req->contact_pincode;
        // $data->parent_address = $req->parent_address;
        // $data->parent_pincode = $req->parent_pincode;
        // $data->time_for_call = $req->time_for_call;
      
         if($data->save()){
            return response()->json('msg','Family Details updated Succesfully', 200);
        }else{
            return response()->json('msg','Error while uploading family details!');
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }    

    } 

    public function editLifestyle(Request $req){
        $validator = Validator::make($req->all(),[
            // 'diet' => 'required',
            // 'drinking'=>'required',
            // 'smoking' => 'required',
            // 'pet'=>'required',
            // 'house'=>'required',
            // 'car'=>'required',
            // 'language'=>'required',  
            // 'blood_group' =>'required', 
            // 'hiv' =>'required',
            // 'challenged' =>'required',
            // 'thalemsemia' =>'required'            
        ]);

        $data = new FamilyDetail();
        $data->contact = $req->contact;
        if(empty($req->a_contact) ? NULL : $req->a_contact)
        $data->email = $req->email;
        if(empty($req->a_email) ? NULL : $req->a_email)
        $product = Product::updateOrCreate(
            // [ 'reg_id' =>  ],
            [ 'price' => 130, 'price_update_date' => date('Y-m-d') ]
        );
  
      
         if($data->save()){
            return response()->json('msg','Lifestyle Details updated Succesfully', 200);
        }else{
            return response()->json('msg','Error while uploading family details!');
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }    

    } 
    
}
