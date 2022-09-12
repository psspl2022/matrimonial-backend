<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\BasicDetail;
use App\Models\CareerDetail;
use App\Models\FamilyDetail;
use App\Models\UserRegister;
use App\Models\User;
use App\Models\LifeStyle;
use App\Models\Occupation;
use App\Models\Income;
use App\Models\VerifyUser;
use App\Models\LikeDetails;
use Exception;
use Mail;
use Mockery\Undefined;

class ProfileController extends Controller
{
    public function createBasic(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'dob' => 'required',
            'marital_status' => 'required',
            'religion' => 'required',
            'caste' => 'required',
            // 'sub_caste' => 'required',
            'mother_tongue' => 'required',
            'horrorscope_match_required' => 'required',
            'height' => 'required',
            'manglik' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required'
            // 'city_live_in' => 'required',user_reg_id
            // 'sect' => 'required',
            // 'live_with_family' => 'required',
            // 'desc' => 'required'
        ]);
        // return response()->json($req->name);
        $data = new BasicDetail();
        $data->reg_id = Auth::user()->user_reg_id;
        $data->name = $req->name;
        $data->dob = $req->dob;
        $data->marital_status = $req->marital_status;
        $data->religion = $req->religion;
        $data->caste = $req->caste;
        // $data->sub_caste = $req->sub_caste;
        $data->mother_tongue = $req->mother_tongue;
        $data->horrorscope_match_required = $req->horrorscope_match_required;
        $data->height = $req->height;
        $data->manglik = $req->manglik;
        $data->residence = ($req->residence != 'undefined') ? $req->residence : null;
        $data->country = $req->country;
        $data->state = $req->state;
        $data->city = $req->city;
        $data->pincode = $req->pincode;
        if ($data->save()) {

            $data1 = UserRegister::find(Auth::user()->user_reg_id);
            $data1->stage_no = 3;
            $data1->save();

            return response()->json(['msg' => 'Basic Details added Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Error while uploading basic details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }



    public function createCareer(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'highest_qualification' => 'required',
            'schooling' => 'required',
            'ug_qualification' => 'required',
            // 'ug_clg'=>'required',
            'pg_qualification' => 'required',
            // 'pg_clg'=>'required',
            'employement_sector' => 'required',
            'occupation' => 'required',
            'income' => 'required',
            'express_yourself' => 'required'
        ]);

        $data = new CareerDetail();
        $data->reg_id = Auth::user()->user_reg_id;
        $data->highest_qualification = ($req->highest_qualification != 'undefined') ? $req->highest_qualification : null;
        $data->schooling = $req->schooling;
        $data->ug_qualification = ($req->ug_qualification != 'undefined') ? $req->ug_qualification : null;
        // $data->ug_clg = $req->ug_clg;
        $data->pg_qualification = ($req->pg_qualification != 'undefined') ? $req->pg_qualification : null;
        // $data->pg_clg = $req->pg_clg;
        $data->employement_sector = $req->employement_sector;
        $data->occupation = $req->occupation;
        $data->income = $req->income;
        $data->express_yourself = $req->express_yourself;
        // $data->added_by = Auth::user()->id;
        if ($data->save()) {

            $data1 = UserRegister::find(Auth::user()->user_reg_id);
            $data1->stage_no = 4;
            $data1->save();

            return response()->json(['msg' => 'Career Details Added Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Error while uploading career details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function createFamily(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'family_type' => 'required',
            'family_values' => 'required',
            // 'family_status'=>'required',
            // 'father_occupation'=>'required',
            // 'mother_occupation'=>'required',
            // 'brother_count'=>'required',
            // 'married_brother_count'=>'required',
            // 'sister_count'=>'required',
            // 'married_sister_count'=>'required',
            // 'family_address'=>'required',
            // 'native_state'=>'required',
            // 'native_state'=>'required',
            // 'family_income'=>'required',
            // 'gotra'=>'required',
            // 'about_family'=>'required'            
        ]);

        $data = new FamilyDetail();
        $data->reg_id = Auth::user()->user_reg_id;
        $data->family_type = $req->family_type;
        // $data->family_values = $req->family_values;
        // $data->family_status = $req->family_status;
        $data->father_occupation = $req->father_occupation;
        $data->mother_occupation = $req->mother_occupation;
        $data->brother_count = $req->brother_count;
        // $data->married_brother_count = $req->married_brother_count;
        $data->sister_count = $req->sister_count;
        // $data->married_sister_count = $req->married_sister_count;
        // $data->family_address = $req->family_address;
        $data->native_city = $req->native_city;
        $data->native_state = $req->native_state;
        // $data->family_income = $req->family_income;
        // $data->gotra = $req->gotra;
        $data->about_family = $req->about_family;
        // $data->added_by = Auth::user()->id;
        if ($data->save()) {

            $data1 = UserRegister::find(Auth::user()->user_reg_id);
            $data1->stage_no = 5;
            $data1->save();

            return response()->json(['msg' => 'Family Details added Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Error while uploading family details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }



    public function showBasicById($id)
    {
        $data['basic'] = BasicDetail::where('reg_id', $id)->first();
        $data['gender'] = UserRegister::select('gender')->where('id', $id)->first();
        return response()->json($data, 200);
    }

    public function editBasic(Request $req)
    {
        // $validator = Validator::make($req->all(),[

        // 'dob' => 'required',
        // 'marital_status' => 'required',
        // 'religion' => 'required',
        // 'caste' => 'required',
        // 'sub_caste' => 'required',
        // 'mother_tongue' => 'required',
        // 'horrorscope_match_required' => 'required',
        // 'height' => 'required',
        // 'manglik' => 'required',
        // 'country' => 'required',
        // 'state' => 'required',
        // 'city' => 'required',
        // 'city_live_in' => 'required',
        // 'sect' => 'required',
        // 'live_with_family' => 'required',
        // 'desc' => 'required'
        // ]);

        // return response()->json(['msg'=>'hello'],200); 
        // dd($req->all());
        $id = Auth::user()->user_reg_id;
        $data = BasicDetail::where('reg_id', $id)->update([
            'marital_status' => $req->marital_status,
            'religion' => $req->religion,
            'caste' => $req->caste,
            'mother_tongue' => $req->mother_tongue,
            'height' => $req->height,
            'residence' => $req->residence,
            'country' => $req->country,
            'state' => $req->state,
            'city' => $req->city,
            'sect' => $req->sect
        ]);




        if ($data) {
            return response()->json(['msg' => 'Basic Details updated Succesfully'], 200);
        } else {
            return response()->json(['msg' => 'Error while uploading basic details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }


    public function showAboutById()
    {

        $id = Auth::user()->user_reg_id;
        // $id = 1;
        $data['yourself'] = BasicDetail::select('description')->where('reg_id', $id)->first();
        $data['family'] = FamilyDetail::select('about_family')->where('reg_id', $id)->first();
        $data['career'] = CareerDetail::select('express_yourself')->where('reg_id', $id)->first();
        return response()->json($data, 200);
    }


    public function EditAbout(Request $req)
    {

        $id = Auth::user()->user_reg_id;
        $data = BasicDetail::where('reg_id', $id)->update(['description' => $req->yourself]);

        $data1 = FamilyDetail::where('reg_id', $id)->update(['about_family' => $req->family]);

        $data2 = CareerDetail::where('reg_id', $id)->update(['express_yourself' => $req->career]);

        if ($data->save() && $data1->save() && $data2->save()) {
            return response()->json(['msg' => 'About Me Data has been updated successfully!']);
        }
    }

    public function showCareerById()
    {
        $id = Auth::user()->user_reg_id;

        $data = CareerDetail::where('reg_id', $id)->first();
        return response()->json($data, 200);
    }

    public function EditCareer(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'highest_qualification' => 'required',
            'schooling' => 'required',
            // 'ug_qualification'=>'required',
            // 'ug_clg'=>'required',
            // 'pg_qualification'=>'required',
            // 'pg_clg'=>'required',
            // 'employement_sector'=>'required',
            // 'occupation'=>'required',
            // 'income'=>'required',
            // 'express_yourself'=>'required'
        ]);

        $id = Auth::user()->user_reg_id;
        //  $id = 1;

        $data = CareerDetail::where('reg_id', $id)->update([
            'highest_qualification' => $req->highest_qualification,
            'schooling' => $req->schooling,
            'ug_qualification' => $req->ug_qualification,
            'ug_clg' => $req->ug_clg,
            'pg_qualification' => $req->pg_qualification,
            'pg_clg' => $req->pg_clg,
            'employement_sector' => $req->employement_sector,
            'occupation' => $req->occupation,
            'organization_name' => $req->organization_name,
            'income' => $req->income
        ]);
        if ($data) {
            return response()->json(['msg' => 'Career Details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading career details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function showFamilyById()
    {
        $id = Auth::user()->user_reg_id;
        $data = FamilyDetail::where('reg_id', $id)->first();
        return response()->json($data, 200);
    }

    public function editFamily(Request $req)
    {

        $validator = Validator::make($req->all(), [
            // 'family_type' => 'required',
            // 'family_values'=>'required',
            // 'family_status'=>'required',
            //'profile_handler_name' => 'required',
            // 'father_occupation'=>'required',
            // 'mother_occupation'=>'required',
            // 'brother_count'=>'required',
            // 'married_brother_count'=>'required',
            // 'sister_count'=>'required',
            // 'married_sister_count'=>'required',
            // 'family_address'=>'required',
            // 'native_state'=>'required',
            // 'native_state'=>'required',
            // 'family_income'=>'required',
            // 'gotra'=>'required',
            // 'gotra_maternal'=>'required',
            // 'about_family'=>'required'            
        ]);

        $id = Auth::user()->user_reg_id;
        $data = FamilyDetail::updateOrCreate(
            ['reg_id' => $id],
            [
                'reg_id' => $id,
                'profile_handler_name' => $req->profile_handler_name,
                'father_occupation' => $req->father_occupation,
                'mother_occupation' => $req->mother_occupation,
                'brother_count' => $req->brother_count,
                'married_brother_count' => $req->married_brother_count,
                'sister_count' => $req->sister_count,
                'married_sister_count' => $req->married_sister_count,
                'gotra' => $req->gotra,
                'gotra_maternal' => $req->gotra_maternal,
                'family_status' => $req->family_status,
                'family_values' => $req->family_values,
                'family_type' => $req->family_type,
                'family_income' => $req->family_income,
                'native_state' => $req->native_state,
                'native_city' => $req->native_city,
                'living_with_parent' => $req->living_with_parent
            ]
        );
        if ($data) {
            return response()->json(['msg' => 'Family Details updated Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Error while uploading family details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function showContactById()
    {
        $id = Auth::user()->user_reg_id;
        $data = UserRegister::find($id);
        return response()->json($data, 200);
    }

    public function editContact(Request $req)
    {
        $id = Auth::user()->user_reg_id;
        $validator = Validator::make($req->all(), [
            'contact' => 'required',
            // 'email'=>'required',
            // 'landline' => 'required',
            // 'contact_address'=>'required',
            // 'contact_pincode'=>'required',
            // 'parent_address'=>'required',
            // 'parent_pincode'=>'required',  
            // 'time_for_call' =>'required'        
        ]);

        $data = UserRegister::where('id', $id)->update([
            'contact' => $req->contact,
            'alter_contact' => $req->alter_contact,
            'alter_email' => $req->alter_email,
            'landline' => null,
            // 'time_for_call' => $req->time_for_call,
            // 'contact_address' => $req->contact_address,
            // 'contact_pincode' => $req->contact_pincode,
            // 'parent_address' => $req->parent_address,
            // 'parent_pincode' => $req->parent_pincode
        ]);

        if ($data) {
            return response()->json(['msg' => 'Contact Details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading Contact details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }


    public function showLifeStyleById()
    {
        $id = Auth::user()->user_reg_id;
        $data = LifeStyle::where('reg_id', $id)->first();
        return response()->json($data, 200);
    }

    public function editLifestyle(Request $req)
    {
        $validator = Validator::make($req->all(), [
            // 'diet' => 'required',
            // 'drinking'=>'required',          
        ]);
        $id = Auth::user()->user_reg_id;
        $data = LifeStyle::updateOrCreate(
            ['reg_id' => $id],
            [
                'reg_id' => $id,
                'language_i_speak' => $req->language,
                'diet_habit' => $req->diet_habit,
                'drink_habit' => $req->drink_habit,
                'smoking_habit' => $req->smoking_habit,
                'open_to_pets' => $req->open_to_pets,
                'own_a_house' => $req->own_a_house,
                'own_a_car' => $req->own_a_car,
                'blood_group' => $req->blood_group,
                'hiv_pos' => $req->hiv_pos,
                'thalessemia' => $req->thalessemia,
                'challenged' => $req->challenged
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Lifestyle Details updated Succesfully']);
        } else {
            return response()->json(['msg' => 'Error while uploading LifeStyle details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function showLikesDetails()
    {
        $id = Auth::user()->user_reg_id;
        $data = LikeDetails::where('reg_id', $id)->first();
        return response()->json($data, 200);
    }

    public function editLikesDetails(Request $req)
    {
        $validator = Validator::make($req->all(), []);
        $id = Auth::user()->user_reg_id;
        $data = LikeDetails::updateOrCreate(
            ['reg_id' => $id],
            [
                'reg_id' => $id,
                'color' => $req->color,
                'hobbies' => $req->hobbies,
                'interest' => $req->interest,
                'music' => $req->music,
                'book' => $req->book,
                'fav_read' => $req->read,
                'dress' => $req->dress,
                'tv_show' => $req->tv_show,
                'movie_type' => $req->movie_type,
                'movie' => $req->movie,
                'sport' => $req->sport,
                'cuisine' => $req->cuisine,
                'dish' => $req->dish,
                'vacation_destination' => $req->vacation_destination
            ]
        );

        if ($data) {
            return response()->json(['msg' => 'Likes Details updated Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Error while uploading Likes Details!']);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors(), 202);
        }
    }

    public function getRegisterFormStatus()
    {
        $stage_no = UserRegister::select('stage_no')->where('id', Auth::user()->user_reg_id)->get();
        return response($stage_no, 200);
    }

    public function sendOtpToMail()
    {
        // $random_password =  Str::random(0,999999); 
        $random_password = random_int(0, 999999);
        $random_password = str_pad($random_password, 6, 0, STR_PAD_LEFT);

        $user_data = User::find(Auth::user()->id);
        if (empty($user_data->otp)) {

            // $user_name = BasicDetail::where('user_reg_id',Auth::user()->user_reg_id)->first();
            // $toEmail = 'ankit.bisht@prakharsoftwares.com';
            $toEmail = $user_data->email;
            $from = env('MAIL_FROM_ADDRESS');
            $subject = "Email Verification by Namdeo Matrimonial";
            $data =
                [
                    'otp' => $random_password,
                    'email' => $user_data->email,
                    'name' => $user_data->name
                ];

            $mail_send = Mail::send('mail.sendmail', $data, function ($message) use ($toEmail) {
                $message->to($toEmail)
                    ->subject('Email Verification by Namdeo Matrimonial');
                $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            });
            if ($mail_send) {
                return response()->json(['error_msg' => 'Error while Sending Otp!']);
            }
            $user_data->otp = $random_password;
            $user_data->save();
            return response()->json(['msg' => 'Otp Sent to Gmail Succesfully']);
        } else {
            return response()->json(['msg' => 'Otp Already Sent Succesfully']);
        }
    }

    public function checkOtpToMail(Request $req)
    {
        $user_data = User::find(Auth::user()->id);
        if ($user_data->otp == $req->otp) {
            $save_stage = UserRegister::find(Auth::user()->user_reg_id);
            $save_stage->stage_no = 2;
            $save_stage->save();
            return response()->json(['msg' => 'Otp Verified Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Otp did not match']);
        }
    }

    public function storeProfileImage(Request $req)
    {
        $validator = Validator::make(
            $req->all(),
            [
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]
        );
        if ($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
        }
        if ($req->has('image')) {
            $image = $req->image;
            $filename = time() . rand(2, 3) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("Documents/Image_Documents/"), $filename);

            $id = Auth::user()->user_reg_id;
            $data = VerifyUser::updateOrCreate(
                ['by_reg_id' => $id],
                [
                    'by_reg_id' => $id,
                    'identity_card_doc' => $filename,

                ]
            );
            if ($data) {
                $data1 = UserRegister::find($id);
                $data1->stage_no = 6;
                $data1->save();
            }
            return response()->json(['msg' => 'Image Uploaded Succesfully']);
        } else {
            return response()->json(['error_msg' => 'Image Upload Failed!']);
        }
    }

    public function skipOtp()
    {
        $user_data = Auth::user()->user_reg_id;
        UserRegister::where("id", $user_data)->update(["stage_no" => "2"]);
        return response()->json(['msg' => 'Skipped Successfully']);
    }


    public function getProfileImage()
    {
        $img_file = VerifyUser::select('identity_card_doc')->where('by_reg_id', Auth::user()->user_reg_id)->first();
        if ($img_file) {
            return response()->json(['msg' => $img_file]);
        } else {
            return response()->json(['error_msg' => 'Image not uploaded yet']);
        }
    }


    public function getAllUserProfiles(Request $req)
    {
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
        $check = [['reg_id', '!=', Auth::user()->user_reg_id]];
        // if marital statu value nul set thius value
        if ($req->caste != 'null' && $req->caste != "undefined") {
            $check[0] = ['caste', '==', $req->caste];
        }
        // // if marital statu value nul set thius value
        // if ($req->occupation != 'null') {
        //     $check = ['occupation', '==', $req->occupation];
        // }
        // if marital statu value nul set thius value
        if ($req->state != 'null' && $req->state != "undefined") {
            $check[0]   = ['state', '==', $req->state];
        }
        // if marital statu value nul set thius value
        if ($req->city != 'null' && $req->city != "undefined") {
            $check[0]  = ['city', '==', $req->city];
        }
        $reg_id = Auth::user()->user_reg_id;
        $gender = (int)(UserRegister::where('id', $reg_id)->first('gender'))->gender;
        //  if gender is male or female
        if ($gender == 1  || $gender == 2) {
            $data = BasicDetail::with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getInterestSent:reg_id,reg_id', 'getShortlist:id,saved_reg_id',  'getHeight:id,height', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getState:id,name', 'getCity:id,name', 'getOccupation:occupations.id,occupations.occupation', 'getIncome:incomes.id,incomes.income', 'getEducation:educations.education')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city', 'state', 'marital_status')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->whereRelation('getUserRegister', 'gender', '!=', $gender)->where($check)->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
            // get unique id for pagination 
            $ids = BasicDetail::select("reg_id")->whereRelation('getUserRegister', 'gender', '!=', $gender)->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->where($check)->wherein('religion', $relgion)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
        } else {
            //  if gender is others
            $data = BasicDetail::with('getProfileImage:by_reg_id,identity_card_doc', 'getUserRegister:id,gender', 'getHeight:id,height', 'getInterestSent:reg_id,reg_id', 'getReligion:id,religion', 'getCaste:id,caste', 'getMotherTongue:id,mother_tongue', 'getState:id,name', 'getCity:id,name', 'getOccupation:occupations.id,occupations.occupation', 'getIncome:incomes.income', 'getEducation:educations.education', 'getShortlist:id,saved_reg_id', 'getInterestSent:reg_id,reg_id')->select('reg_id', 'name', 'dob', 'height', 'religion', 'caste', 'mother_tongue', 'city', 'state', 'marital_status')->has('getUserRegister')->has('getProfileImage')->has('getIncome')->has('getOccupation')->has('getEducation')->has('getHeight')->has('getReligion')->has('getMotherTongue')->has('getCity')->where('reg_id', '>', $req->page)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->where($check)->wherein('marital_status', $martital)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get()->take(4);
            // get unique id for pagination 
            $ids = BasicDetail::select("reg_id")->where('reg_id', '!=', Auth::user()->user_reg_id)->wherein('mother_tongue', $moth)->wherein('religion', $relgion)->wherein('marital_status', $martital)->where($check)->whereRelation('getIncome', 'incomes.id', '>=', $req->minincome)->whereRelation('getIncome', 'incomes.id', '<=', $req->maxincome)->whereBetween('dob', [$req->maxage, $req->minage])->whereBetween('height', [$req->minheight, $req->maxheight])->get();
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
        $data3 = ["data" => $data, "key" => $key, 'total' => ceil(count($ids) / 4), 'page' => $current, 'test' => $check];
        return response()->json($data3, 200);
    }
}
