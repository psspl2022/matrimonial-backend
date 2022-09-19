<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\ProfileVisit;
use App\Models\UserPackage;


class UserActionController extends Controller
{
    public function sendIntrest(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);

        $data = new SendInterest();
        $data->by_reg_id =  Auth::user()->user_reg_id;
        $data->reg_id = $req->id;
        $data->revert = "0";
        // $data->added_by = Auth::user()->id;


        if ($data->save()) {
            return response()->json(['succmsg' => 'Intrest sent Succesfully!']);
        } else {
            return response()->json(['errmsg' => 'Error while sending interest!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function interestReceived(Request $req)
    {
        $reg_id = Auth::user()->user_reg_id;
        $data1 = SendInterest::where('reg_id', $reg_id)->where('revert', '=', '0')->pluck('by_reg_id')->toArray();

        $data = BasicDetail::with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->whereIn('reg_id', $data1)->where('reg_id', '>', $req->page)->get()->take(6);
        $ids = BasicDetail::select('reg_id')->whereIn('reg_id', $data1)->get();
        // counting number of time loop runing 
        $i = 1;
        // to counting number of page for set the value of current active page
        $page = 0;
        // to setting  current active page
        $current = 0;
        // key for total pagination page 
        $key = [0];
        foreach ($ids as $id) {
            // whene loop reach division of 4 
            if ($i % 6 == 0) {
                $page++;
                // whene rquest page and reg_id match then set current page 
                if ($id->reg_id == $req->page) {
                    $current =  $page;
                }
                // whene total number off page divede by 4 then push the reg id as key 
                array_push($key, $id->reg_id);
            }
            $i++;
        }
        $data = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current];

        return response()->json($data, 200);
    }

    public function sendInterestRevert(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'revert' => 'required'
        ]);

        $data = SendInterest::where('by_reg_id', $req->id)->where('reg_id', Auth::user()->user_reg_id)->first();
        $data->revert = $req->revert;

        if ($data->save()) {
            return response()->json(['succmsg' => 'Reverted Succesfully']);
        } else {
            return response()->json(['errmsg' => 'Error while reverting!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function interestSent(Request $req)
    {
        $reg_id = Auth::user()->user_reg_id;

        $data = BasicDetail::whereRelation('getInterestSent', 'by_reg_id', '=', $reg_id)->whereRelation('getInterestSent', 'revert', '=', '0')->with('getInterestSent:reg_id,reg_id', 'getShortlist:id,saved_reg_id', 'getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->where("reg_id", ">", $req->page)->get()->take(6);
        $ids = BasicDetail::select('reg_id')->whereRelation('getInterestSent', 'by_reg_id', '=', $reg_id)->whereRelation('getInterestSent', 'revert', '=', '0')->get();
        // counting number of time loop runing 
        $i = 1;
        // to counting number of page for set the value of current active page
        $page = 0;
        // to setting  current active page
        $current = 0;
        // key for total pagination page 
        $key = [0];
        foreach ($ids as $id) {
            // whene loop reach division of 4 
            if ($i % 6 == 0) {
                $page++;
                // whene rquest page and reg_id match then set current page 
                if ($id->reg_id == $req->page) {
                    $current =  $page;
                }
                // whene total number off page divede by 4 then push the reg id as key 
                array_push($key, $id->reg_id);
            }
            $i++;
        }
        $data = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 6), 'page' => $current];

        return response()->json($data, 200);
    }

    public function shortlist(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);
        $leftCount = UserPackage::select('shortlist_count')->where('reg_id', Auth::user()->user_reg_id)->first();
        $check = Shortlist::where('by_reg_id', Auth::user()->user_reg_id)->where('saved_reg_id', $req->id)->first();
        if (empty($check)) {
            if ($leftCount['shortlist_count'] != 0) {
                $data = new Shortlist();
                $data->by_reg_id = Auth::user()->user_reg_id;
                $data->saved_reg_id = $req->id;
                if ($data->save()) {
                    UserPackage::where('reg_id', Auth::user()->user_reg_id)->decrement('shortlist_count', 1);
                    return response()->json(['succmsg' => 'Shortlisted!'], 200);
                }
            } else {
                return response()->json(['errmsg' => 'No Shortlist Count left!'], 203);
            }
        } else {
            Shortlist::where('id', $check->id)->delete();
            return response()->json(['succmsg' => 'Remove Shortlisted!'], 200);
        }




        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function viewProfile($id, Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id' => 'required',
        ]);

        $data = new ProfileVisit();
        $data->by_reg_id = $id;
        $data->reg_id = $req->id;
        $data->revert = 0;
        // $data->added_by = Auth::user()->id;

        if ($data->save()) {
            return response()->json('msg', 'Visited Succesfully');
        } else {
            return response()->json('msg', 'Error while visiting!');
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }
}
