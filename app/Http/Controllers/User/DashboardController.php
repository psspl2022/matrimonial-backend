<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;
use App\Models\SendInterest; 
use App\Models\Shortlist;

class DashboardController extends Controller
{
    public function profileSidebar(){
        $id = Auth::user()->user_reg_id;
        $data = UserPackage::where('reg_id',$id)->with('getPackage:id,name')->first();   
        return response()->json( $data, 200);  
    }

    public function profileDashboard(){
        $id = Auth::user()->user_reg_id;
        $data['creditDetail'] = UserPackage::select('credit_count','view_count','shortlist_count')->where('reg_id',$id)->first();   
        $data['SendInterest'] = SendInterest::where('by_reg_id',$id)->count();   
        $data['ReceiveInterest'] = SendInterest::where('reg_id',$id)->count();  
        $data['shortlist'] = Shortlist::where('by_reg_id',$id)->count();    
        return response()->json( $data, 200);  
    }
}
