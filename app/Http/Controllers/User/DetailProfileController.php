<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Master\OccupationController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\BasicDetail;
use App\Models\FamilyDetail;
use App\Models\CareerDetail;
use App\Models\UserRegister;
use App\Models\LifeStyle;
use App\Models\LikeDetails;
use App\Models\DesiredProfile;
use App\Models\VerifyUser;
use App\Models\Color;
use App\Models\Hobbies;
use App\Models\MusicTypes;
use App\Models\BookTypes;
use App\Models\DressStyles;
use App\Models\Movietypes;
use App\Models\Sports;
use App\Models\Cuisines;
use App\Models\Interest;
use App\Models\Age;
use App\Models\Country;
use App\Models\Residence;
use App\Models\Religion;
use App\Models\Caste;
use App\Models\MotherTongue;
use App\Models\Education;
use App\Models\Occupation;
use App\Models\SendInterest;
use App\Models\Shortlist;


class DetailProfileController extends Controller
{
    public function introduction($id){
        $view_reg_id = $id;

        $data = BasicDetail::where('reg_id',$view_reg_id)->with('getInterestSent:reg_id,reg_id','getshortlist:saved_reg_id,saved_reg_id','getProfileImage:by_reg_id,identity_card_doc','getUserRegister:id,gender','getIncome:incomes.income','getOccupation:occupations.occupation','getEducation:educations.education','getHeight:id,height','getReligion:id,religion','getCaste:id,caste','getMotherTongue:id,mother_tongue','getCity:id,name')->select('reg_id','name','dob','height','religion','caste','mother_tongue','city','maritial_status')->first();


        return response()->json($data, 200);
    }

    public function about(Request $req){
        $view_reg_id = $req->reg_id;
       
        $data['user'] =  UserRegister::where('id',$view_reg_id)->select('profile_for','gender')->first();
        $data['about'] =  BasicDetail::where('reg_id',$view_reg_id)->select('description')->first();
        $data['family'] =  FamilyDetail::where('reg_id',$view_reg_id)->select('about_family')->first();
        $data['career'] = CareerDetail::where('reg_id',$view_reg_id)->select('express_yourself')->first();
    
        return response()->json($data, 200);
    }

    public function education(Request $req){
        $view_reg_id = $req->reg_id;
       
        $data['career'] = CareerDetail::where('reg_id',$view_reg_id)->with('getIncome:incomes.id,income','getOccupation:occupations.id,occupation,occupation_category','getEducation:educations.id,education','getUg:educations.id,education','getPg:educations.id,education')->select('highest_qualification','schooling','ug_qualification','ug_clg','pg_qualification','pg_clg','occupation','organization_name','income')->first();

        return response()->json($data, 200);
    }

    public function family(Request $req){
        $view_reg_id = $req->reg_id;
       
        $data['family'] = FamilyDetail::where('reg_id',$view_reg_id)->with('getIncome:incomes.id,income','getMotherOccupation:occupations.id,occupation','getFatherOccupation:occupations.id,occupation','getCity:id,name')->first();

        return response()->json($data, 200);
    }

    public function lifestyle(Request $req){
        $view_reg_id = $req->reg_id;
       
        $data['lifestyle'] = LifeStyle::where('reg_id',$view_reg_id)->first();

        return response()->json($data, 200);
    }

    public function likes(Request $req){
        $view_reg_id = $req->reg_id;
       
        $user = LikeDetails::where('reg_id',$view_reg_id)->first();
        $data['likes'] = LikeDetails::where('reg_id',$view_reg_id)->select('fav_read','tv_show','movie','dish','vacation_destination')->first();
        $data['color'] = Color::whereIn('id', explode(',',$user->color))->select('name')->get();
        $data['hobby'] = Hobbies::whereIn('id', explode(',',$user->hobbies))->select('hobby')->get();
        $data['interest'] = Interest::whereIn('id', explode(',',$user->interest))->select('interest')->get();
        $data['music'] = MusicTypes::whereIn('id', explode(',',$user->music))->select('music_type')->get();
        $data['book'] = BookTypes::whereIn('id', explode(',',$user->book))->select('book_type')->get();
        $data['dress'] = DressStyles::whereIn('id', explode(',',$user->dress))->select('dress_style')->get();
        $data['movie_type'] = Movietypes::whereIn('id', explode(',',$user->movie_type))->select('movietype')->get();
        $data['sport'] = Sports::whereIn('id', explode(',',$user->sport))->select('sport_name')->get();
        $data['cuisine'] = Cuisines::whereIn('id', explode (',',$user->cuisine))->select('name')->get();
        return response()->json($data, 200);
    }


