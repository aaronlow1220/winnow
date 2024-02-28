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
        $items = wn_product::all()->where("status", "PUBLIC");
        return view("shop", ["items" => $items]);
    }

    public function aboutUs(Request $request)
    {
        return view("about-us");
    }

    public function category(Request $request, string $category, ?string $subCategory = null, ?string $article = null)
    {
        // Current category
        $cat = wn_category::where("alias", $category)->where("status", "ACTIVE");
        $subCat = $subCategory;
        $arti = $article;

        // if ($cat->exists()) {
        //     // Sub category
        //     $subCat = wn_sub_category::where("category_uid", $cat->first()->uuid)->where("status", "ACTIVE");
        //     // Preprocessing
        //     if ($subCategory == null) {
        //         if (!$subCat->exists()) {
        //             $latestPost = wn_post::where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC");
        //             if (!$latestPost->exists()) {
        //                 return redirect()->route("post", ["category" => $category]);
        //             }
        //             return redirect()->route("post", ["category" => $category, "article" => $latestPost->first()->uuid]);
        //         }
        //         $latestPost = wn_post::where("sub_category_uid", $subCat->first()->uuid)->where("status", "PUBLIC");
        //         if (!$latestPost->exists()) {
        //             return redirect()->route("post", ["category" => $category, "subCategory" => $subCat->first()->alias]);
        //         }
        //         return redirect()->route("post", ["category" => $category, "subCategory" => $subCat->first()->alias, "article" => $latestPost->first()->uuid]);
        //     }
        // }

        if ($cat->exists()) {
            if ($subCategory === null) {
                $tempSubCat = wn_sub_category::where("category_uid", $cat->first()->uuid)->where("status", "ACTIVE");
                // If category has sub category
                if ($tempSubCat->exists()) {
                    $subCat = $tempSubCat->first()->alias;
                    $tempArti = wn_post::where("sub_category_uid", $tempSubCat->first()->uuid)->where("status", "PUBLIC");
                    if ($tempArti->exists()) {
                        $arti = $tempArti->first()->uuid;
                    }
                } else {
                    $subCat = null;
                    $tempArti = wn_post::where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC");
                    if ($tempArti->exists()) {
                        $arti = $tempArti->first()->uuid;
                    }
                }
            } else {
                $tempSubCat = wn_sub_category::where("category_uid", $cat->first()->uuid)->where("alias", $subCategory)->where("status", "ACTIVE");

                if ($tempSubCat->exists()) {
                    $subCat = $tempSubCat->first()->alias;
                    $tempArti = wn_post::where("sub_category_uid", $tempSubCat->first()->uuid)->where("status", "PUBLIC");
                    if ($tempArti->exists()) {
                        $arti = $tempArti->first()->uuid;
                    }
                } else {
                    $subCat = null;
                    $tempArti = wn_post::where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC");
                    if ($tempArti->exists()) {
                        $arti = $tempArti->first()->uuid;
                    }
                }

            }
            return redirect()->route("post", ["category" => $category, "subCategory" => $subCat, "article" => $arti]);
        }
        // 404
        return;
    }

    public function post(Request $request, ?string $category = null, ?string $subCategory = null, ?string $article = null)
    {
        if ($category) {
            $cat = wn_category::where("alias", $category)->where("status", "ACTIVE");
            $subCat = null;
            $arti = null;
            $otherPosts = null;

            // If it dont have sub category
            if ($subCategory == null) {
                $subCat = null;
                // If article is not exist
                if ($article == null) {
                    $arti = null;
                }
                $arti = wn_post::where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC")->first();
                $otherPosts = wn_post::all()->where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC");
            } else {
                if ($article == null) {
                    $arti = null;
                }
                $subCat = wn_sub_category::all()->where("category_uid", $cat->first()->uuid)->where("status", "ACTIVE");

                $currentSelectedSubCat = $subCat->where("alias", $subCategory);

                $otherPosts = wn_post::all()->where("sub_category_uid", $currentSelectedSubCat->first()->uuid)->where("status", "PUBLIC");

                $arti = $otherPosts->first();
            }
        }

        return view("category", ["category" => $cat->first(), "subCategory" => $subCat, "article" => $arti, "catAlias" => $category, "subCatAlias" => $subCategory, "otherPosts" => $otherPosts]);
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
