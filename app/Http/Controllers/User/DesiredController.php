<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Carbon;
use App\Models\DesiredProfile;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\Age;
use App\Models\SendInterest;
use App\Models\Shortlist;

class DesiredController extends Controller
{
    public function createBasic(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'min_age'=>$req->minage,
                'max_age'=>$req->maxage,
                'min_height'=>$req->minheight,
                'max_height'=>$req->maxheight,
                'marital'=>$req->marital,
                'country'=>$req->country,
                'residential'=> $req->residence, 
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createReligion(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'religion'=>$req->religion,
                'caste'=>$req->caste,
                'mother_tongue'=>$req->mothertongue,
                'manglik'=>$req->manglik,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createCareer(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'highest_education'=>$req->education,
                'occupation'=>$req->occupation,
                'min_income'=>$req->minincome,
                'max_income'=>$req->maxincome,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createLifestyle(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'diet'=>$req->diet,
                'drinking'=>$req->drinking,
                'smoking'=>$req->smoking,
                'challenged'=>$req->challenged,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function createAbout(Request $req){
        $validator = Validator::make($req->all(),[

        ]);
        $user_id = Auth::user()->id;
        $reg_id = Auth::user()->user_reg_id;
        $data = DesiredProfile::updateOrCreate(
            ['reg_id'=>$reg_id],
            [
                'reg_id'=>$reg_id,
                'user_id'=>$user_id,
                'about_desired'=>$req->about,
            ]
        );

        if($data){
            return response()->json(['msg'=>'Desired details updated Succesfully']);
        }else{
            return response()->json(['msg' => 'Error while uploading Desired details!']);
        }

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
    }

    public function showDesiredDetail(){
        $user_id = Auth::user()->id;
        $data = DesiredProfile::where('user_id', $user_id)->first();

        return response()->json($data, 200);
    }    
    
    public function showDesiredProfiles(){
        $user_id = Auth::user()->id;
        $data1 = DesiredProfile::where('user_id', $user_id)->first();
        // $data2 = BasicDetail::join('career_details', 'career_details.reg_id','=','basic_details.reg_id')->get();
        $data2 = BasicDetail::with('getCareer:career_details.reg_id,highest_qualification,occupation,income','getLifeStyle:lifestyle_details.reg_id,diet_habit,drink_habit,smoking_habit,challenged')->get();
    
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

              
         
              for($i= 0; $i<$count; $i++){   
                $dob = date('Y-m-d',strtotime($data2[$i]->dob));
                $age = (\Carbon\Carbon::parse($dob)->age);
                $age_id = Age::select('id')->where('age', $age)->first();
                       ;      
                $desired_count =  0;        
                $counter = 0;   
                
                if(($data1->min_height != NUll) && ($data1->max_height != NUll)){
                    $desired_count++;
                    if(($data1->min_height <= $data2[$i]->height) && ($data1->max_height >= $data2[$i]->height) ){
                        $counter++;         
                    }
                }
                
                if(($data1->min_age != NULL) && ($data1->max_age != NULL) ){
                    $desired_count++;
                    if(($data1->min_age <= $age_id['id']) && ($data1->max_age >= $age_id['id']) ){
                        $counter++;         
                    }
                }
                
                if(($data1->min_income != NULL) && ($data1->max_income != NULL )){
                    $desired_count++;
                    if(($data1->min_income <= (int)$data2[$i]->getCareer['income']) && ($data1->max_income >= (int)$data2[$i]->getCareer['income'] )){
                        $counter++;         
                    }
                }
                if(($data1->marital != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->maritial_status, $marital_arr )){
                        $counter++;         
                    }
                }

                if(($data1->country != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->country, $country_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->religion != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->religion, $religion_arr )){
                        $counter++;
                    }    
                 }

                 if(($data1->caste != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->caste, $caste_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->mother_tongue != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->mother_tongue, $mother_arr )){
                        $counter++;
                    }
                }  
                
                if(($data1->manglik != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->manglik, $manglik_arr )){
                        $counter++;
                    }
                }    
              
                if(($data1->highest_education != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getCareer['highest_qualification'], $education_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->occupation != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getCareer['occupation'], $occupation_arr )){
                        $counter++; 
                    }
                }  
                
                if(($data1->diet != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getLifeStyle['diet_habit'], $diet_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->drinking != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getLifeStyle['drink_habit'], $drinking_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->smoking != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getLifeStyle['smoking_habit'], $smoking_arr )){
                        $counter++;
                    }
                }
                
                if(($data1->challenged != NULL)){
                    $desired_count++;
                    if(in_array($data2[$i]->getLifeStyle['challenged'], $challenge_arr )){
                        $counter++;
                    }
                  
                
                $basicData = BasicDetail::with('getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','height','religion','caste','mother_tongue','city')->where('reg_id', $data2[$i]->reg_id)->first();
                
                $careerData = CareerDetail::with('getIncome:id,income','getOccupation:id,occupation','getEducation:id,education')->select('income','occupation','highest_qualification')->where('reg_id', $data2[$i]->reg_id)->first();

                $intrestData = SendInterest::where('by_reg_id', Auth::user()->user_reg_id)->pluck('reg_id')->toArray();
                

                $shortlistData = Shortlist::where('by_reg_id', Auth::user()->user_reg_id)->pluck('saved_reg_id')->toArray();
            }
                
                $percentage =  round((($counter/$desired_count)*100),0);
                if($counter>0){
                    // $data[$i][0] = $age_id;
                    $data[$i][0] = $percentage; 
                    $data[$i][1] = $age;
                    $data[$i][2] = $basicData;
                    $data[$i][3] = $careerData;
                    $data[$i][4] = $intrestData;  
                    $data[$i][5] = $shortlistData;
                   
                     
                }         
             
            }   

        return response()->json($data, 200);
    
    }  

}




