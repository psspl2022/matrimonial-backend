<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\FamilyValue;

class FamilyValueController extends Controller
{
    public function addFamilyValue(Request $req){
        $validator = Validator::make($req->all(),[
            'value'=>'required',
        ]);

        $data = new FamilyValue();
        $data->value = $req->value;
        if($data->save()){
            $responseArray['msg'] = "Family Value Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getFamilyValueList(){
        $response = FamilyValue::select('id','value', 'status')->get();
        return response()->json($response, 200);
    }
}
