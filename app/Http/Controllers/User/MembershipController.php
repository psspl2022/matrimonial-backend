<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class MembershipController extends Controller
{
    public function getMembershipDetail($package_id){
        $data = Package::where('id', $package_id)->first();
        return response()->json($data, 200);
    }   
}
