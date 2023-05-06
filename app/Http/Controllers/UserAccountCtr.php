<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAccountCtr extends Controller
{
    public function login(Request $request){
        $user = new User();
        $user = $user->login($request['usrId'],$request['password']);

        if($user != null){
            printf("ログインしました");
            
            $request->session()->put("userInfo",[
                'id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail()
            ]);
            return view('userIndex');
        }else{
            printf("ログイン失敗しました。");
            return view('userLogin');
        }
    }

    public function logoff(Request $request){
        $request->session()->forget("userInfo");
        return view("home");
    }
}
