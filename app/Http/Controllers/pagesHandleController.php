<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\wn_order;
use App\Models\wn_order_item;
use App\Models\wn_product;
use App\Models\wn_shopping_cart;
use App\Models\wn_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pagesHandleController extends Controller
{
    public function accountChange(Request $request)
    {
        $user = $request->user_uid;
        $data = [
            "username" => $request->name,
            "phone" => $request->phone,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "contact_address" => $request->contact_address,
            "delivery_address" => $request->delivery_address,
        ];

        try {
            wn_user::where("uuid", $user)->update($data);
            return back()->with("success", "success");
        } catch (\Exception $e) {
            return back()->with("failed", $e->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        $uploaded = 0;
        $error = null;

        $data = [
            "uuid" => Helper::prefixedUuid("cart_"),
            "user_uid" => $request->user_uid,
            "product_uid" => $request->product_uid,
            "quantity" => 1,
            "status" => "ACTIVE",
        ];

        try {
            wn_shopping_cart::create($data);
            $uploaded = 1;
        } catch (\Exception $e) {
            $uploaded = 0;
            $error = $e->getMessage();
        }

        return response()->json([
            "uploaded" => $uploaded,
            "error" => $error,
        ]);
    }

    public function updateCart(Request $request)
    {
        $uploaded = 0;
        $error = null;

        $data = [
            "quantity" => $request->amount,
        ];

        try {
            wn_shopping_cart::all()->where("uuid", $request->id)->first()->update($data);
            $uploaded = 1;
        } catch (\Exception $e) {
            $uploaded = 0;
            $error = $e->getMessage();
        }
        return response()->json([
            "uploaded" => $uploaded,
            "error" => $error,
        ]);
    }

    public function addOrder(Request $request)
    {
        $cart = wn_shopping_cart::where("user_uid", $request->user_uid)->where("status", "ACTIVE")->get();
        $orderUuid = Helper::prefixedUuid("order_");

        if ($cart->count() != 0) {
            $address = "";

            if ($request->delivery_address == "other-address") {
                $address = $request->custom_address;
            } else {
                $address = $request->delivery_address;
            }

            $data = [
                "uuid" => $orderUuid,
                "user_uid"=> $request->user_uid,
                "total" => $request->order_total,
                "delivery_method" => $request->delivery_method,
                "delivery_address" => $address,
                "status" => "NOT_PAID"
            ];

            try {
                wn_order::create($data);
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }

        foreach ($cart as $item) {
            $uuid = Helper::prefixedUuid("orderitem_");

            $data = [
                "uuid" => $uuid,
                "user_uid"=> $request->user_uid,
                "order_uid" => $orderUuid,
                "product_uid" => $item->product_uid,
                "quantity" => $item->quantity,
                "status" => "ACTIVE"
            ];

            $update = [
                "status" => "PROCEEDED"
            ];

            try {
                wn_order_item::create($data);
                wn_shopping_cart::where("uuid", $item->uuid)->get()->first()->update($update);
            } catch (\Exception $e) {
                $e->getMessage();
            }
        }

        return redirect()->route("proceedPayment", ["orderId" => $orderUuid]);
    }

    public function addPaymentAccount(Request $request){
        $updateOrder = $request->uuid;

        $data = [
            "payment_account"=>$request->account_five,
            "status" => "SHIP_PENDING"
        ];

        try {
            wn_order::where("uuid", $updateOrder)->update($data);
            return back()->with("success","success");
        } catch (\Exception $e) {
            $e->getMessage();
            return back()->with("failed","failed");
        }
    }
}
