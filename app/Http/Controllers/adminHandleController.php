<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\wn_category;
use App\Models\wn_sub_category;
use App\Models\wn_user;

class adminHandleController extends Controller
{
    public function storePost()
    {
        dd(csrf_token());
        return;
    }

    public function getSubCategory(Request $request)
    {

        $subCategory = wn_sub_category::select("uuid", "category_uid", "name")->where("category_uid", $request->selectCat)->get();
        return response()->json(["subCategory" => $subCategory]);
    }

    public function editCategory(Request $request)
    {
        $validate = $request->validate([
            "category" => "required",
            "categoryName" => "required",
            "alias" => "required",
            "status" => "required"
        ]);

        $data = [
            "name" => $request->categoryName,
            "alias" => $request->alias,
            "status" => $request->status
        ];

        try {
            wn_category::where("uuid", $request->category)->update($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function editSubCategory(Request $request)
    {
        $validate = $request->validate([
            "subCategory" => "required",
            "subCategoryName" => "required",
            "alias" => "required",
            "category" => "required",
            "status" => "required"
        ]);

        $data = [
            "name" => $request->subCategoryName,
            "alias" => $request->alias,
            "category_uid" => $request->category,
            "status" => $request->status
        ];

        try {
            wn_sub_category::where("uuid", $request->subCategory)->update($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function editUser(Request $request)
    {
        $validate = $request->validate([
            "subCategory" => "required",
            "subCategoryName" => "required",
            "alias" => "required",
            "category" => "required",
            "status" => "required"
        ]);
    }

    public function resetPassword(string $id)
    {
        $user = wn_user::where("uuid", $id)->first();
        $default = Helper::randomPassword();
        $data = [
            "password" => Hash::make($default)
        ];

        try {
            wn_user::where("uuid", $id)->update($data);
            return back()->with(["success" => "success","reset-pass" => $default]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function addProduct(Request $request){
        return;
    }
}
