<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class User extends Model
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

    //ユーザー情報取得処理
    public function getUser($userId) {
        //管理者情報問い合わせ
        $results = DB::select(
            "SELECT * FROM users
            WHERE id = :id",
            ['id' => $userId]
        );
        return $results;
    }

    //ユーザー新規登録処理
    public function insert(User $user){
        //ユーザー情報をusersテーブルにinsert
        $query = DB::insert(
            "INSERT INTO users(name,password,email)
            VALUES(:name,:password,:email)",[
                'name'=>$user->getName(),
                'password'=>$user->getPassword(),
                'email'=>$user->getEmail()
                ]
        );

        //新規登録した顧客IDを取得する
        $results = DB::select(
            "SELECT last_insert_id() as userInfo"
        );

        //顧客IDをセットする
        $user->setId($results[0]->userInfo);
        return $user;
    }

    //ユーザー情報変更
    public static function updateUser(User $user){
        //ユーザー情報をusersテーブルにupdate
        $query = DB::update(
            "UPDATE users SET
            name = :name,email = :email
            WHERE id = :id",[
                'id'=>$user->getId(),
                'name'=>$user->getName(),
                'email'=>$user->getEmail()
                ]
        );
        //パスワードの更新は別のメソッドにて実装予定
        return $user;
    }

    //ユーザー登録削除
    public static function deleteUser(int $userId){
        //引数のidに一致するレコードをusersテーブルから削除
        $query = DB::delete(
            "DELETE FROM users WHERE id = :id",
            ['id'=>$userId]
        );
    }
}
