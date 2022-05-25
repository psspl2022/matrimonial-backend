<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Religion;

class ReligionController extends Controller
{
    public function addReligion(Request $req){
        $validator = Validator::make($req->all(),[
            'religion'=>'required'
        ]);

        $data = new Religion();
        $data->religion = $req->religion;
        if($data->save()){
            $responseArray['msg'] = "Religion Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getReligionList(){
        $response = Religion::select('id','religion', 'status')->get();
        return response()->json($response, 200);
    }
}
