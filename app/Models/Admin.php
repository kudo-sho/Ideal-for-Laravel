<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Admin extends Model
{
    use HasFactory;

    // フィールド
    private $admId;
    private $admName;
    private $password;
    private $exp;

    //getter
    public function getAdmId(){
        return $this->admId;
    }
    public function getAdmName(){
        return $this->admName;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getExp(){
        return $this->exp;
    }

    // setter
    public function setAdmId($admId){
        $this->admId = $admId;
    }
    public function setAdmName($admName){
        $this->admName = $admName;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setExp($exp){
        $this->exp = $exp;
    }


    // メソッド
    // ログイン処理
    public function login($admName,$password){
        $Admin = null;
        $a = new admin();
        
        //管理者情報問い合わせ
        $results = DB::select(
            "SELECT * FROM admins
            WHERE adm_name = :name
            AND password = :pass",
            ['name'=>$admName,'pass'=>$password]
        );
        if($results != null){
            //問い合わせた管理者情報をadminオブジェクトにセット
            $a->setAdmId($results[0]->adm_id);
            $a->setAdmName($results[0]->adm_name);
            $a->setPassword($results[0]->password);
            $a->setExp($results[0]->exp);
        }else{
            $a = null;
        }
        return $a;
    }

    //管理者リスト取得(管理者情報メンテナンス画面で使用)
    public function getAdminList() {
        //管理者情報問い合わせ
        $results = DB::select(
            "SELECT * FROM admins"
        );
        return $results;
    }

    //管理者新規登録
    public function insert(Admin $adm){
        //管理者情報をadminsテーブルにinsert
        $query = DB::insert(
            "INSERT INTO admins(adm_name,password,exp)
            VALUES(:name,:password,:exp)",[
                'name'=>$adm->getAdmName(),
                'password'=>$adm->getPassword(),
                'exp'=>$adm->getExp()
                ]
        );

        //新規登録した管理者IDを取得する
        $results = DB::select(
            "SELECT last_insert_id() as adminInfo"
        );

        //管理者IDをセットする
        $adm->setAdmId($results[0]->adminInfo);

        return $adm;
    }

    //管理者情報変更
    public static function updateAdm(Admin $adm){
        //管理者情報をadminsテーブルにupdate
        $query = DB::update(
            "UPDATE admins SET
            adm_name = :name,exp = :exp
            WHERE adm_id = :id",[
                'id'=>$adm->getAdmId(),
                'name'=>$adm->getAdmName(),
                'exp'=>$adm->getExp()
                ]
        );
        //パスワードの更新は別のメソッドにて実装予定
        return $adm;
    }

    //管理者情報削除
    public static function deleteAdm(int $admId){
        //引数のadmIdに一致するレコードをadminテーブルから削除
        $query = DB::delete(
            "DELETE FROM admins WHERE adm_id = :id",
            ['id'=>$admId]
        );
    }

}