<?php

namespace App\Http\Controllers;

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
}
