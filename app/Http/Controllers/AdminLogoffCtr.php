<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogoffCtr extends Controller
{
    public function index(Request $request){
        $request->session()->forget("adminInfo");
        return view("home");
    }
}
