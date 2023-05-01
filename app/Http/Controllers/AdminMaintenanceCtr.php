<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminMaintenanceCtr extends Controller
{
    public function index(Request $request){
        //adminリストを取得してリクエストにセットする
        $a = new Admin();
        $adm_list = $a->getAdminList();
        return view("adminMaintenance",compact('adm_list'));
    }
}

