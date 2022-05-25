<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\MotherTongue;

class MotherTongueController extends Controller
{
    public function addMotherTongue(Request $req){
        $validator = Validator::make($req->all(),[
            'type'=>'required',
            'mother_tongue'=>'required'
        ]);

        $data = new MotherTongue();
        $data->type = $req->type;
        $data->mother_tongue = $req->mother_tongue;
        if($data->save()){
            $responseArray['msg'] = "Mother Tongue Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getMotherTongueList(){
        $response = MotherTongue::select('id','type', 'mother_tongue', 'status')->get();
        return response()->json($response, 200);
    }
}
