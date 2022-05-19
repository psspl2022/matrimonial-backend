<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intrests;

class IntrestsController extends Controller
{
    public function getIntrestsList(){
        $response = Intrests::select('id','hobby', 'status')->get();
        return response()->json($response, 200);
    }
}
