<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserOperationCtr extends Controller
{
    public function operation(Request $request){
        //リクエストパラメータ"mode"を受け取る
        $mode = $request['mode'];

        //セッション情報を取得する
        $request->session()->get("userInfo");

        //各処理の為に入力されたパラメータを受け取る
        $name = $request['name'];
        $password = $request['password'];
        $email = $request['email'];

        //modeにより処理を行う*************************************************
        switch($mode){

            case "登録処理":
                //パラメータをセットしてinsertメソッドに渡す
                $user = new User();
                $user->setName($name);
                $user->setPassword($password);
                $user->setEmail($email);
                $user = $user->insert($user);
                
                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "新規登録が完了しました"]);
                return $this->showUserList($request);
            
            case "変更処理":
                //パラメータをセットしてupdateメソッドに渡す
                $user = new User();
                $user->setId($request['id']);
                $user->setName($request['name']);
                $user->setEmail($request['email']); 
                $user = $user->updateUser($user);
                
                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "登録情報を変更しました"]);
                //return $this->showUserList($request);

            case "削除処理":
                //パラメータをセットしてdeleteメソッドに渡す
                $user = new User();
                $user->deleteUser($request['admId']);

                //完了メッセージを渡ながらadimnListを再表示
                $request->merge(['msg' => "管理者情報を削除しました。"]);
                return $this->showUserList($request);
        }
    }

}
