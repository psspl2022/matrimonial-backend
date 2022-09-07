<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Occupation;

class OccupationController extends Controller
{
    public function addOccupation(Request $req){
        $validator = Validator::make($req->all(),[
            'occupation_category'=>'required',
            'occupation'=>'required'
        ]);

        $data = new Occupation();
        $data->occupation_category = $req->occupation_category;
        $data->occupation = $req->occupation;
        if($data->save()){
            $responseArray['msg'] = "Occupation Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getOccupationList(){
        $response = Occupation::select('id','occupation_category', 'occupation', 'status')->get();
        return response()->json($response, 200);
    }
}
