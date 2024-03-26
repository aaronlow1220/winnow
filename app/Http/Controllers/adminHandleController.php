<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\wn_order;
use App\Models\wn_product;
use App\Models\wn_web_setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        $uuid = Helper::prefixedUuid("post_");
        $cover_pic_name = "";

        if ($request->hasFile("cover_pic")) {
            $extension = $request->file("cover_pic")->getClientOriginalExtension();

            $path = public_path("media/post/" . $uuid);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileName = $uuid . ".jpg";
            $cover_pic_name = $fileName;
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("cover_pic"), $path . "/" . $uuid . ".jpg", 65);

            }elseif($extension == "jpg" || $extension == "jpeg"){
                Helper::compressJpg($request->file("cover_pic"), $path . "/" . $uuid . ".jpg", 65);
            } else {
                $request->file("cover_pic")->move($path, $fileName);
            }
        }

        $data = [
            "uuid" => $uuid,
            "admin_uid" => Auth::user()->uuid,
            "title" => $request->editor_title,
            "category_uid" => $request->editor_category,
            "alias" => $request->editor_alias,
            "sub_category_uid" => $request->editor_sub_category,
            "status" => $request->editor_status,
            "media_location" => $cover_pic_name,
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

    public function addCategory(Request $request)
    {
        $table = "wn_categories";
        $validate = $request->validate([
            "name" => "required|unique:" . $table . ",name",
            "alias" => "required|unique:" . $table . ",alias",
            "status" => "required"
        ]);

        $data = [
            "uuid" => Helper::prefixedUuid("category_"),
            "name" => $request->name,
            "alias" => $request->alias,
            "status" => $request->status
        ];

        try {
            wn_category::create($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
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

    public function addSubCategory(Request $request)
    {
        $table = "wn_sub_categories";
        $validate = $request->validate([
            "category" => "required",
            "name" => "required|unique:" . $table . ",name",
            "alias" => "required|unique:" . $table . ",alias",
            "status" => "required"
        ]);

        $data = [
            "uuid" => Helper::prefixedUuid("subCategory_"),
            "category_uid" => $request->category,
            "name" => $request->name,
            "alias" => $request->alias,
            "status" => $request->status
        ];

        try {
            wn_sub_category::create($data);
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
        $table = "wn_product";

        $validate = $request->validate([
            "product_cover" => ["required", File::image()],
            "product_name" => "required",
            "product_price" => "required",
            "delivery_method" => "required",
            "is_halal" => "required",
            "status" => "required",
        ]);

        $uuid = Helper::prefixedUuid("product_");

        $data = [
            "uuid" => $uuid,
            "name" => $request->product_name,
            "description" => $request->product_description,
            "price" => $request->product_price,
            "discount_price" => $request->product_promo_price,
            "vendor" => $request->product_vendor,
            "allowed_delivery_method" => json_encode($request->delivery_method),
            "is_halal" => $request->is_halal,
            "status" => $request->status,
            "purchase_count" => 0
        ];

        $path = public_path("media/product/" . $uuid);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Save product cover img
        if ($request->hasFile("product_cover")) {
            $extension = $request->file("product_cover")->getClientOriginalExtension();
            $fileName = $uuid . "_cover.jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 65);

            } elseif($extension == "jpg" || $extension == "jpeg"){
                Helper::compressJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 65);
            }else {
                $request->file("product_cover")->move($path, $fileName);
            }
        }
        try {
            wn_product::create($data);
            return back()->with(["success" => "success"]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
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

        $path = public_path("media/product/" . $request->editor_uuid);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if ($request->hasFile("cover_pic")) {
            $extension = $request->file("cover_pic")->getClientOriginalExtension();
            $uuid = $request->editor_uuid;
            $path = public_path("media/post/" . $uuid);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileName = $uuid . ".jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("cover_pic"), $path . "/" . $uuid . ".jpg", 65);

            }elseif($extension == "jpg" || $extension == "jpeg"){
                Helper::compressJpg($request->file("cover_pic"), $path . "/" . $uuid . ".jpg", 65);
            } else {
                $request->file("cover_pic")->move($path, $fileName);
            }
        }

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

    public function updateOrder(Request $request, string $id, string $status)
    {

        $order = wn_order::where("uuid", $id)->get()->first();

        $data = [
            "status" => $status,
        ];

        try {
            $order->update($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function updateSetting(Request $request)
    {
        $data = [
            "content" => $request->setting_edit,
        ];

        $setting = wn_web_setting::where("uuid", $request->setting_id)->get()->first();

        try {
            $setting->update($data);
            return back()->with("success", "success");
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function deletePost(Request $request)
    {
        if (!$request->sSelector) {
            return back();
        }

        $success = 0;
        $failed = 0;

        $selected = $request->sSelector;

        foreach ($selected as $select) {
            try {
                wn_post::where("uuid", $select)->delete();
                $success++;
            } catch (\Illuminate\Database\QueryException $ex) {
                $failed++;
            }
        }

        return back()->with("success", array("success_m" => $success, "failed_m" => $failed));
    }

    public function editProduct(Request $request){
        $table = "wn_product";

        $validate = $request->validate([
            "product_name" => "required",
            "product_price" => "required",
            "delivery_method" => "required",
            "is_halal" => "required",
            "status" => "required",
        ]);

        $uuid = $request->uuid;


        $data = [
            "name" => $request->product_name,
            "description" => $request->product_description,
            "price" => $request->product_price,
            "discount_price" => $request->product_pprice,
            "vendor" => $request->product_vendor,
            "allowed_delivery_method" => json_encode($request->delivery_method),
            "is_halal" => $request->is_halal,
            "status" => $request->status,
        ];

        $path = public_path("media/product/" . $uuid);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Save product cover img
        if ($request->hasFile("product_cover")) {
            $extension = $request->file("product_cover")->getClientOriginalExtension();
            $fileName = $uuid . "_cover.jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 65);

            } elseif($extension == "jpg" || $extension == "jpeg"){
                Helper::compressJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 65);
            }else {
                $request->file("product_cover")->move($path, $fileName);
            }
        }
        try {
            wn_product::where("uuid", $uuid)->get()->first()->update($data);
            return back()->with(["success" => "success"]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with("failed", "failed");
        }
    }

    public function settingsInit(Request $request)
    {
        $settings = wn_web_setting::all();
        if ($settings->isEmpty()) {
            $data = [
                [
                    "uuid" => "ca3f087a9bac9603f57abda0facc8eee",
                    "name" => "匯款帳號",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "7650487a8758fd50c87d6c9cff0aa5ac",
                    "name" => "地址",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "93e781df4729f7677af31122c1253bce",
                    "name" => "版權",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "1f0e60f4efa3d42cb3a383244d8e0d23",
                    "name" => "Facebook 連結",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "5aed058c2aed48a4f05c50b92f17cb46",
                    "name" => "Instagram 連結",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "faf62a02ad04290f7e5c150fc2844ce6",
                    "name" => "YouTube 連結",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "0aa9ce0dd9e62e1adb42101d186e272f",
                    "name" => "電子郵箱地址",
                    "content" => "未設定"
                ],
                [
                    "uuid" => "6f36f29881f4ced824570d8af1a29a5e",
                    "name" => "營業時間",
                    "content" => "未設定"
                ]
            ];

            try {
                wn_web_setting::insert($data);
                return back()->with("success", "success");
            } catch (\Illuminate\Database\QueryException $ex) {
                return back()->with("failed", $ex->getMessage());
            }
        }
        return back()->with("message", "message");
    }
}
