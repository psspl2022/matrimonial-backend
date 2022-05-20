<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Religion;

class ReligionController extends Controller
{
    public function getReligionList(){
        $response = Religion::select('id','religion', 'status')->get();
        return response()->json($response, 200);
    }
}
