<?php

namespace App\Http\Controllers;

use App\Models\wn_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;

class userAuthController extends Controller
{
    public function registerUser(Request $request){
        $table = "wn_users";
        $validate = $request->validate([
            "registerUsername"=>"required",
            "registerEmail"=>"required|unique:".$table.",email",
            "registerPassword"=>"required",
            "registerConfirmPassword"=>"required|same:registerPassword",
        ]);

        $password = $request->registerPassword;

        $data = [
            "username"=>$request->registerUsername,
            "uuid"=>Helper::prefixedUuid("user_"),
            "email"=>$request->registerEmail,
            "password"=>Hash::make($password),
        ];

        wn_user::create($data);
        return redirect("/auth/login");
    }

    public function loginUser(Request $request){

        $credentials = $request->validate([
            'loginEmail' => "required|email",
            'loginPassword' => "required",
        ]);

        $data = [
            "email"=>$request->loginEmail,
            "password"=>$request->loginPassword,
        ];

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect("/");
    }
}
