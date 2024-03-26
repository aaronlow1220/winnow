<?php

namespace App\Http\Controllers;

use App\Models\wn_category;
use App\Models\wn_order;
use App\Models\wn_order_item;
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
        $categories = wn_category::where("status", "ACTIVE")->get();
        $latest_news = wn_post::where("status", "PUBLIC")->where("category_uid", $categories->where("alias", "latest-news")->first()->uuid)->orderByDesc("created_at")->take(4)->get();
        $dishes = wn_post::where("status", "PUBLIC")->where("category_uid", $categories->where("alias", "dishes")->first()->uuid)->orderByDesc("created_at")->take(6)->get();
        $dream = wn_post::where("status", "PUBLIC")->where("category_uid", $categories->where("alias", "dreams")->first()->uuid)->get()->first();
        $attractions = wn_post::where("status", "PUBLIC")->where("category_uid", $categories->where("alias", "attractions")->first()->uuid)->orderByDesc("created_at")->take(3)->get();
        $subCat = wn_sub_category::where("status", "ACTIVE")->get();
        return view("home", [
            "latest_news" => $latest_news,
            "dishes" => $dishes,
            "dream" => $dream,
            "attractions" => $attractions,
            "categories" => $categories,
            "subCat" => $subCat
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
        $user = wn_user::where("uuid", Auth::user()->uuid)->get()->first();

        return view("cart", ["cart_items" => $cart_items, "items" => $items, "user" => $user]);
    }

    public function orderList(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route("auth.login");
        }

        $orders = wn_order::where("user_uid", Auth::user()->uuid)->orderByDesc("created_at")->get();
        $products = wn_product::where("status", "PUBLIC")->get();
        $orderItems = wn_order_item::where("user_uid", Auth::user()->uuid)->get();

        return view("order-list", ["orders" => $orders, "products" => $products, "orderItems" => $orderItems]);
    }

    public function shop(Request $request)
    {
        $items = wn_product::all()->where("status", "PUBLIC");
        return view("shop", ["items" => $items]);
    }

    public function product(Request $request, string $id)
    {
        $product = wn_product::where("uuid", $id)->first();
        $items = wn_product::all()->where("status", "PUBLIC");
        return view("product", ["product" => $product, "items" => $items]);
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
            if($category == "latest-news" && $subCategory == "all"){
                $forNew = wn_category::where("alias", "latest-news")->get()->first();
                $arti = wn_post::where("category_uid", $forNew->uuid)->where("status", "PUBLIC")->get()->first()->uuid;
                return redirect()->route("post", ["category" => $category, "subCategory" => $subCat, "article" => $arti]);
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

        if($category == "latest-news" && $subCategory == "all"){
            $forNew = wn_category::where("alias", "latest-news")->get()->first();
            $newOther = wn_post::where("category_uid", $forNew->uuid)->where("status", "PUBLIC")->orderByDesc("created_at")->get();
            $arti = wn_post::where("category_uid", $forNew->uuid)->where("status", "PUBLIC")->get()->first();
            return view("category", ["category" => $cat->first(), "subCategory" => $subCat, "article" => $arti, "catAlias" => $category, "subCatAlias" => $subCategory, "otherPosts" => $newOther]);
        }

        return view("category", ["category" => $cat->first(), "subCategory" => $subCat, "article" => $arti, "catAlias" => $category, "subCatAlias" => $subCategory, "otherPosts" => $otherPosts]);
    }

    public function mpost(Request $request, string $category, ?string $subCategory, ?string $article)
    {
        $cat = wn_category::where("alias", $category)->where("status", "ACTIVE")->get()->first();
        $subCat = wn_sub_category::where("alias", $subCategory)->where("status", "ACTIVE");
        $posts = wn_post::where("sub_category_uid", $subCat->get()->first()->uuid)->where("status", "PUBLIC")->get();
        $arti = wn_post::where("uuid", $article)->where("status", "PUBLIC")->get()->first();

        // dd($arti);

        return view("m_category", ["category" => $cat, "subCategory" => $subCat, "article" => $arti, "otherPosts" => $posts, "catAlias" => $category, "subCatAlias" => $subCategory]);
    }

    public function proceedPayment(Request $request)
    {
        return view("redirect-account-code");
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
