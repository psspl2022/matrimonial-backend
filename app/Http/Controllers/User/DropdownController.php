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

class DropdownController extends Controller
{
    public function stateDropdown($c_id){
      
        $response['state'] = State::select('id','name', 'country_id')->where('country_id',$c_id)->get();
        return response($response, 200);
    }

    public function cityDropdown($s_id){
      
        $response['state'] = State::select('id','name', 'country_id','state_id')->where('state_id',$s_id)->get();
        return response($response, 200);
    }

    public function basicDropdown(){
        $response['caste'] = Caste::select('id','caste')->get();
        $response['city'] = City::select('id','name', 'state_id', 'country_id')->get();
        $response['country'] = Country::select('id','name')->get();
        $response['height'] = Height::select('id','height')->get();
        $response['mother_tongue'] = MotherTongue::select('id','type','mother_tongue')->get();
        $response['religion'] = Religion::select('id','religion')->get();
        $response['sect'] = Sect::select('id','name')->get();

        return response($response, 200);
    }
}
