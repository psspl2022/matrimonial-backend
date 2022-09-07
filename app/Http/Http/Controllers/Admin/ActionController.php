<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ActionController extends Controller
{
    public function updateStatus(Request $req){

        $modelName = "App\\Models\\".$req->model;
        $status = $req->status == "0" ? "1" : "0";

        $data = $modelName::find($req->id);
        $data->status = $status;
        if($data->save()){
            $responseArray['msg'] = "Status Updated Successfully!";
            return response()->json($responseArray, 200);
        }

    }
}
