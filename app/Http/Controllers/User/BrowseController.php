<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\ProfileVisit;

class BrowseController extends Controller
{
  public function interestReceived($id){

    $data = SendInterest::where('reg_id', $id)->get();

    return response()->json('msg','Interested List');
  }

  public function shorlistProfile($id){

    $data = Shortlist::where('by_reg_id', $id)->get();

    return response()->json('msg','List of shortlisted candidate');
  }

  public function visitProfile($id){

    $data = ProfileVisit::where('by_reg_id', $id)->get();

    return response()->json('msg','Profile you visted');
  }

  public function visitByProfile($id){

    $data = ProfileVisit::where('reg_id', $id)->get();

    return response()->json('msg','Profile visited by ');
  }
}
