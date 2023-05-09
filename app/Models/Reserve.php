<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Reserve extends Model
{
    use HasFactory;
    //フィールド
    private $rsvId; //予約ID
    private $usrId; //顧客ID
    private$usrName;//顧客名
    private $rsvYy;//予約_年
    private $rsvMm;//予約_月
    private $rsvDd;//予約_日
    private $rsvHh;//予約_時
    private $rsvMi;//予約_分
    private $person;//人数
    private $tableId;//テーブルID
    private$tableName;//テーブル名
    private $courseId;//コースID
    private$courseName;//コース名
    private$appDate;//登録日時
    private $appYy;//登録_年
    private $appMm;//登録_月
    private $appDd;//登録_日
    private $appHh;//登録_時
    private $appMi;//登録_分
        // getter
    public function getRsvId() {
    	return $this->rsvId;
    }
    public function getUsrId() {
    	return $this->usrId;
    }
    public function getUsrName() {
    	return $this->usrName;
    }
    public function getRsvYy() {
    	return $this->rsvYy;
    }
    public function getRsvMm() {
    	return $this->rsvMm;
    }
    public function getRsvDd() {
    	return $this->rsvDd;
    }
    public function getRsvHh() {
    	return $this->rsvHh;
    }
    public function getRsvMi() {
    	return $this->rsvMi;
    }
    public function getPerson() {
    	return $this->person;
    }
    public function getTableId() {
    	return $this->tableId;
    }
    public function getTableName() {
    	return $this->tableName;
    }
    public function getCourseId() {
    	return $this->courseId;
    }
    public function getCourseName() {
    	return $this->courseName;
    }
    public function getAppDate() {
    	return $this->appDate;
    }
    public function getAppYy() {
    	return $this->appYy;
    }
    public function getAppMm() {
    	return $this->appMm;
    }
    public function getAppDd() {
    	return $this->appDd;
    }
    public function getAppHh() {
    	return $this->appHh;
    }
    public function getAppMi() {
    	return $this->appMi;
    }
        // setter
    
    public function setRsvId($rsvId) {
        $this->rsvId = $rsvId;
    	return $this;
    }
    
    public function setUsrId($usrId) {
        $this->usrId = $usrId;
    	return $this;
    }
    
    public function setUsrName($usrName) {
        $this->usrName = $usrName;
    	return $this;
    }
    
    public function setRsvYy($rsvYy) {
        $this->rsvYy = $rsvYy;
    	return $this;
    }
    
    public function setRsvMm($rsvMm) {
        $this->rsvMm = $rsvMm;
    	return $this;
    }
    
    public function setRsvDd($rsvDd) {
        $this->rsvDd = $rsvDd;
    	return $this;
    }
    
    public function setRsvHh($rsvHh) {
        $this->rsvHh = $rsvHh;
    	return $this;
    }
    
    public function setRsvMi($rsvMi) {
        $this->rsvMi = $rsvMi;
    	return $this;
    }
    
    public function setPerson($person) {
        $this->person = $person;
    	return $this;
    }
    
    public function setTableId($tableId) {
        $this->tableId = $tableId;
    	return $this;
    }
    
    public function setTableName($tableName) {
        $this->tableName = $tableName;
    	return $this;
    }
    
    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    	return $this;
    }
    
    public function setCourseName($courseName) {
        $this->courseName = $courseName;
    	return $this;
    }
    
    public function setAppDate($appDate) {
        $this->appDate = $appDate;
    	return $this;
    }
    
    public function setAppYy($appYy) {
        $this->appYy = $appYy;
    	return $this;
    }
    
    public function setAppMm($appMm) {
        $this->appMm = $appMm;
    	return $this;
    }
    
    public function setAppDd($appDd) {
        $this->appDd = $appDd;
    	return $this;
    }
    
    public function setAppHh($appHh) {
        $this->appHh = $appHh;
    	return $this;
    }
    
    public function setAppMi($appMi) {
        $this->appMi = $appMi;
    	return $this;
    }

    //メソッド

    //予約情報一覧取得処理
    public function getReserveList($userId){
        $results = DB::select(
            "SELECT * FROM reserve INNER JOIN user USING(usr_id)
            INNER JOIN table_loc USING(table_id) INNER JOIN course USING(c_id)
            WHERE usr_id = :userId  and rsv_date >= CURRENT_DATE()  ORDER BY rsv_date",
            ['userId' => $userId]
        );

        return $results;
    }
}