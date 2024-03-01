<?php

namespace App\Http\Controllers;

use App\Models\wn_category;
use App\Models\wn_post;
use App\Models\wn_product;
use App\Models\wn_shopping_cart;
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
        if (!Auth::check()) {
            return redirect()->route("auth.login");
        }
        $cart_items = wn_shopping_cart::where("user_uid", Auth::user()->uuid)->where("status", "ACTIVE")->orderByDesc("created_at")->get();
        $items = wn_product::where("status", "PUBLIC")->get();
        return view("cart", ["cart_items" => $cart_items, "items" => $items]);
    }

    public function orderList(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route("auth.login");
        }
        return view("order-list");
    }

    public function shop(Request $request)
    {
        $items = wn_product::all()->where("status", "PUBLIC");
        return view("shop", ["items" => $items]);
    }

    public function product(Request $request, string $id)
    {
        $product = wn_product::where("uuid", $id)->first();
        return view("product", ["product" => $product]);
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
        return redirect()->route("404");
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
                $otherPosts = wn_post::where("category_uid", $cat->first()->uuid)->where("status", "PUBLIC")->orderByDesc("created_at")->get();
            } else {
                if ($article == null) {
                    $arti = null;
                }
                $subCat = wn_sub_category::all()->where("category_uid", $cat->first()->uuid)->where("status", "ACTIVE");
                $currentSelectedSubCat = $subCat->where("alias", $subCategory);
                $otherPosts = wn_post::where("sub_category_uid", $currentSelectedSubCat->first()->uuid)->where("status", "PUBLIC")->orderByDesc("created_at")->get();
                $arti = wn_post::where("uuid", $article)->where("status", "PUBLIC")->first();
            }
        }

        return view("category", ["category" => $cat->first(), "subCategory" => $subCat, "article" => $arti, "catAlias" => $category, "subCatAlias" => $subCategory, "otherPosts" => $otherPosts]);
    }

    public function proceedPayment(Request $request){
        return view("redirect-account-code");
    }

    // For testing
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

    public function notFound(Request $request)
    {
        return view("404");
    }

    // Permission Error
    public function permissionError()
    {
        return view("permissionError");
    }
}
