<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Helper;

class adminPagesController extends Controller
{
    public function dashboard(Request $request){
        if(Helper::isAdmin()){
            return view("admin/dashboard");
        }
        return redirect("/permission-error");
    }

    public function article(Request $request){
        if(Helper::isAdmin()){
            return view("admin/article");
        }
        return redirect("/permission-error");
    }
}
