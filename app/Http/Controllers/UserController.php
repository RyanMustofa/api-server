<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $api_token = sha1(time());

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->api_token = $api_token;
        $user->save();

        return response()->json($user);
    }
    public function login(Request $request)
    {
        $credential = $request->only(['email','password']);
        $row = Auth::attempt($credential); 
        if(!$row){
            return response()->json(['message' => "gagal login"]);
        }else{
            return response()->json(['message' => "berhasil login"]);
        }
    }
}
