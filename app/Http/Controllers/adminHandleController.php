<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wn_sub_category;
use Illuminate\Http\Response;

class adminHandleController extends Controller
{
    public function storePost(){
        dd(csrf_token());
        return;
    }

    public function getSubCategory(Request $request){

        $subCategory = wn_sub_category::select("uuid","category_uid", "name")->where("category_uid", $request->selectCat)->get();
        return response()->json(["subCategory"=>$subCategory]);
    }
}
