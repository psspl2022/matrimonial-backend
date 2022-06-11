<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;

class DashboardController extends Controller
{
    public function profileSidebar(){
        $id = Auth::user()->user_reg_id;
        $data = UserPackage::where('reg_id',$id)->with('getPackage:id,name')->first();   
        return response()->json( $data, 200);  
    }
}
