<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Caste;


class CasteController extends Controller
{
    public function addCaste(Request $req){
        $validator = Validator::make($req->all(),[
            'caste'=>'required',
                        
        ]);

        $data = new Caste();
        $data->caste = $req->caste;
        if($data->save()){
            $responseArray['msg'] = "Caste Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    
    public function getCasteList(){
        $response = Caste::select('id','caste', 'status')->orderByDesc("id")->get();
        return response()->json($response, 200);
    }
   
}    
