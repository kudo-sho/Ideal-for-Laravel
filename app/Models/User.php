<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasFactory;

    // フィールド
    private $id;
    private $name;
    private $password;
    private $email;

    // getter
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }

    // setter
    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    // メソッド
    // ログイン処理
    public function login($id,$password){
        $user = new User();
        
        //ユーザー情報問い合わせ
        $results = DB::select(
            "SELECT * FROM users
            WHERE id = :id
            AND password = :pass",
            ['id'=>$id,'pass'=>$password]
        );
        if($results != null){
            //問い合わせた管理者情報をadminオブジェクトにセット
            $user->setId($results[0]->id);
            $user->setName($results[0]->name);
            $user->setPassword($results[0]->password);
            $user->setEmail($results[0]->email);
        }else{
            $user = null;
        }
        return $user;
    }
}
