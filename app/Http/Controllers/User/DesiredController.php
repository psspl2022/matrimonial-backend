<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\DesiredProfile;
use App\Models\BasicDetail;

class DesiredController extends Controller
{
    public function createBasic(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'min_age'=>$req->minage,
                'max_age'=>$req->maxage,
                'min_height'=>$req->minheight,
                'max_height'=>$req->maxheight,
                'marital'=>$req->marital,
                'country'=>$req->country,
                'residential'=> $req->residence, 
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createReligion(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'religion'=>$req->religion,
                'caste'=>$req->caste,
                'mother_tongue'=>$req->mothertongue,
                'manglik'=>$req->manglik,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createCareer(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'highest_education'=>$req->education,
                'occupation'=>$req->occupation,
                'min_income'=>$req->minincome,
                'max_income'=>$req->maxincome,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createLifestyle(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'diet'=>$req->diet,
                'drinking'=>$req->drinking,
                'smoking'=>$req->smoking,
                'challenged'=>$req->challenged,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createAbout(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'about_desired'=>$req->about,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function showDesiredDetail(){
        $user_id = Auth::user()->id;
        $data = DesiredProfile::where('user_id', $user_id)->first();

        return response()->json($data, 200);
    }    
    
    public function showDesiredProfiles(){
        $user_id = Auth::user()->id;
        $data = DesiredProfile::where('user_id', $user_id)->first();
        
        $marital = explode(',', $data->marital);

        $reg_id = BasicDetail::select('reg_id')->where([

            ['status', '<>', 1 ],
            ['height', '<=', $data->max_height],
            ['height', '>=', $data->min_height]
    
        ])      
        ->whereIn('maritial_status', $marital)
        // ->whereIn('religion', $data->religion)
        // ->whereIn('caste', $data->caste)
        // ->whereIn('caste', $data->caste)
        // ->whereIn('mother_tongue', $data->mother_tongue)
        // ->whereIn('country', $data->country)
        // ->whereIn('manglik', $data->manglik)
        // ->whereIn('height', $data->mother_tongue)

          ->get();

        return response()->json($reg_id, 200);
    }  
    
}




