<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\FamilyType;

class FamilyTypeController extends Controller
{
    public function addFamilyType(Request $req){
        $validator = Validator::make($req->all(),[
            'type'=>'required',
        ]);

        $data = new FamilyType();
        $data->type = $req->type;
        if($data->save()){
            $responseArray['msg'] = "Family Type Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getFamilyTypeList(){
        $response = FamilyType::select('id','type', 'status')->get();
        return response()->json($response, 200);
    }
}
