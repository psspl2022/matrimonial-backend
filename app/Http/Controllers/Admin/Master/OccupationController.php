<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occupation;

class OccupationController extends Controller
{
    public function getOccupationList(){
        $response = Occupation::select('id','type', 'education', 'status')->get();
        return response()->json($response, 200);
    }
}
