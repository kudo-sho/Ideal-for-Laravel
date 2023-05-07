<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class UserOperationCtr extends Controller
{
    public function operation(Request $request){
        //リクエストパラメータ"mode"を受け取る
        $mode = $request['mode'];

        //セッション情報を取得する
        $request->session()->get("userInfo");

        //各処理の為に入力されたパラメータを受け取る
        $name = $request['userName'];
        $password = $request['password'];
        $email = $request['mail'];

        //modeにより処理を行う*************************************************
        switch($mode){

            case "登録処理":
                try {
                    //パラメータをセットしてinsertメソッドに渡す
                    $user = new User();
                    $user->setName($name);
                    $user->setPassword($password);
                    $user->setEmail($email);
                    $user = $user->insert($user);
                    
                    //完了メッセージと登録内容を表示しながらログイン画面に遷移
                    $request->merge(['msg' => "新規登録が完了しました。お客様IDは[".$user->getId()."]です"]);
                    return view('userLogin',compact('request'));
                
                } catch (QueryException $e) {
                    if($e->errorInfo[0] == 23000){
                        $request->merge(['msg' => "メールアドレスが既に使用されています。"]);
                    }else{
                        $request->merge(['msg' => "不明なエラーが発生しました。"]);
                    }
                    return view('userInsert',compact('request'));
                }

            
            case "変更処理":
                //パラメータをセットしてupdateメソッドに渡す
                $user = new User();
                $user->setId($request->session()->get('userInfo.id'));
                $user->setName($name);
                $user->setEmail($email); 
                $user = $user->updateUser($user);

                //更新したユーザー情報でセッション情報を取り直す
                $request->session()->put("userInfo",[
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail()
                ]);
                
                //完了メッセージを渡ながらuserIndexを再表示
                $request->merge(['msg' => "登録情報を変更しました"]);
                return view('userIndex',compact('request'));

            case "削除処理":
                //パラメータをセットしてdeleteメソッドに渡す
                $user = new User();
                $user->deleteUser($request->session()->get('userInfo.id'));

                //セッションを破棄する
                $request->session()->forget('userInfo');

                //完了メッセージを渡ながらhomeに遷移
                $request->merge(['msg' => "退会完了致しました。またのご利用お待ちしております。"]);
                return view('home',compact('request'));
        }
    }

}
