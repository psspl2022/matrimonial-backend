<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;


class PackageController extends Controller
{
    public function getPackageList(Request $req){
        $response = Package::select('id','name', 'price', 'credit', 'view_count', 'shortlist_count', 'status')->get();
        return response()->json($response, 200);
    }
}
