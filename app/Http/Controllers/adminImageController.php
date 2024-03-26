<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile("upload")) {
            $originalName = $request->file("upload")->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extension = $request->file("upload")->getClientOriginalExtension();
            $fileName = $fileName . "_" . time() . "." . $extension;
            $request->file("upload")->move(public_path("media/post"), $fileName);
            $url = asset("media/post/" . $fileName);
            return response()->json([
                "fileName" => $fileName,
                "uploaded" => 1,
                "url" => $url
            ]);
        }
    }
}
