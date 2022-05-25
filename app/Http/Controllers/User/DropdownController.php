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
use App\Models\EmployementSector;


class DropdownController extends Controller
{
    public function countryDropdown(){      
        $response['country'] = Country::select('id','name')->get();
        return response($response, 200);
    }
    
    public function stateDropdown($c_id){
      
        $response['state'] = State::select('id','name', 'country_id')->where('country_id',$c_id)->get();
        return response($response, 200);
    }

    public function cityDropdown($s_id){
      
        $response['city'] = City::select('id','name', 'state_id', 'country_id')->where('state_id',$s_id)->get();
        return response($response, 200);
    }

    public function allStateDropdown(){
      
        $response['state'] = State::select('id','name', 'country_id')->get();
        return response($response, 200);
    }

    public function sectDropdown(){
      
        $response['sect'] = Sect::select('id','name')->where('status','1')->get();
        return response($response, 200);
    }

    public function allCityDropdown(){
      
        $response['city'] = City::select('id','name', 'state_id', 'country_id')->get();
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
        $response['occupation'] = Occupation::select('id','occupation_category','occupation')->get();
        $response['emp_sector'] = EmployementSector::select('id','sector_name')->get();
        $response['income'] = Income::select('id','income')->get();
        return response($response, 200);
    }

    public function familyDropdown(){
        $response['income'] = Income::select('id','income')->get();
        $response['occupation'] = Occupation::select('id','occupation_category','occupation')->get();
        $response['state'] = State::select('id','name', 'country_id')->where('country_id','101')->get();
        $response['city'] = City::select('id','name', 'state_id', 'country_id')->where('country_id','101')->get();
        return response($response, 200);
    }

    //ADMIN

   
}
