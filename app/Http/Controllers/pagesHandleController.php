<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Models\wn_order;
use App\Models\wn_product;
use App\Models\wn_shopping_cart;
use App\Models\wn_user;
use Illuminate\Http\Request;

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

    public function addOrder(Request $request, string $user){
        $cart = wn_shopping_cart::where("user_uid", $user)->where("status", "ACTIVE")->get();
        $product = wn_product::where("status", "PUBLIC")->get();
        if ($cart->count() != 0) {
            $uuid = Helper::prefixedUuid("order_");
            $totalPrice = 0;
            foreach ($cart as $item) {
                $currentProduct = $product->where("uuid", $item->product_id)->first();
                if($currentProduct->discount_price){
                    $totalPrice += $currentProduct->discount_price * $item->quantity;
                }else{
                    $totalPrice += $currentProduct->price * $item->quantity;
                }
            }

            $data=[
                "uuid"=>$uuid,
                "total"=>$totalPrice,
                "delivery_method"=>$cart->count(),
            ];
        }

        foreach ($cart as $item) {
            $uuid = Helper::prefixedUuid("orderitem_");
            $data = [

            ];
        }

        return;
    }
}
