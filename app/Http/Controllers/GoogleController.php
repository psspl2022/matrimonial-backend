<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;
use App\Models\User;
use App\Http\Controllers\User\RegisterController;
use App\Models\VerifyUser;
use Carbon\Carbon;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{

    public function createRegister(Request $req)
    {
        //Matrimony Id
        $total_rows = UserRegister::orderBy('id', 'desc')->count();
        $matrimony_id = "NM/";
        if ($total_rows == 0) {
            $matrimony_id .= '00001';
        } else {
            $last_id = UserRegister::orderBy('id', 'desc')->first()->id;
            $matrimony_id .= sprintf("%'05d", $last_id + 1);
        }


        $data = new UserRegister();
        $data->matrimony_id = $matrimony_id;
        $data->profile_for = $req->for;
        $data->email = $req->email;
        $data->contact = 0;
        $data->stage_no = 0;
        // $data->added_by = Auth::user()->id;
        $data->save();
        $user_id = $data->id;

        $user_pac = new UserPackage();
        $user_pac->reg_id = $user_id;
        $user_pac->package_id = 1;
        $user_pac->credit_count = 30;
        $user_pac->view_count = 15;
        $user_pac->shortlist_count = 20;
        $user_pac->save();
    }
    public function store(Request $req)
    {
        $mytime = Carbon::now();
        $data = [
            "name" =>  $req->name,
            "email" =>  $req->email,
            "imageUrl" =>  $req->imageUrl,
        ];
        $input = $req->all();
        $user = UserRegister::where('email', '=', $req->email)->first();

        $responseArray = [];
        if ($user) {
            $password = $input['email'] . '@123';
            if (Auth::attempt(['email' => $req->email, 'password' => $password])) {
                $user = Auth::user();
                $gender2 = UserRegister::where('id', $user['user_reg_id'])->select('gender')->first();
                // return $gender2;
                if ($gender2->gender > 0) {
                    $responseArray['token'] = $user->createToken('MyToken')->accessToken;
                    $responseArray['msg'] = "Login Successfully";
                    $responseArray['user'] = $user;
                    $responseArray['stage'] = UserRegister::where('id', $user['user_reg_id'])->select('stage_no')->first();
                    $responseArray['gender'] = UserRegister::where('id', $user['user_reg_id'])->select('gender')->first();
                    $responseArray['login_type'] = "google";
                    $responseArray = ["page" => "login", "data" => $responseArray];
                    return response()->json($responseArray, 200);
                } else {
                    $user = Auth::user();
                    $responseArray['token'] = $user->createToken('MyToken')->accessToken;
                    $responseArray['msg'] = "Login Successfully";
                    $responseArray['user'] = $user;
                    $responseArray['login_type'] = "google";
                    $responseArray['stage'] = UserRegister::where('id', $user['user_reg_id'])->select('stage_no')->first();
                    $responseArray = ["page" => "register", "data" => $responseArray];
                    return response()->json($responseArray, 200);
                }
            }
        } else {
            $password = Hash::make($input['email'] . '@123');
            //Matrimony Id
            $id = UserRegister::orderBy('id', 'DESC')->first();
            $this->createRegister($req);
            $id = UserRegister::orderBy('id', 'DESC')->first();
            $user = new User();
            $user->user_type = 1;
            $user->admin_reg_id = NULL;
            $user->user_reg_id = $id->id;
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->password = $password;
            $user->email_verified_at = $mytime;
            $user->save();

            $filename = basename($req->imageUrl);
            $filename = "$filename.jpg";
            $img = public_path('Documents\Image_Documents') . "\\$filename";
            file_put_contents($img, file_get_contents($req->imageUrl));

            $pro = new VerifyUser();
            $pro->by_reg_id =  $id->id;
            $pro->identity_card_doc = $filename;
            $pro->verified = "1";
            $pro->status = "1";
            $pro->save();
            $user_data = User::select('user_reg_id', 'name', 'email')->where('user_reg_id', $id->id)->first();

            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyToken')->accessToken;
            $responseArray['login_type'] = "google";
            $responseArray['msg'] = "Registered Succesfully";
            $responseArray['user'] = $user;
            $responseArray = ["page" => "register", "data" => $responseArray];
            return response()->json($responseArray, 200);
        }
    }
    public function contactUpdate(Request $req)
    {

        $id = Auth::user()->user_reg_id;
        UserRegister::where('id', $id)->update($req->all());
        $save_stage = UserRegister::find(Auth::user()->user_reg_id);
        $save_stage->stage_no = 2;
        $save_stage->save();
        $responseArray = [];
        $responseArray['gender'] = $req->gender;
        $responseArray['stage'] = 2;
        return response()->json($responseArray, 200);
    }
    public function changeStage(Request $req)
    {

        $id = Auth::user()->user_reg_id;
        $save_stage = UserRegister::find(Auth::user()->user_reg_id);
        $save_stage->stage_no = $req->stage;
        $save_stage->save();
        $responseArray = [];
        $responseArray['stage'] = 6;
        return response()->json($responseArray, 200);
    }
}
