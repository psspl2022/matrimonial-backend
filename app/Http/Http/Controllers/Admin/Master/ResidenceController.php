<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Residence;

class ResidenceController extends Controller
{
    public function addResidence(Request $req){
        $validator = Validator::make($req->all(),[
            'religion'=>'required'
        ]);

        $data = new Residence();
        $data->residence = $req->residence;
        if($data->save()){
            $responseArray['msg'] = "Residence Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getResidenceList(){
        $response = Residence::select('id','residence', 'status')->get();
        return response()->json($response, 200);
    }
}
