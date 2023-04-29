<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminLoginCtr extends Controller
{
    public function index(Request $request){
        $adm = new Admin();
        $adm = $adm->login($request['admName'],$request['password']);

        if($adm != null){
            printf("ログインしました");
            //セッション確立処理を記述すること
            return view('adminIndex');
        }else{
            printf("ログイン失敗しました。");
            return view("adminLogin");
        }

    }

}
