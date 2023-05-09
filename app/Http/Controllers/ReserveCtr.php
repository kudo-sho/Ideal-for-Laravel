<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveCtr extends Controller
{
    public function reserveList (Request $request){
        //セッション情報からIDを取得する
        $userId = session()->get('userInfo.id');

        //userIdをキーにreserveテーブルから予約情報を取得する
        $reserve = new Reserve();
        $results = $reserve->getReserveList($userId);

        return view('reserve',compact('results'));

    }
}
