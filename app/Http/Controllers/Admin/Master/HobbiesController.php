<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hobbies;

class getHobbiesList extends Controller
{
    public function getHobbiesList(){
        $response = Hobbies::select('id','hobby', 'status')->get();
        return response()->json($response, 200);
    }
}
