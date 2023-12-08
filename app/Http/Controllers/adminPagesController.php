<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminPagesController extends Controller
{
    public function dashboard(Request $request){
        return view("admin/dashboard");
    }
}
