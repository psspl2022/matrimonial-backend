<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Education;

class EducationController extends Controller
{
    public function addEducation(Request $req){
        $validator = Validator::make($req->all(),[
            'type'=>'required',
            'education'=>'requuired'
        ]);

        $data = new Education();
        $data->type = $req->type;
        $data->education = $req->education;
        if($data->save()){
            $responseArray['msg'] = "Qualification Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getEducationList(){
        $response = Education::select('id','type', 'education', 'status')->get();
        return response()->json($response, 200);
    }
}
