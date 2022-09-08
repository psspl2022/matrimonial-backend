<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

class DesiredController extends Controller
{
    public function createBasic(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id' => $reg_id],
            [
                'reg_id' => $reg_id,
                'user_id' => $user_id,
                'min_age' => $req->minage,
                'max_age' => $req->maxage,
                'min_height' => $req->minheight,
                'max_height' => $req->maxheight,
                'marital' => ($req->marital == 'undefined' || $req->marital == 'null') ? NULL : $req->marital,
                'country' => ($req->country == 'undefined' || $req->country == 'null') ? NULL : $req->country,
                'residential' => ($req->residence == 'undefined' || $req->residence == 'null') ? NULL : $req->residence,
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Desired details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function createReligion(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id' => $reg_id],
            [
                'reg_id' => $reg_id,
                'user_id' => $user_id,
                'religion' => ($req->religion == 'undefined'  || $req->religion == 'null') ? NULL : $req->religion,
                'caste' => ($req->caste == 'undefined'  || $req->caste == 'null') ? NULL : $req->caste,
                'mother_tongue' => ($req->mothertongue == 'undefined'  || $req->mothertongue == 'null') ? NULL : $req->mothertongue,
                'manglik' => ($req->manglik == 'undefined' || $req->manglik == 'null') ? NULL : $req->manglik,
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Desired details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function createCareer(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id' => $reg_id],
            [
                'reg_id' => $reg_id,
                'user_id' => $user_id,
                'highest_education' => ($req->education == 'undefined'  || $req->education == 'null') ? NULL : $req->education,
                'occupation' => ($req->occupation == 'undefined'  || $req->occupation == 'null') ? NULL : $req->occupation,
                'min_income' => $req->minincome,
                'max_income' => $req->maxincome,
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Desired details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function createLifestyle(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id' => $reg_id],
            [
                'reg_id' => $reg_id,
                'user_id' => $user_id,
                'diet' => ($req->diet == 'undefined'  || $req->diet == 'null') ? NULL : $req->diet,
                'drinking' => ($req->drinking == 'undefined' ||  $req->drinking == 'null') ? NULL : $req->drinking,
                'smoking' => ($req->smoking  == 'undefined'  || $req->smoking == 'null') ? NULL : $req->smoking,
                'challenged' => ($req->challenged == 'undefined'  || $req->challenged == 'null') ? NULL : $req->challenged,
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Desired details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function createAbout(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id' => $reg_id],
            [
                'reg_id' => $reg_id,
                'user_id' => $user_id,
                'about_desired' => $req->about,
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Desired details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function showDesiredDetail()
    {
        $user_id = Auth::user()->id;
        $data = DesiredProfile::where('user_id', $user_id)->first();

        return response()->json($data, 200);
    }

    public function showDesiredProfiles(Request $req)
    {
        $user_id = Auth::user()->id;
        $data1 = DesiredProfile::where('user_id', $user_id)->first();
        $gender = (int)(UserRegister::where('id', $user_id)->first('gender'))->gender;
        // mother tounge
        $moth = explode(',', $req->moth);
        // Religion 
        $relgion = explode(',', $req->religion);
        // marital status 
        $martital = explode(',', $req->martital);
        // if mother tongue value nul set thius value
        if ($req->moth == 'null') {
            $moth = BasicDetail::get('mother_tongue');
        }
        // if religion value nul set thius value
        if ($req->religion == 'null') {
            $relgion = BasicDetail::get('religion');
        }
        // if marital statu value nul set thius value
        if ($req->martital == 'null') {
            $martital = ['0', '1', '2', '3', '4', '5'];
        }
        if (!empty($data1)) {
            if ($gender == 1  || $gender == 2) {
                $data2 = BasicDetail::with('getCareer:career_details.reg_id,highest_qualification,occupation,income', 'getLifeStyle:lifestyle_details.reg_id,diet_habit,drink_habit,smoking_habit,challenged')->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
                $ids = BasicDetail::select('reg_id')->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
            } else {
                $data2 = BasicDetail::with('getCareer:career_details.reg_id,highest_qualification,occupation,income', 'getLifeStyle:lifestyle_details.reg_id,diet_habit,drink_habit,smoking_habit,challenged')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
                $ids = BasicDetail::select('reg_id')->where('reg_id', '!=', Auth::user()->user_reg_id)->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
            }
            // return $data2;
            $count = count($data2);

            $marital_arr = explode(",", $data1->marital);
            $country_arr = explode(",", $data1->country);
            $religion_arr = explode(",", $data1->religion);
            $caste_arr = explode(",", $data1->caste);
            $mother_arr = explode(",", $data1->mother_tongue);
            $manglik_arr = explode(",", $data1->manglik);
            $residential_arr = explode(",", $data1->residential);
            $education_arr = explode(",", $data1->highest_education);
            $occupation_arr = explode(",", $data1->occupation);
            $diet_arr = explode(",", $data1->diet);
            $drinking_arr = explode(",", $data1->drinking);
            $smoking_arr = explode(",", $data1->smoking);
            $challenge_arr = explode(",", $data1->challenged);



            for ($i = 0; $i < $count; $i++) {
                $dob = date('Y-m-d', strtotime($data2[$i]->dob));
                $age = (\Carbon\Carbon::parse($dob)->age);
                $age_id = Age::select('id')->where('age', $age)->first();

                $desired_count =  0;
                $counter = 0;


                if (($data1->min_height != NUll) && ($data1->max_height != NUll)) {
                    $desired_count++;
                    if (($data1->min_height <= $data2[$i]->height) && ($data1->max_height >= $data2[$i]->height)) {
                        $counter++;
                    }
                }

                if(($data1->min_age != NULL) && ($data1->max_age != NULL) ){
                    $desired_count++;
                    if(($data1->min_age <= $age_id['id']) && ($data1->max_age >= $age_id['id']) ){
                        $counter++;         
                    }
                }

                if (($data1->min_income != NULL) && ($data1->max_income != NULL)) {
                    $desired_count++;
                    if (($data1->min_income <= (int)$data2[$i]->getCareer['income']) && ($data1->max_income >= (int)$data2[$i]->getCareer['income'])) {
                        $counter++;
                    }
                }

                
                if (($data1->residential != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->residence, $residential_arr)) {
                        $counter++;
                    }
                }
               
                if (($data1->marital != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->marital_status, $marital_arr)) {
                        $counter++;
                    }
                }
                
                if (($data1->country != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->country, $country_arr)) {
                        $counter++;
                    }
                }
               
                if (($data1->religion != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->religion, $religion_arr)) {
                        $counter++;
                    }
                }
               
                if (($data1->caste != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->caste, $caste_arr)) {
                        $counter++;
                    }
                }

                if (($data1->mother_tongue != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->mother_tongue, $mother_arr)) {
                        $counter++;
                    }
                }

                if (($data1->manglik != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->manglik, $manglik_arr)) {
                        $counter++;
                    }
                }

                if (($data1->highest_education != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->highest_qualification, $education_arr)) {
                        $counter++;
                    }
                }
                
                if (($data1->occupation != NULL)) {
                    $desired_count++;
                    if (in_array($data2[$i]->occupation, $occupation_arr)) {
                        $counter++;
                    }
                }
                // return $age_id['id'];

                if (($data1->diet != NULL)) {
                    $desired_count++;
                    if ($data2[$i]->getLifeStyle != null &&  in_array($data2[$i]->getLifeStyle['diet_habit'], $diet_arr)) {
                        $counter++;
                    }
                }
                if (($data1->drinking != NULL)) {
                    $desired_count++;
                    if ($data2[$i]->getLifeStyle != null && in_array($data2[$i]->getLifeStyle['drink_habit'], $drinking_arr)) {
                        $counter++;
                    }
                }

                if (($data1->smoking != NULL)) {
                    $desired_count++;
                    if ($data2[$i]->getLifeStyle != null &&  in_array($data2[$i]->getLifeStyle['smoking_habit'], $smoking_arr)) {
                        $counter++;
                    }
                }

                if (($data1->challenged != NULL)) {
                    $desired_count++;
                    if ($data2[$i]->getLifeStyle != null && in_array($data2[$i]->getLifeStyle['challenged'], $challenge_arr)) {
                        $counter++;
                    }
                }

                $allData = BasicDetail::with('getInterestSent:reg_id,reg_id','getShortlist:id,saved_reg_id', 'getProfileImage:by_reg_id,identity_card_doc', 'getIncome:incomes.income', 'getOccupation:occupations.occupation', 'getEducation:educations.education', 'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getCity:id,name')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', $data2[$i]->reg_id)->first();
                $id = BasicDetail::select('reg_id')->where('reg_id', $data2[$i]->reg_id)->first();
                // $careerData = CareerDetail::with('getIncome:id,income','getOccupation:id,occupation','getEducation:id,education')->has('getIncome')->has('getOccupation')->has('getEducation')->select('income','occupation','highest_qualification')->where('reg_id', $data2[$i]->reg_id)->first();
                // $intrestData = SendInterest::where('by_reg_id', Auth::user()->user_reg_id)->pluck('reg_id')->toArray();
                // $shortlistData = Shortlist::where('by_reg_id', Auth::user()->user_reg_id)->pluck('saved_reg_id')->toArray();




                $percentage =  round((($counter / $desired_count) * 100), 0);
                if (($counter > 0 && $allData != null)) {
                    $allData['percentage'] = $percentage;
                    // $ids[$i] = $id;
                    $data['age'][$i] = $age;
                    $data['data'][$i] = $allData;
                    // $data[$i][3] = $dob; 
                }
            }
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
                if ($i % 4 == 0) {
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
            $data["key"] =  $key;
            $data['total'] = ceil(count($ids) / 4);
            $data['page'] = $current;
            // $data = ['data' => $allData];
            if (($counter > 0)) {
                return response()->json($data, 200);
            } else {
                return response()->json(['msg' => 'No Data Found!!'], 201);
            }
        } else {
            return response()->json(['msg' => 'Please, Fill desired details first!!'], 201);
        }
    }
}
