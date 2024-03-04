<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\wn_order;
use App\Models\wn_product;
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
            // $extension = $request->file("cover_pic")->getClientOriginalExtension();
            // $fileName = $uuid . "." . $extension;
            // $cover_pic_name = $fileName;
            // if (file_exists($fileName)) {
            //     unlink($fileName);
            // }

            // $request->file("cover_pic")->move(public_path("media/post"), $fileName);
            $extension = $request->file("cover_pic")->getClientOriginalExtension();

            $path = public_path("media/post/" . $uuid);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileName = $uuid . ".jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("cover_pic"), $path . "/" . $uuid . ".jpg", 50);

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
            "product_images.*" => ["required", File::image()],
            "product_name" => "required",
            "product_price" => "required",
            "delivery_method" => "required",
            "is_halal" => "required",
            "status" => "required",
        ]);

        $uuid = Helper::prefixedUuid("product_");
        $other_pic = $request->file("product_images");

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
            // $fileName = $path . "/" . $uuid . "_cover.jpg";
            $fileName = $uuid . "_cover.jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 50);

            } else {
                $request->file("product_cover")->move($path, $fileName);
            }
        }

        if ($request->hasFile("product_images")) {
            $i = 0;
            foreach ($other_pic as $pic) {
                $extension = $pic->getClientOriginalExtension();
                // $fileName = $path . "/" . $uuid . "_other_" . $i . ".jpg";
                $fileName = $uuid . "_other_" . $i . ".jpg";
                if (file_exists($fileName)) {
                    unlink($fileName);
                }
                if ($extension == "png") {
                    Helper::pngToJpg($request->file("product_cover"), $path . "/" . $uuid . "_cover.jpg", 50);

                } else {
                    $request->file("product_cover")->move($path, $fileName);
                }
                $i++;
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
            $fileName = $request->editor_uuid . ".jpg";
            if (file_exists($path . "/" . $fileName)) {
                unlink($path . "/" . $fileName);
            }
            if ($extension == "png") {
                Helper::pngToJpg($request->file("product_cover"), $path . "/" . $request->editor_uuid . ".jpg", 50);

            } else {
                $request->file("product_cover")->move($path, $fileName);
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
}
