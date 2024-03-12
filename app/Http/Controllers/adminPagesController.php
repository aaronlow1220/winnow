<?php

namespace App\Http\Controllers;

use App\Models\wn_order;
use App\Models\wn_order_item;
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
        if (!Helper::isAdmin()) {

            return redirect("/permission-error");
        }
        $posts = wn_post::where("status", "PUBLIC")->orderByDesc("hits")->take(3)->get();
        $cat = wn_category::where("status", "ACTIVE")->get();
        $products = wn_product::where("status", "PUBLIC")->orderByDesc("purchase_count")->take(3)->get();
        return view("admin/home", ["posts" => $posts, "products" => $products, "cat" => $cat]);
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
        $users = wn_user::where("status", "ACTIVE")->get();
        $orders = null;
        $title = null;
        if (Helper::isAdmin()) {
            switch ($status) {
                case "all":
                    $orders = wn_order::where("status", "!=", "COMPLETED")->orderByDesc("modified_at")->get();
                    $title = "全部";
                    break;
                case "not-paid":
                    $orders = wn_order::where("status", "NOT_PAID")->orderByDesc("modified_at")->get();
                    $title = "未付款";
                    break;
                case "ship-pending":
                    $orders = wn_order::where("status", "SHIP_PENDING")->orderByDesc("modified_at")->get();
                    $title = "待出貨";
                    break;
                case "shipped":
                    $orders = wn_order::where("status", "SHIPPED")->orderByDesc("modified_at")->get();
                    $title = "已送出";
                    break;
                case "canceled":
                    $orders = wn_order::where("status", "CANCELED")->orderByDesc("modified_at")->get();
                    $title = "不成立";
                    break;
                case "refund":
                    $orders = wn_order::where("status", "REFUND")->orderByDesc("modified_at")->get();
                    $title = "退貨/退款";
                    break;
                default:
                    $orders = null;
                    $title = "查無此頁";
                    break;
            }
            return view("admin/order-list", ["orders" => $orders, "title" => $title, "users" => $users]);
        }
    }

    public function order(Request $request, string $id)
    {
        $order = wn_order::where("uuid", $id)->get()->first();
        $user = wn_user::where("uuid", $order->user_uid)->get()->first();
        $orderItems = wn_order_item::where("order_uid", $id)->get();
        $products = wn_product::where("status", "PUBLIC")->get();
        return view("admin/order", ["order" => $order, "user" => $user, "products" => $products, "orderItems" => $orderItems]);
    }

    public function editSetting(Request $request, string $id)
    {
        $setting = wn_web_setting::where("uuid", $id)->get()->first();
        return view("admin/setting-edit", ["id" => $id, "setting" => $setting]);
    }
}