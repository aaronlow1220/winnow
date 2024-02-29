<?php

namespace App\Http\Controllers;

use App\Models\wn_order;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Models\wn_category;
use App\Models\wn_post;
use App\Models\wn_product;
use App\Models\wn_sub_category;
use App\Models\wn_web_setting;
use App\Models\wn_user;

class adminPagesController extends Controller
{
    public function redirectForAdmin()
    {
        return redirect("admin/dashboard");
    }

    public function dashboard(Request $request)
    {
        if (Helper::isAdmin()) {
            return view("admin/home");
        }
        return redirect("/permission-error");
    }

    public function article_list(Request $request)
    {
        if (Helper::isAdmin()) {
            $articles = wn_post::all();
            $categories = wn_category::all();
            $sub_categories = wn_sub_category::all();
            $users = wn_user::all()->where("is_admin", 1);
            return view("admin/article", ["articles" => $articles, "categories" => $categories, "sub_categories" => $sub_categories, "users" => $users]);
        }

        return redirect("/permission-error");
    }

    public function create_article(Request $request)
    {
        if (Helper::isAdmin()) {
            $category = wn_category::all()->where("status", "ACTIVE");
            return view("admin/create-article", ["categories" => $category]);
        }
        return redirect("/permission-error");
    }

    public function editPost(Request $request, $id)
    {
        if (Helper::isAdmin()) {
            $post = wn_post::where("uuid", $id)->first();
            $categories = wn_category::all()->where("status", "ACTIVE");
            $sub_categories = wn_sub_category::all()->where("status", "ACTIVE");
            return view("admin/edit-article", ["post" => $post, "categories" => $categories, "sub_categories" => $sub_categories]);
        }
        return redirect("/permission-error");
    }

    public function category(Request $request)
    {
        if (Helper::isAdmin()) {
            $category = wn_category::all();
            return view("admin/category", ["categories" => $category]);
        }
        return redirect("/permission-error");
    }

    public function addCategory(Request $request)
    {
        if (Helper::isAdmin()) {
            return view("admin/add-category");
        }
        return redirect("/permission-error");
    }

    public function editCategory(string $id)
    {
        if (Helper::isAdmin()) {
            $category = wn_category::where("uuid", $id)->first();
            return view("admin/edit-category", ["categories" => $category]);
        }
        return redirect("/permission-error");
    }

    public function subCategory(Request $request)
    {
        // if(Helper::isAdmin()){
        $subCategory = wn_sub_category::all();
        $category = wn_category::all();
        return view(
            "admin/subcategory",
            [
                "subCategories" => $subCategory,
                "categories" => $category
            ]
        );
        // }
        // return redirect("/permission-error");
    }

    public function addSubCategory(Request $request)
    {
        if (Helper::isAdmin()) {
            $category = wn_category::all()->where("status", "ACTIVE");
            return view("admin/add-sub-category", ["categories" => $category]);
        }
        return redirect("/permission-error");
    }

    public function editSubCategory(string $id)
    {
        // if(Helper::isAdmin()){
        $subCategory = wn_sub_category::where("uuid", $id)->first();
        $category = wn_category::all();
        return view("admin/edit-sub-category", [
            "subCategories" => $subCategory,
            "categories" => $category
        ]);
        // }
        // return redirect("/permission-error");
    }

    public function product(Request $request)
    {
        $product = wn_product::all()->where("status", "PUBLIC");
        return view("admin/product", ["products" => $product]);
    }

    public function addProduct(Request $request)
    {
        return view("admin/add-product");
    }

    public function settings(Request $request)
    {
        if (Helper::isAdmin()) {
            $settings = wn_web_setting::all();
            return view("admin/settings", ["settings" => $settings]);
        }
        return redirect("/permission-error");
    }

    public function moderator(Request $request)
    {
        if (Helper::isAdmin()) {
            $moderators = wn_user::all()->where("is_admin", 1);
            return view("admin/moderator", ["moderators" => $moderators]);
        }
        return redirect("/permission-error");
    }

    public function user(Request $request)
    {
        if (Helper::isAdmin()) {
            $users = wn_user::all()->where("is_admin", 0);
            return view("admin/user", ["users" => $users]);
        }
        return redirect("/permission-error");
    }

    public function editUser(string $id)
    {

        if (Helper::isAdmin()) {
            $users = wn_user::where("uuid", $id)->first();
            return view("admin/edit-user", ["users" => $users]);
        }
        return redirect("/permission-error");
    }

    public function orderList(Request $request, string $status)
    {
        $order = null;
        $title = null;
        if (Helper::isAdmin()) {
            switch ($status) {
                case "all":
                    $order = wn_order::where("status", "!=", "COMPLETED")->orderByDesc("modified_at")->get();
                    $title = "全部";
                    break;
                case "not-paid":
                    $order = 2;
                    $title = "未付款";
                    break;
                case "ship-pending":
                    $order = 3;
                    $title = "待出貨";
                    break;
                case "shipped":
                    $order = 4;
                    $title = "已送出";
                    break;
                case "canceled":
                    $order = 5;
                    $title = "不成立";
                    break;
                case "refund":
                    $order = 6;
                    $title = "退貨/退款";
                    break;
                default:
                    $order = null;
                    $title = "查無此頁";
                    break;
            }
            return view("admin/order-list", ["order" => $order, "title"=> $title]);
        }
    }
}