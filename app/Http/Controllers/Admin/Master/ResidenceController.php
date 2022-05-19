<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Residence;

class ResidenceController extends Controller
{
    public function getResidenceList(){
        $response = Residence::select('id','income', 'status')->get();
        return response()->json($response, 200);
    }
}
