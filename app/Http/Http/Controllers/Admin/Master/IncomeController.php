<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Income;

class IncomeController extends Controller
{
    public function addIncome(Request $req){
        $validator = Validator::make($req->all(),[
            'income'=>'required',
        ]);

        $data = new Income();
        $data->income = $req->income;
        if($data->save()){
            $responseArray['msg'] = "Income Added Successfully!";
            return response()->json($responseArray, 200);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }  
    }
    
    public function getIncomeList(){
        $response = Income::select('id','income', 'status')->get();
        return response()->json($response, 200);
    }
}
