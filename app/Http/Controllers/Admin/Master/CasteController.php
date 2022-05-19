<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Caste;


class CasteController extends Controller
{
    
    public function getCasteList(){
        $response = Caste::select('id','caste', 'status')->get();
        return response()->json($response, 200);
    }
   
}    
