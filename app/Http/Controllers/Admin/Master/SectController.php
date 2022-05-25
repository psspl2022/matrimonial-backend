<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Sect;

class SectController extends Controller
{   
    public function addSect(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required'
        ]);

        $data = new Sect();
        $data->name = $req->name;
        if($data->save()){
            $responseArray['msg'] = "Sect Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getSectList(){
        $response = Sect::select('id','name', 'status')->get();
        return response()->json($response, 200);
    }
}
