<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    use HasFactory;

    //フィールド
    private $courseId;
    private $courseName;
    private $detail;
    private $orderFlg;
    private $price;
    private $typeName;
    private $menuId;
    private $menuName;

    private $COUSE_MENU_TYPE_ID =[
        200,210,220,
        300,310,
        400
    ];

    // getter
    public function getCourseId(){
        return $this->courseId;
    }
    public function getCourseName(){
        return $this->courseName;
    }
    public function getDeteal(){
        return $this->detail;
    }
    public function getOrderFlg(){
        return $this->orderFlg;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getTypeName(){
        return $this->typeName;
    }
    public function getMenuId(){
        return $this->menuId;
    }
    public function getMenuName(){
        return $this->menuName;
    }
    public function getCOUSE_MENU_TYPE_ID(){
        return $this->COUSE_MENU_TYPE_ID;
    }

    // setter
	public function setCourseId($courseId){
		$this->courseId = $courseId;
	}
	public function setCourseName($courseName) {
		$this->courseName = $courseName;
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
	public function setMenuId($menuId) {
		$this->menuId = $menuId;	
	}
	public function setMenuName($menuName) {
		$this->menuName = $menuName;
	}
	public function setCOUSE_MENU_TYPE_ID($COUSE_MENU_TYPE_ID){
		$this->COUSE_MENU_TYPE_ID = $COUSE_MENU_TYPE_ID;
	}

    //メソッド
    //コース情報取得処理
    public function getCourse($c_id){
        $results = DB::select(
            "SELECT * FROM course
            WHERE c_id = :c_id",
            ['c_id' => $c_id]
        );

        return $results;
    }

    public function getOneCourse($c_id){
        $results = DB::select(
            "SELECT * FROM course
            inner join coursectl using(c_id)
            inner join menu using(m_id)
            where c_id = :c_id",
            ['c_id' => $c_id]
        );

        return $results;
    }

    public function getCourseList(){
        $results = DB::select(
            "SELECT * FROM course
            inner join coursectl useng(c_id)
            inner join menu using(m_id)"
        );

        return $results;
    }
    //不要メソッド？？　getTypeCourseList

    public function updateCourse($c,$mode,$courseCtl){

    }
}
