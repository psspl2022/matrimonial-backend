<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Package;


class PackageController extends Controller
{
    public function addPackage(Request $req){
        $validator = Validator::make($req->all(),[
            'name'=>'required',
            'price'=>'required',
            'credit'=>'required',
            'view_count'=>'required',
            'shortlist_count'=>'required'                 
        ]);

        $data = new Package();
        $data->name = $req->name;
        $data->credit = $req->credit;
        $data->price = $req->price;
        $data->view_count = $req->view_count;
        $data->shortlist_count = $req->shortlist_count;
        if($data->save()){
            $responseArray['msg'] = "Package Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }

    public function getPackageList(Request $req){
        $response = Package::select('id','name', 'price', 'credit', 'view_count', 'shortlist_count', 'status')->get();
        return response()->json($response, 200);
    }
}
