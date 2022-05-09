<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;


class AuthenticationController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(),[
            // 'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm-password' => 'required|same:password'
        ]);
       
        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }

        $input = $req->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $Register = new RegisterController();
        $Register->createRegister($req);

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyToken')->accessToken;
        $responseArray['name'] = $user->name;

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
            $responseArray['name'] = $user->name;
       
            return response()->json($responseArray,200);
        } else{
            return response()->json(['error'=>'Unauthenticated'],203);
        }

    }

}
