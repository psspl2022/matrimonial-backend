<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
use App\Models\Register;


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
            return response()->json(['errors' => $validator->errors()]);
        }

        $input = $req->all();
        $input['password'] = Hash::make($input['password']);
        
        $Register = new RegisterController();
        $Register->createRegister($req);
        
        
        $id = Register::all()->last()->first('id');
        
        // $user = User::create([
        //     'reg_id' => 1,
        //     // 'name' => $input['name'],
        //     'email' => $input['email'],
        //     'password' => $input['password']
        // ]);

        $user = new User();
        $user->reg_id = $id->id;
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->save();
        

        

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyToken')->accessToken;
        $responseArray['msg'] = "Registered Succesfully";
       
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
            $responseArray = [];
            $responseArray['token'] = $user->createToken('MyToken')->accessToken;
            $responseArray['msg'] = "Login Successfully";
       
            return response()->json($responseArray,200);
        } else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }
    }

    public function logout (Request $req) {
        $token = $req->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

}