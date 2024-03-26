<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\Helper;

class adminImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile("upload")) {
            $originalName = $request->file("upload")->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file("upload")->getClientOriginalExtension();
            $fileName = $fileName . "_" . time();
            $tempEx = "";

            if ($extension == "png") {
                Helper::pngToJpg($request->file("upload"), public_path("media/post") . "/" . $fileName . ".jpg", 65);
                $tempEx = "jpg";

            } elseif ($extension == "jpg" || $extension == "jpeg") {
                Helper::compressJpg($request->file("upload"), public_path("media/post") . "/" . $fileName . ".jpg", 65);
                $tempEx = "jpg";
            } else {
                $request->file("upload")->move(public_path("media/post"), $fileName . "." . $extension);
                $tempEx = $extension;
            }
            $url = asset("media/post/" . $fileName . "." . $tempEx);
            return response()->json([
                "fileName" => $fileName,
                "uploaded" => 1,
                "url" => $url
            ]);
        }
    }
}
