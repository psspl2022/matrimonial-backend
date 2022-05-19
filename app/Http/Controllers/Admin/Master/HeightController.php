<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Height;

class HeightController extends Controller
{
    public function getHeightList(){
        $response = Height::select('id','height', 'status')->get();
        return response()->json($response, 200);
    }
}
