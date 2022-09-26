<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Carbon;
use App\Models\VerifyUser;
use App\Models\DesiredProfile;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\Age;
use App\Models\SendInterest;
use App\Models\Shortlist;
use App\Models\UserRegister;
use Illuminate\Support\Facades\DB;

class DesireTest extends Controller
{
    public function showDesiredProfiles(Request $req)
    {

        $reg_id = 4;
        $data1 = DesiredProfile::where('reg_id', $reg_id)->first();
        $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;
        // mother tounge
        // $moth = explode(',', $req->moth);
        $moth = $req->moth;
        // Religion 
        // $relgion = explode(',', $req->religion);
        $relgion = $req->religion;
        // marital status 
        // $martital = explode(',', $req->martital);
        $martital = $req->martital;
        // if mother tongue value nul set thius value
        if ($req->moth == 'null' || empty($req->martital)) {
            $moth = BasicDetail::get('mother_tongue');
            $newmoth = "";
            foreach ($moth as $item) {
                $newmoth .= $item->mother_tongue . ",";
            }
            $moth = rtrim($newmoth, ", ");
        }
        // $req->minincome = 1;
        // $req->maxincome = 2;
        // if religion value nul set thius value
        if ($req->religion == 'null' || empty($req->martital)) {
            $relgion = BasicDetail::get('religion');
            $newrelgion = "";
            foreach ($relgion as $item) {
                $newrelgion .= $item->religion . ",";
            }
            $relgion = rtrim($newrelgion, ", ");
        }
        // if marital statu value nul set thius value
        if ($req->martital == 'null' || empty($req->martital)) {
            // $martital = ['0', '1', '2', '3', '4', '5'];
            $martital = "0, 1, 2, 3, 4, 3";
        }
        // return $martital;
        // return response()->json($result, 200);
        // exit();
        $t = 15;
        if ($data1->min_height == null || $data1->max_height == null) {
            $data1->min_height = 0;
            $data1->max_height = 10;
            $t--;
        }
        if ($data1->min_income == null || $data1->max_income == null) {
            $data1->min_income = 0;
            $data1->max_income = 10;
            $t--;
        }
        if ($data1->caste == null) {
            $data1->caste = "0";
            $t--;
        }
        if ($data1->marital == null) {
            $data1->marital = "0";
            $t--;
        }
        if ($data1->religion == null) {
            $data1->religion = "0";
            $t--;
        }
        if ($data1->mother_tongue == null) {
            $data1->mother_tongue = "0";
            $t--;
        }
        if ($data1->manglik == null) {
            $data1->manglik = "0";
            $t--;
        }
        if ($data1->country == null) {
            $data1->country = "0";
            $t--;
        }
        if ($data1->residential == null) {
            $data1->residential = "0";
            $t--;
        }
        if ($data1->highest_education == null) {
            $data1->highest_education = "0";
            $t--;
        }
        if ($data1->occupation == null) {
            $data1->occupation = "0";
            $t--;
        }
        if ($data1->diet == null) {
            $data1->diet = "0";
            $t--;
        }
        if ($data1->drinking == null) {
            $data1->drinking = "0";
            $t--;
        }
        if ($data1->smoking == null) {
            $data1->smoking = "0";
            $t--;
        }
        if ($data1->challenged == null) {
            $data1->challenged = "0";
            $t--;
        }
        $offset = ($req->page == 0 ? $req->page : ($req->page - 1) * 4);
        $offset = $req->page * 4;
        $offset = $req->page * 4;
        $minage = $req->minage . ' 00:00:00';
        $maxage = $req->maxage . ' 00:00:00';
        if (!empty($data1)) {
            if ($gender == 1  || $gender == 2) {
                $result = DB::select("Select b.reg_id, (100*(IF(b.height between $data1->min_height and $data1->max_height ,1, 0)+IF(b.caste IN( $data1->caste), 1, 0)+IF(b.marital_status IN( $data1->marital), 1, 0)+IF(b.religion IN( $data1->religion), 1, 0)+IF(b.mother_tongue IN( $data1->mother_tongue), 1, 0)+IF(b.manglik IN( $data1->manglik), 1, 0)+IF(b.country IN( $data1->country), 1, 0)+IF(b.residence IN( $data1->residential), 1, 0)+IF(c.income between $data1->min_income and $data1->max_income, 1, 0)+IF(c.highest_qualification IN( $data1->highest_education), 1, 0)+IF(c.occupation IN( $data1->occupation), 1, 0)+IF(l.diet_habit IN( $data1->diet), 1, 0)+IF(l.drink_habit IN( $data1->drinking), 1, 0)+IF(l.smoking_habit IN( $data1->smoking), 1, 0)+IF(l.challenged IN( $data1->challenged), 1, 0))/$t) as percentage from basic_details b left join career_details c on b.reg_id = c.reg_id left join lifestyle_details l on b.reg_id = l.reg_id  left join user_registers u on b.reg_id = u.id where b.reg_id != $reg_id and u.gender != $gender and b.mother_tongue IN($moth) and b.religion IN($relgion) and b.marital_status IN($martital) and c.income >= $req->minincome and c.income <= $req->maxincome and b.height >= $req->minheight and b.height <= $req->maxheight and b.dob <= '$minage' and b.dob >= '$maxage'   HAVING percentage > 0  order by percentage desc,b.reg_id desc limit $offset,4");
                $ids = DB::select("Select b.reg_id, (100*(IF(b.height between $data1->min_height and $data1->max_height ,1, 0)+IF(b.caste IN( $data1->caste), 1, 0)+IF(b.marital_status IN( $data1->marital), 1, 0)+IF(b.religion IN( $data1->religion), 1, 0)+IF(b.mother_tongue IN( $data1->mother_tongue), 1, 0)+IF(b.manglik IN( $data1->manglik), 1, 0)+IF(b.country IN( $data1->country), 1, 0)+IF(b.residence IN( $data1->residential), 1, 0)+IF(c.income between $data1->min_income and $data1->max_income, 1, 0)+IF(c.highest_qualification IN( $data1->highest_education), 1, 0)+IF(c.occupation IN( $data1->occupation), 1, 0)+IF(l.diet_habit IN( $data1->diet), 1, 0)+IF(l.drink_habit IN( $data1->drinking), 1, 0)+IF(l.smoking_habit IN( $data1->smoking), 1, 0)+IF(l.challenged IN( $data1->challenged), 1, 0))/$t) as percentage from basic_details b left join career_details c on b.reg_id = c.reg_id left join lifestyle_details l on b.reg_id = l.reg_id  left join user_registers u on b.reg_id = u.id where b.reg_id != $reg_id and u.gender != $gender and b.mother_tongue IN($moth) and b.religion IN($relgion) and b.marital_status IN($martital) and c.income >= $req->minincome and c.income <= $req->maxincome and b.height >= $req->minheight and b.height <= $req->maxheight and b.dob <= '$minage' and b.dob >= '$maxage'   HAVING percentage > 0  order by percentage desc,b.reg_id desc");
                // return response()->json(, 200);
                // exit();
            } else {
                $result = DB::select("Select b.reg_id, (100*(IF(b.height between $data1->min_height and $data1->max_height ,1, 0)+IF(b.caste IN( $data1->caste), 1, 0)+IF(b.marital_status IN( $data1->marital), 1, 0)+IF(b.religion IN( $data1->religion), 1, 0)+IF(b.mother_tongue IN( $data1->mother_tongue), 1, 0)+IF(b.manglik IN( $data1->manglik), 1, 0)+IF(b.country IN( $data1->country), 1, 0)+IF(b.residence IN( $data1->residential), 1, 0)+IF(c.income between $data1->min_income and $data1->max_income, 1, 0)+IF(c.highest_qualification IN( $data1->highest_education), 1, 0)+IF(c.occupation IN( $data1->occupation), 1, 0)+IF(l.diet_habit IN( $data1->diet), 1, 0)+IF(l.drink_habit IN( $data1->drinking), 1, 0)+IF(l.smoking_habit IN( $data1->smoking), 1, 0)+IF(l.challenged IN( $data1->challenged), 1, 0))/$t) as percentage from basic_details b left join career_details c on b.reg_id = c.reg_id left join lifestyle_details l on b.reg_id = l.reg_id  left join user_registers u on b.reg_id = u.id where b.reg_id != $reg_id and b.mother_tongue IN($moth) and b.religion IN($relgion) and b.marital_status IN($martital) and c.income >= $req->minincome and c.income <= $req->maxincome and b.height >= $req->minheight and b.height <= $req->maxheight and b.dob <= '$minage' and b.dob >= '$maxage'   HAVING percentage > 0  order by percentage desc,b.reg_id desc limit $offset,4");
                $ids = DB::select("Select b.reg_id, (100*(IF(b.height between $data1->min_height and $data1->max_height ,1, 0)+IF(b.caste IN( $data1->caste), 1, 0)+IF(b.marital_status IN( $data1->marital), 1, 0)+IF(b.religion IN( $data1->religion), 1, 0)+IF(b.mother_tongue IN( $data1->mother_tongue), 1, 0)+IF(b.manglik IN( $data1->manglik), 1, 0)+IF(b.country IN( $data1->country), 1, 0)+IF(b.residence IN( $data1->residential), 1, 0)+IF(c.income between $data1->min_income and $data1->max_income, 1, 0)+IF(c.highest_qualification IN( $data1->highest_education), 1, 0)+IF(c.occupation IN( $data1->occupation), 1, 0)+IF(l.diet_habit IN( $data1->diet), 1, 0)+IF(l.drink_habit IN( $data1->drinking), 1, 0)+IF(l.smoking_habit IN( $data1->smoking), 1, 0)+IF(l.challenged IN( $data1->challenged), 1, 0))/$t) as percentage from basic_details b left join career_details c on b.reg_id = c.reg_id left join lifestyle_details l on b.reg_id = l.reg_id  left join user_registers u on b.reg_id = u.id where b.reg_id != $reg_id and b.mother_tongue IN($moth) and b.religion IN($relgion) and b.marital_status IN($martital) and c.income >= $req->minincome and c.income <= $req->maxincome and b.height >= $req->minheight and b.height <= $req->maxheight and b.dob <= '$minage' and b.dob >= '$maxage'   HAVING percentage > 0  order by percentage desc,b.reg_id desc");
            }


            if (!empty($result)) {
                $x = [];
                $k = 0;
                foreach ($result as $i) {
                    $x[$k] = $i->reg_id;
                    $k++;
                }
                $allData = BasicDetail::with('getInterestSent:reg_id,reg_id,revert', 'getShortlist:id,saved_reg_id', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->whereIn('reg_id', $x)->get();
                $newdata = [];
                $index = 0;
                foreach ($result as $i) {
                    foreach ($allData as $item) {
                        if ($item->reg_id == $i->reg_id) {
                            $item->percentage = ceil($i->percentage);
                            $newdata[$index] = $item;
                            $index++;
                        }
                    }
                }
            } else {
                $data = ['msg' => 'No Data Found!!'];
                $data['income'] = $req->minage > "2001-05-31 00:00:00";
                $data['income2'] = $req->minage . " >" . "2001-05-31 00:00:00";
                return response()->json($data, 201);
            }
        } else {
            return response()->json(['msg' => 'Please, Fill desired details first!!'], 201);
        }
        // counting number of time loop runing 
        $ids = count($ids);
        $i = 1;
        // to counting number of page for set the value of current active page
        $page = 0;
        // to setting  current active page
        $current = 0;
        // key for total pagination page 
        $key = [0];
        $hk = "";
        for ($i = 1; $i <= $ids; $i++) {
            // whene loop reach division of 4 
            $hk[$i - 1] = $i;
            if ($i % 4 == 0) {
                ++$page;
                // whene rquest page and reg_id match then set current page 
                // $current =  $i . " ==" . $req->page;
                if ($page == $req->page) {
                    $current =  $page;
                    // $current =  $i . " ==" . $req->page;
                }
                // whene total number off page divede by 4 then push the reg id as key 
                array_push($key, $page);
            }
            // $i++;
        }
        $data = ['data' => $newdata];
        $data["key"] =  $key;
        $data['total'] = ceil($ids / 4);
        $data['page'] = $current;
        $data['id'] = $ids;
        $data['hk'] = $hk;
        $data['income'] = $req->minage > "2001-05-31 00:00:00";
        $data['income2'] = $req->minage . " >" . "2001-05-31 00:00:00";
        return response()->json($data, 200);
    }
}
