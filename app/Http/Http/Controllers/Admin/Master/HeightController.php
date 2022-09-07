<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Height;

class HeightController extends Controller
{
    public function addHeight(Request $req){
        $validator = Validator::make($req->all(),[
            'height'=>'required',
        ]);

        $data = new Height();
        $data->height = $req->height;
        if($data->save()){
            $responseArray['msg'] = "Height Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }


    public function getHeightList(){
        $response = Height::select('id','height', 'status')->get();
        return response()->json($response, 200);
    }
}
