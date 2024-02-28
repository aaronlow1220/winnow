<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
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
        ;
    }
}
