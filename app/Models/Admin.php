<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;

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

        //問い合わせた管理者情報をadminオブジェクトにセット
        $a->setAdmId($results[0]->adm_id);
        $a->setAdmName($results[0]->adm_name);
        $a->setPassword($results[0]->password);
        $a->setExp($results[0]->exp);

        if($a->getAdmName() == null){
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
    public static function insert(Admin $adm){
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
}