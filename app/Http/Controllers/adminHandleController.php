<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\wn_category;
use App\Models\wn_sub_category;
use App\Models\wn_user;
use App\Models\wn_post;

class adminHandleController extends Controller
{
    public function storePost(Request $request)
    {
        $table = "wn_posts";

        $validate = $request->validate([
            "editor_title" => "required",
            "editor_category" => "required",
            "editor_alias" => "required|unique:" . $table . ",alias",
            "editor_status" => "required",
            "editor_content" => "required"
        ]);

        $data = [
            "uuid" => Helper::prefixedUuid("post_"),
            "admin_uid" => Auth::user()->uuid,
            "title" => $request->editor_title,
            "category_uid" => $request->editor_category,
            "alias" => $request->editor_alias,
            "sub_category_uid" => $request->editor_sub_category,
            "status" => $request->editor_status,
            "hits" => 0,
            "content" => $request->editor_content,
        ];

        try {
            wn_post::create($data);
            return back()->with("success", "success");
        } catch (\Exception $e) {
            return back()->with("failed", $e->getMessage());
        }
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
            return back()->with(["success" => "success", "reset-pass" => $default]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function addProduct(Request $request)
    {
        return;
    }

    public function editPost(Request $request)
    {
        $table = "wn_posts";

        $validate = $request->validate([
            "editor_uuid" => "required",
            "editor_title" => "required",
            "editor_category" => "required",
            "editor_alias" => ["required", Rule::unique($table, "alias")->ignore($request->editor_uuid, "uuid")],
            "editor_status" => "required",
            "editor_content" => "required"
        ]);

        $data = [
            "title" => $request->editor_title,
            "category_uid" => $request->editor_category,
            "alias" => $request->editor_alias,
            "sub_category_uid" => $request->editor_sub_category,
            "status" => $request->editor_status,
            "content" => $request->editor_content,
        ];

        try {
            wn_post::where("uuid", $request->editor_uuid)->update($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }
}