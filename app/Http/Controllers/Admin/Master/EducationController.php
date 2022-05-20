<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function getEducationList(){
        $response = Education::select('id','type', 'education', 'status')->get();
        return response()->json($response, 200);
    }
}
