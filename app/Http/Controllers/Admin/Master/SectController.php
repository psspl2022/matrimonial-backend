<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sect;

class SectController extends Controller
{
    public function getSectList(){
        $response = Sect::select('id','name', 'status')->get();
        return response()->json($response, 200);
    }
}
