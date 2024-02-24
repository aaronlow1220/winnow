<?php

namespace App\Http\Controllers;

use App\Models\wn_category;
use App\Models\wn_post;
use App\Models\wn_product;
use App\Models\wn_sub_category;
use App\Models\wn_user;
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

    public function account(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route("auth.login");
        }

        return view("account", ["users" => Auth::user()]);
    }

    public function cart(Request $request)
    {
        return view("cart");
    }

    public function shop(Request $request)
    {
        wn_product::all()->where("status", "ACTIVE");
        return view("shop");
    }

    public function aboutUs(Request $request)
    {
        return view("about-us");
    }

    public function category(Request $request, string $category, ?string $subCategory = null, ?string $article = null)
    {
        if ($category) {
            // Get category info
            $cat = wn_category::where("alias", $category)->first();
            $subCat = wn_sub_category::all()->where("category_uid", $cat->uuid);
            $arti = wn_post::all()->where("category_uid", $cat->uuid)->where("status", "PUBLIC")->first();

            $no_subCat = wn_sub_category::all()->where("category_uid", $cat->uuid)->where("status", "ACTIVE");
            if($no_subCat->isEmpty()) {
                
            }
            
            if (!$subCategory) {
                if (!$subCat->isEmpty()) {
                    $firstCat = $subCat->first();
                    $firstPost = wn_post::all()->where("category_uid", $cat->uuid)->where("sub_category_uid", $firstCat->uuid)->where("status", "PUBLIC");
                    if (!$firstPost->isEmpty()) {
                        return redirect()->route("category", ["category" => $category, "subCategory" => $firstCat->alias, "article" => $firstPost->first()->uuid]);
                    }
                    return redirect()->route("category", ["category" => $category, "subCategory" => $firstCat->alias]);
                }
            }
            if (!$article) {
                $selectedSubCat = wn_sub_category::where("alias", $subCategory)->where("status", "ACTIVE")->first();
                $firstArti = wn_post::all()->where("sub_category_uid", $selectedSubCat->uuid)->where("status", "PUBLIC");
                if (!$firstArti->isEmpty()) {
                    return redirect()->route("category", ["category" => $category, "subCategory" => $subCategory, "article" => $firstArti->first()->uuid]);
                }
            }
            $arti = wn_post::all()->where("uuid", $article)->first();

            return view("category", ["category" => $cat, "subCategory" => $subCat, "article" => $arti , "subCatAlias"=>$subCategory]);
        }
    }

    // For testing
    public function testUpload(Request $request)
    {
        return view("test/testUpload");
    }

    public function testUploadHandle(Request $request)
    {
        $table = "wn_posts";

        return;
    }

    public function testCategory(Request $request)
    {
        return view("test/testCategory");
    }

    public function testCategoryHandle(Request $request)
    {
        $table = "wn_categories";
        $validate = $request->validate([
            "categoryName" => "required|unique:" . $table . ",name",
            "alias" => "required|unique:" . $table . ",alias"
        ]);

        $data = [
            "uuid" => Helper::prefixedUuid("category_"),
            "name" => $request->categoryName,
            "alias" => $request->alias
        ];
        wn_category::create($data);
        return redirect("testCategory");
    }

    public function testSubCategory(Request $request)
    {
        $category = wn_category::all()->where("status", "ACTIVE");
        return view("test/testSubCategory", ["categories" => $category]);
    }

    public function testSubCategoryHandle(Request $request)
    {
        $table = "wn_sub_categories";
        $validate = $request->validate([
            "categoryUid" => "required",
            "subCategoryName" => "required|unique:" . $table . ",name",
            "alias" => "required|unique:" . $table . ",alias"
        ]);

        $data = [
            "uuid" => Helper::prefixedUuid("subCategory_"),
            "category_uid" => $request->categoryUid,
            "name" => $request->subCategoryName,
            "alias" => $request->alias
        ];
        wn_sub_category::create($data);
        return redirect("testSubCategory");
    }

    // 404
    public function permissionError()
    {
        return view("permissionError");
    }
}
