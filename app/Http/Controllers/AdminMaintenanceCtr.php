<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class AdminMaintenanceCtr extends Controller
{
    public function showAdminList(Request $request){
        //adminリストを取得してリクエストにセットする
        $adm_list = (new Admin())->getAdminList();
        return view("adminMaintenance",compact('adm_list','request'));
    }

    public function operation(Request $request){
        //リクエストパラメータ"mode"を受け取る
        $mode = $request['mode'];

        //セッション情報を取得する
        $request->session()->get("adminInfo");

        //各処理の為に入力されたパラメータを受け取る
        $adm_name = $request['admName'];
        $password = $request['password'];
        $exp = $request['exp'];

        //modeにより処理を行う*************************************************
        $adm = new Admin();
        switch($mode){
            
            case "登録処理":
                //パラメータをセットしてinsertメソッドに渡す
                $adm->setAdmName($adm_name);
                $adm->setPassword($password);
                $adm->setExp($exp);
                $adm = $adm->insert($adm);
                
                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "管理者を新規登録しました"]);
                return $this->showAdminList($request);
            
            case "変更処理":
                //パラメータをセットしてupdateメソッドに渡す
                $adm->setAdmId($request['admId']);
                $adm->setAdmName($request['admName']);
                $adm->setExp($request['admExp']); 
                $adm = $adm->updateAdm($adm);
                
                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "管理者情報を変更しました"]);
                return $this->showAdminList($request);

            case "削除処理":
                //パラメータをセットしてdeleteメソッドに渡す
                $adm->deleteAdm($request['admId']);

                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "管理者情報を削除しました。"]);
                return $this->showAdminList($request);
        }
    }
}

