<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    //フィールド
    private $menuId;
    private $menuName;
    private $detail;
    private $orderFlg;
    private $price;
    Private $typeId;
    private $typeName;
    

    // getter
	
	public function getMenuId() {
		return $this->menuId;
	}
	public function getMenuName() {
		return $this->menuName;
	}
	public function getDetail() {
		return $this->detail;
	}
	public function getOrderFlg() {
		return $this->orderFlg;
	}
	public function getPrice() {
		return $this->price;
	}
	public function getTypeId() {
		return $this->typeId;
	}
	public function getTypeName() {
		return $this->typeName;
	}

    // setter
	public function setMenuId($menuId) {
		$this->menuId = $menuId;
	}
	public function setMenuName($menuName) {
		$this->menuName = $menuName;
	}
	public function setDetail($detail) {
		$this->detail = $detail;
	}
	public function setOrderFlg($orderFlg) {
		$this->orderFlg = $orderFlg;
	}
	public function setPrice($price) {
		$this->price = $price;
	}
	public function setTypeId($typeId) {
		$this->typeId = $typeId;
	}
	public function setTypeName($typeName) {
		$this->typeName = $typeName;
	}

    //メソッド
    //メニュー情報（一つ）取得
    public function getOneMenu($menuId,$typeId){
        //$menuIdからコースとメニューを判定して処理する
        if($typeId == 100){
            //コースの場合
            $results = DB::select(
                "SELECT * FROM course NATURAL JOIN menutype WHERE c_id = :c_id",
                ['c_id' => $menuId]);
        }else{
            //メニューの場合
            $results = DB::select(
                "SELECT * FROM menu NATURAL JOIN menutype WHERE c_id = :c_id",
                ['c_id' => $menuId]);
        }

        return $results;
    }

    //メニュー情報一覧取得処理
    public function getMenuList(){
        $results = DB::select(
            "SELECT * FROM menu NATURAL JOIN menutype WHERE orderFlg = '1' ORDER BY t_id,m_id");
        
        return $results;
    }

    
}
