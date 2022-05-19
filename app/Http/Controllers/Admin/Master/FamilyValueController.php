<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamilyValue;

class FamilyValueController extends Controller
{
    public function getFamilyValueList(){
        $response = FamilyValue::select('id','value', 'status')->get();
        return response()->json($response, 200);
    }
}
