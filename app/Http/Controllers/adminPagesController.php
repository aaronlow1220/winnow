<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Helper;

class adminPagesController extends Controller
{
    public function dashboard(Request $request){
        if(Helper::isAdmin()){
            return view("admin/home");
        }
        return redirect("/permission-error");
    }

    public function latest_news_list(Request $request){
        if(Helper::isAdmin()){
            return view("admin/latest-news-list");
        }
        return redirect("/permission-error");
    }
}
