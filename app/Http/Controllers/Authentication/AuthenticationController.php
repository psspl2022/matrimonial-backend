<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Models\User;
use App\Models\AdminRegister;
use App\Models\UserRegister;


class AuthenticationController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(),[
            // 'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'for' => 'required',
            'contact'=>'required|max:10|min:10'
        ]);
       
        if($validator->fails()){
            // return response()->json($validator->errors(),202);
            // return response()->json(['errors' => $validator->errors()]);
        }

        $user = User::where('email', '=', $req->email)->first();
        if ($user) {
            return response()->json(["error"=>"User Already Registered, Please Login!"]);
        }

        $input = $req->all();
        $input['password'] = Hash::make($input['password']);
        
        $Register = new RegisterController();
        $Register->createRegister($req);
        $id = UserRegister::orderBy('id', 'DESC')->first();
        
        // $user = User::create([
        //     'reg_id' => 1,
        //     // 'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => $input['password']
        // ]);

        $user = new User();
        $user->user_type = 1;
        $user->admin_reg_id = NULL;
        $user->user_reg_id = $id->id;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->save();

        $user_data = User::select('user_reg_id','name','email')->where('user_reg_id',$id->id)->first();

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyToken')->accessToken;
        $responseArray['msg'] = "Registered Succesfully";
        $responseArray['user'] = $user;
       
        return response()->json($responseArray,200);   
        
    }


    public function adminRegister(Request $req)
    {
        $validator = Validator::make($req->all(),[
            // 'name' => 'required',
            'email' => 'required|email|unique:users,email|unique:admin_registers,email',
            'contact'=>'required|max:10|min:10'
        ]);
       
        if($validator->fails()){
            // return response()->json($validator->errors(),202);
            return response()->json(['errors' => $validator->errors()]);
        }

        $input = $req->all();
        $password = Hash::make($input['name'].'@123');
        
        $Register = new AdminRegisterController();
        $Register->createRegister($req);
        $id = AdminRegister::orderBy('id', 'DESC')->first();
        
        // $user = User::create([
        //     'reg_id' => 1,
        //     // 'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => $input['password']
        // ]);

        $user = new User();
        $user->user_type = $input['user_type'];
        $user->admin_reg_id = $id->id;
        $user->user_reg_id = NULL;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $password;
        $user->save();

        // $user_data = User::select('admin_reg_id','user_type','name','email')->where('admin_reg_id',$id->id)->first();

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyToken')->accessToken;
        $responseArray['msg'] = "Registered Succesfully";
        // $responseArray['user'] = $user;
       
        return response()->json($responseArray,200);   
        
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
            $user = Auth::user(); 
            $responseArray['token'] = $user->createToken('MyToken')->accessToken;
            $responseArray['msg'] = "Login Successfully";
            $responseArray['user'] = $user;
            $responseArray['gender'] = UserRegister::where('id',$user['user_reg_id'])->select('gender')->first();
            
            return response()->json($responseArray,200);
        } else{
            return response()->json(['error'=>'Unauthenticated User'],203);
        }
    }

    public function logout (Request $req) {
        // auth()->logout();
        $token = $req->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response()->json($response, 200);
    }

    public function getAdminList () {
        $response = User::select('id', 'user_type','admin_reg_id','status')->with('getAdmin:id,user_id,name,email,gender,contact,address,created_on,status as r_status','getCountry:countries.name as cname', 'getState:states.name as sname', 'getCity:cities.name as ciname')->whereIn('user_type',['2','3'])->get();
        return response()->json($response, 200);
    }

    public function getUserList () {
        $response = User::select('id','user_type','user_reg_id','name', 'status')->with('getUser')->where('user_type','1')->get();
        return response()->json($response, 200);
    }

}
