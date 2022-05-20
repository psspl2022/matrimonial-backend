<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MotherTongue;

class MotherTongueController extends Controller
{
    public function getMotherTongueList(){
        $response = MotherTongue::select('id','type', 'mother_tongue', 'status')->get();
        return response()->json($response, 200);
    }
}
