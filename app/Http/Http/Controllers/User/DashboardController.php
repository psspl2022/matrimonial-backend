<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BasicDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;
use App\Models\SendInterest; 
use App\Models\Shortlist;

class DashboardController extends Controller
{
    public function profileSidebar(){
        $id = Auth::user()->user_reg_id;        
        $singlePercent = 100/65;
        $counter = 0;

        
        $data2 = BasicDetail::where('reg_id',$id)->with('getCareer','getFamily','getLifeStyle','getLikes')->first(); 
        if($data2){
            if($data2['name'] != "" && $data2['name'] != NULL ){
                $counter++;
            }
            if($data2['dob'] != "" && $data2['dob'] != NULL ){
                $counter++;
            }
            if($data2['maritial_status'] != "" && $data2['maritial_status'] != NULL && $data2['maritial_status'] != 0 ){
                $counter++;
            }
            if($data2['religion'] != "" && $data2['religion'] != NULL && $data2['religion'] != 0 ){
                $counter++;
            }
            if($data2['caste'] != "" && $data2['caste'] != NULL && $data2['caste'] != 0 ){
                $counter++;
            }
            if($data2['mother_tongue'] != "" && $data2['mother_tongue'] != NULL && $data2['mother_tongue'] != 0 ){
                $counter++;
            }
            if($data2['horrorscope_match_required'] != "" && $data2['horrorscope_match_required'] != NULL && $data2['horrorscope_match_required'] != 0 ){
                $counter++;
            }
            if($data2['height'] != "" && $data2['height'] != NULL && $data2['height'] != 0 ){
                $counter++;
            }
            if($data2['manglik'] != "" && $data2['manglik'] != NULL && $data2['manglik'] != 0 ){
                $counter++;
            }
            if($data2['country'] != "" && $data2['country'] != NULL && $data2['country'] != 0 ){
                $counter++;
            }
            if($data2['state'] != "" && $data2['state'] != NULL && $data2['state'] != 0 ){
                $counter++;
            }
            if($data2['city'] != "" && $data2['city'] != NULL && $data2['city'] != 0 ){
                $counter++;
            }
            if($data2['pincode'] != "" && $data2['pincode'] != NULL && $data2['pincode'] != 0 ){
                $counter++;
            }
            if($data2['residence'] != "" && $data2['residence'] != NULL && $data2['residence'] != 0 ){
                $counter++;
            }
            if($data2['sect'] != "" && $data2['sect'] != NULL && $data2['sect'] != 0 ){
                $counter++;
            }
            if($data2['live_with_family'] != "" && $data2['live_with_family'] != NULL && $data2['live_with_family'] != 0 ){
                $counter++;
            }
            if($data2['description'] != "" && $data2['description'] != NULL && $data2['description'] != 0 ){
                $counter++;
            }

            if($data2['get_career']){
                if($data2['highest_qualification'] != "" && $data2['highest_qualification'] != NULL && $data2['highest_qualification'] != 0 ){
                    $counter++;
                }
                if($data2['schooling'] != "" && $data2['schooling'] != NULL && $data2['schooling'] != 0 ){
                    $counter++;
                }
                if($data2['ug_qualification'] != "" && $data2['ug_qualification'] != NULL && $data2['ug_qualification'] != 0 ){
                    $counter++;
                }
                if($data2['ug_clg'] != "" && $data2['ug_clg'] != NULL && $data2['ug_clg'] != 0 ){
                    $counter++;
                }
                if($data2['pg_qualification'] != "" && $data2['pg_qualification'] != NULL && $data2['pg_qualification'] != 0 ){
                    $counter++;
                }
                if($data2['pg_clg'] != "" && $data2['pg_clg'] != NULL && $data2['pg_clg'] != 0 ){
                    $counter++;
                }
                if($data2['employement_sector'] != "" && $data2['employement_sector'] != NULL && $data2['employement_sector'] != 0 ){
                    $counter++;
                }
                if($data2['occupation'] != "" && $data2['occupation'] != NULL && $data2['occupation'] != 0 ){
                    $counter++;
                }
                if($data2['organization_name'] != "" && $data2['organization_name'] != NULL && $data2['organization_name'] != 0 ){
                    $counter++;
                }
                if($data2['income'] != "" && $data2['income'] != NULL && $data2['income'] != 0 ){
                    $counter++;
                }
                if($data2['express_yourself'] != "" && $data2['express_yourself'] != NULL && $data2['express_yourself'] != 0 ){
                    $counter++;
                }
            }

            if($data2['get_family']){
                if($data2['family_type'] != "" && $data2['family_type'] != NULL && $data2['family_type'] != 0 ){
                    $counter++;
                }
                if($data2['family_values'] != "" && $data2['family_values'] != NULL && $data2['family_values'] != 0 ){
                    $counter++;
                }
                if($data2['family_status'] != "" && $data2['family_status'] != NULL && $data2['family_status'] != 0 ){
                    $counter++;
                }
                if($data2['father_occupation'] != "" && $data2['father_occupation'] != NULL && $data2['father_occupation'] != 0 ){
                    $counter++;
                }
                if($data2['mother_occupation'] != "" && $data2['mother_occupation'] != NULL && $data2['mother_occupation'] != 0 ){
                    $counter++;
                }
                if($data2['brother_count'] != "" && $data2['brother_count'] != NULL && $data2['brother_count'] != 0 ){
                    $counter++;
                }
                if($data2['married_brother_count'] != "" && $data2['married_brother_count'] != NULL && $data2['married_brother_count'] != 0 ){
                    $counter++;
                }
                if($data2['sister_count'] != "" && $data2['sister_count'] != NULL && $data2['sister_count'] != 0 ){
                    $counter++;
                }
                if($data2['married_sister_count'] != "" && $data2['married_sister_count'] != NULL && $data2['married_sister_count'] != 0 ){
                    $counter++;
                }
                if($data2['native_city'] != "" && $data2['native_city'] != NULL && $data2['native_city'] != 0 ){
                    $counter++;
                }
                if($data2['native_state'] != "" && $data2['native_state'] != NULL && $data2['native_state'] != 0 ){
                    $counter++;
                }
                if($data2['living_with_parent'] != "" && $data2['living_with_parent'] != NULL && $data2['living_with_parent'] != 0 ){
                    $counter++;
                }
                if($data2['family_income'] != "" && $data2['family_income'] != NULL && $data2['family_income'] != 0 ){
                    $counter++;
                }
                if($data2['gotra_maternal'] != "" && $data2['gotra_maternal'] != NULL && $data2['gotra_maternal'] != 0 ){
                    $counter++;
                }
                if($data2['gotra'] != "" && $data2['gotra'] != NULL && $data2['gotra'] != 0 ){
                    $counter++;
                }
                if($data2['express_yourself'] != "" && $data2['express_yourself'] != NULL && $data2['express_yourself'] != 0 ){
                    $counter++;
                }
            }
            if($data2['get_lifestyle']){
                if($data2['diet_habit'] != "" && $data2['diet_habit'] != NULL && $data2['diet_habit'] != 0 ){
                    $counter++;
                }
                if($data2['drink_habit'] != "" && $data2['drink_habit'] != NULL && $data2['drink_habit'] != 0 ){
                    $counter++;
                }
                if($data2['smoking_habit'] != "" && $data2['smoking_habit'] != NULL  ){
                    $counter++;
                }
                if($data2['open_to_pets'] != "" && $data2['open_to_pets'] != NULL  ){
                    $counter++;
                }
                if($data2['own_a_house'] != "" && $data2['own_a_house'] != NULL  ){
                    $counter++;
                }
                if($data2['own_a_car'] != "" && $data2['own_a_car'] != NULL ){
                    $counter++;
                }
                if($data2['language_i_speak'] != "" && $data2['language_i_speak'] != NULL && $data2['language_i_speak'] != 0 ){
                    $counter++;
                }
                if($data2['blood_group'] != "" && $data2['blood_group'] != NULL && $data2['blood_group'] != 0 ){
                    $counter++;
                }
                if($data2['challenged'] != "" && $data2['challenged'] != NULL && $data2['challenged'] != 0 ){
                    $counter++;
                }
                if($data2['thalessemia'] != "" && $data2['thalessemia'] != NULL && $data2['thalessemia'] != 0 ){
                    $counter++;
                }
                if($data2['hiv_pos'] != "" && $data2['hiv_pos'] != NULL && $data2['hiv_pos'] != 0 ){
                    $counter++;
                }                
            }
            if($data2['get_user_register']){
                if($data2['contact'] != "" && $data2['contact'] != NULL && $data2['contact'] != 0 ){
                    $counter++;
                }
                if($data2['alter_contact'] != "" && $data2['alter_contact'] != NULL && $data2['alter_contact'] != 0 ){
                    $counter++;
                }
                if($data2['email'] != "" && $data2['email'] != NULL && $data2['email'] != 0 ){
                    $counter++;
                }
                if($data2['alter_email'] != "" && $data2['alter_email'] != NULL && $data2['alter_email'] != 0 ){
                    $counter++;
                }
                if($data2['landline'] != "" && $data2['landline'] != NULL && $data2['landline'] != 0 ){
                    $counter++;
                }
                if($data2['time_for_call'] != "" && $data2['time_for_call'] != NULL && $data2['time_for_call'] != 0 ){
                    $counter++;
                }
                if($data2['contact_address'] != "" && $data2['contact_address'] != NULL && $data2['contact_address'] != 0 ){
                    $counter++;
                }
                if($data2['contact_pincode'] != "" && $data2['contact_pincode'] != NULL && $data2['contact_pincode'] != 0 ){
                    $counter++;
                }
                if($data2['parent_address'] != "" && $data2['parent_address'] != NULL && $data2['parent_address'] != 0 ){
                    $counter++;
                }
                if($data2['parent_pincode'] != "" && $data2['parent_pincode'] != NULL && $data2['parent_pincode'] != 0 ){
                    $counter++;
                }
            }
            
        }

        $percentage = $counter*$singlePercent;

        $data1['user'] = UserPackage::where('reg_id',$id)->with('getPackage:id,name')->first(); 
        $data1['percentage'] = $percentage;
        
        return response()->json($data1, 200);  
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
