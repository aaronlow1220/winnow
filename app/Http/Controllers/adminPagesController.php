<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Models\wn_category;
use App\Models\wn_post;
use App\Models\wn_sub_category;

class adminPagesController extends Controller
{
    public function dashboard(Request $request){
        // if(Helper::isAdmin()){
             return view("admin/home");
        // }
        // return redirect("/permission-error");
    }

    public function article_list(Request $request){
        // if(Helper::isAdmin()){
            return view("admin/article");
        // }
        // return redirect("/permission-error");
    }

    public function create_article(Request $request){
        // if(Helper::isAdmin()){
            $category = wn_category::all()->where("status", "ACTIVE");
            return view("admin/create-article", ["categories"=>$category]);
        // }
        // return redirect("/permission-error");
    }
}