    public function desired(Request $req){
        $user_id = Auth::user()->user_reg_id;
        $view_reg_id = $req->reg_id;
       

        $result1 = DesiredProfile::where('reg_id', $view_reg_id)->first();
        $result2 = BasicDetail::with('getCareer:career_details.reg_id,highest_qualification,occupation,income','getLifeStyle:lifestyle_details.reg_id,diet_habit,drink_habit,smoking_habit,challenged')->where('reg_id', $user_id)->first();
        $desired = 

        $dob = date('Y-m-d',strtotime($result2->dob));
        $age = (\Carbon\Carbon::parse($dob)->age);
        $age_id = Age::select('id')->where('age', $age)->first();
        
        $count = 0;
        $matchCount = 0;
        // return response()->json($result2->dob);
        
        if(!empty($result1->min_age && $result1->max_age))
        {
            $count++;
            if(($age_id->id >= $result1->min_age) && ($age_id->id <= $result1->max_age)){
                $data['age'] = 1 ;
                $matchCount++;
            } else{
                $data['age'] = 0 ;
            }  
            
        }      


        if(!empty($result1->min_height && $result1->max_height))
        {
            $count++;
            if(($result2->height >= $result1->min_height) && ($result2->height <= $result1->max_height)){
                $data['height'] = 1 ;
                $matchCount++;
            }else{
                $data['height'][0] = 0 ;
            }  
            
        }
             

        if(!empty($result1->maritial)) 
        {
            $count++;
            if(str_contains($result1->maritial, $result2->maritial_status) ){
                $data['maritial'] = 1;
                $matchCount++;
            }else{
                $data['maritial'] = 0;
            }
            
        }
       

        if(!empty($result1->country))
        {
            $count++;
            if(in_array($result2->country, (explode(',',$result1->country)))){
                $data['country'] = 1;
                $matchCount++;
            }else{
                $data['country'] = 0 ;
            }
        }
         

        if(!empty($result1->residential))
        {
            $count++; 
            if(str_contains($result1->residential, $result2->residence)){
                $data['residential'] = 1;
                $matchCount++;
            }else{
                $data['residential'] = 0;
            }
           
        }
       


        if(!empty($result1->religion)){
            $count++; 
            if(in_array($result2->religion, explode(',',$result1->religion)) ){
                $data['religion'] = 1;
                $matchCount++;
            }else{
                $data['religion'] = 0 ;
            }
        
        }
      
        if(!empty($result1->caste)){
            $count++; 
            if(in_array($result2->caste, explode(',',$result1->caste))){
                $data['caste'] = 1;
                $matchCount++;
            }else{
                $data['caste'] = 0 ;
            }
        }
       
        

        if(!empty($result1->mother_tongue)){
            $count++;
            if(in_array($result2->mother_tongue, explode(',',$result1->mother_tongue))){
                $data['mother_tongue'] = 1;
                $matchCount++;
            }else{
                $data['mother_tongue'] = 0 ;
            }
        } 
        

        if(!empty($result1->manglik)){
            $count++;
            if(str_contains($result1->manglik, $result2->manglik )){
                $data['manglik'] = 1 ;
                $matchCount++;
            }else{
                $data['manglik'] = 0;
            }
        }
        
       

        if(!empty($result1->highest_education))
        {
            $count++;
            if(in_array($result2->getCareer['highest_qualification'], explode(',',$result1->highest_education))){
                $data['qualification'] = 1;
                $matchCount++;
            }else{
                $data['qualification'] = 0;
            }
        }
       
        if(!empty($result1->occupation)){
            $count++;
            if(in_array( $result2->getCareer['occupation'] , explode(',',$result2->occupation))){
                $data['occupation'] = 1;
                $matchCount++;
            }else{
                $data['occupation'] = 0;
            }
        }
     


        if(!empty($result1->min_income && $result1->max_income))
        { 
            $count++;
            if(($result1->min_income <= $result2->getCareer->income) && ($result1->max_income >=  $result2->getCareer->income)){
                $data['income'] = 1;
                $matchCount++;
            } else{
                $data['income'] = 0;
            }
       
        } 

        if(!empty($result1->diet)) 
        {
            $count++;
            if(str_contains($result1->diet, $result2->getCareer->diet_habit )){
                $data['diet'] = 1;
                $matchCount++;
            }else{
                $data['diet'] = 0;
            }
        } 

        if(!empty($result1->drinking)) 
        {
            $count++;
            if(str_contains($result1->drinking, $result2->getCareer->drink_habit )){
                $data['drinking'] = 1;
                $matchCount++;
            }else{
                $data['drinking'] = 0;
            }
        } 

        if(!empty($result1->smoking))
        {
            $count++;
            if(str_contains($result1->smoking, $result2->getCareer->smoking_habit )){
                $data['smoking'] = 1;
                $matchCount++;
            }else{
                $data['smoking'] = 0;
            }
        } 

        if(!empty($result1->challenged))
        {
            $count++;
            if(str_contains($result1->challenged, $result2->getCareer->challenged )){
                $data['challenged'] = 1;
                $matchCount++;
            }else{
                $data['challenged'] = 0;
            }
        } 
      
        $data['count'] = $count;
        $data['matchCount'] = $matchCount;
        $data['gender'] = UserRegister::where('id', $view_reg_id)->select('gender')->first();
        $data['desired']['data'] = DesiredProfile::with('getMinIncome:incomes.id,income','getMaxIncome:incomes.id,income','getMinAge:ages.id,age','getMaxAge:ages.id,age','getMinHeight:heights.id,height','getMaxHeight:heights.id,height')->select('maritial','manglik','diet','drinking','smoking','challenged','min_age','max_age','min_height','max_height','min_income','max_income')->where('reg_id', $view_reg_id)->first();
        $data['desired']['country'] = Country::whereIn('id', explode(',',$result1->country))->select('name')->get();
        $data['desired']['residence'] = Residence::whereIn('id', explode(',',$result1->residential))->select('residence')->get();
        $data['desired']['religion'] = Religion::whereIn('id', explode(',',$result1->religion))->select('religion')->get();
        $data['desired']['caste'] = Caste::whereIn('id', explode(',',$result1->caste))->select('caste')->get();
        $data['desired']['mother_tongue'] = MotherTongue::whereIn('id', explode(',',$result1->mother_tongue))->select('mother_tongue')->get();
        $data['desired']['education'] = Education::whereIn('id', explode(',',$result1->highest_education))->select('education')->get();
        $data['desired']['occupation'] = Occupation::whereIn('id', explode(',',$result1->occupation))->select('occupation')->get();
        

        return response()->json($data, 200);
        
    }

    
}

