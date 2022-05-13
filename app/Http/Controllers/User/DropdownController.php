<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Caste;
use App\Models\City;
use App\Models\Country;
use App\Models\Height;
use App\Models\MotherTongue;
use App\Models\Religion;
use App\Models\Sect;
use App\Models\State;
use App\Models\Education;
use App\Models\Income;
use App\Models\Occupation;
use App\Models\OccupationCategory;


class DropdownController extends Controller
{
    public function stateDropdown($c_id){
      
        $response['state'] = State::select('id','name', 'country_id')->where('country_id',$c_id)->get();
        return response($response, 200);
    }

    public function cityDropdown($s_id){
      
        $response['city'] = City::select('id','name', 'state_id', 'country_id')->where('state_id',$s_id)->get();
        return response($response, 200);
    }

    public function empSectorDropdown(){
      
        $response['emp_sector'] = OccupationCategory::select('id','occupation_category')->get();
        return response($response, 200);
    }

    public function occupationDropdown($e_id){
      
        $response['occupation'] = Occupation::select('id','occupation')->where('cat_id', $e_id)->get();
        return response($response, 200);
    }

    public function basicDropdown(){
        $response['caste'] = Caste::select('id','caste')->get();
        $response['country'] = Country::select('id','name')->get();
        $response['height'] = Height::select('id','height')->get();
        $response['mother_tongue'] = MotherTongue::select('id','type','mother_tongue')->get();
        $response['religion'] = Religion::select('id','religion')->get();
        $response['sect'] = Sect::select('id','name')->get();

        return response($response, 200);
    }

    public function careerDropdown(){
        $response['highest'] = Education::select('id','education')->get();
        $response['ug'] = Education::select('id','education')->where('type','UG')->get();
        $response['pg'] = Education::select('id','education')->where('type','PG')->get();
        $response['emp_sector'] = OccupationCategory::select('id','occupation_category')->get();
        $response['income'] = Income::select('id','income');
        return response($response, 200);
    }
}
