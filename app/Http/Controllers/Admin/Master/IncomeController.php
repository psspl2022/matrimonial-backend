<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;

class IncomeController extends Controller
{
    public function getIncomeList(){
        $response = Income::select('id','income', 'status')->get();
        return response()->json($response, 200);
    }
}
