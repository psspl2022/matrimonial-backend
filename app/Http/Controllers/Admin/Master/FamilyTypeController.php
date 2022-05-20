<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamilyType;

class FamilyTypeController extends Controller
{
    public function getFamilyTypeList(){
        $response = FamilyType::select('id','type', 'status')->get();
        return response()->json($response, 200);
    }
}
