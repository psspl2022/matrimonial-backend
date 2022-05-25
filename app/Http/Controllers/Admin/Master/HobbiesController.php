<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Hobbies;

class HobbiesController extends Controller
{

    public function addHobby(Request $req){
        $validator = Validator::make($req->all(),[
            'hobby'=>'required',
        ]);

        $data = new Hobbies();
        $data->hobby = $req->hobby;
        if($data->save()){
            $responseArray['msg'] = "Hobby Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getHobbiesList(){
        $response = Hobbies::select('id','hobby', 'status')->get();
        return response()->json($response, 200);
    }
}
