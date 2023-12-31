<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Helper;

class pagesController extends Controller
{
    public function home(Request $request)
    {
        $test = "";
        $isAdmin = "";
        if (Auth::check()) {
            $test = Auth::user()->email;
            $isAdmin = Helper::isAdmin();
            error_log("logged in");
        } else {
            $test = "nope";
            error_log("not login");
        }
        return view("home", [
            "test" => $test,
            "isAdmin" => $isAdmin
        ]);
    }

    public function register(Request $request)
    {
        return view("register");
    }

    public function login(Request $request)
    {
        return view("login");
    }

    public function latestNews(Request $request)
    {
        return view("latestNews");
    }

    public function dishes(Request $request)
    {
        return view("dishes");
    }

    public function attractions(Request $request)
    {
        return view("attractions");
    }

    public function dream(Request $request)
    {
        return view("dream");
    }

    public function foodShop(Request $request)
    {
        return view("foodShop");
    }

    public function aboutUs(Request $request)
    {
        return view("aboutUs");
    }

    public function permissionError()
    {
        return view("permissionError");
    }
}
