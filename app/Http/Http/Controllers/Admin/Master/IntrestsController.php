<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Intrest;

class IntrestsController extends Controller
{
    public function addIntrest(Request $req){
        $validator = Validator::make($req->all(),[
            'intrest'=>'required',
        ]);

        $data = new Intrest();
        $data->intrest = $req->intrest;
        if($data->save()){
            $responseArray['msg'] = "Intrest Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
    
    public function getIntrestsList(){
        $response = Intrest::select('id','intrest', 'status')->get();
        return response()->json($response, 200);
    }
}
