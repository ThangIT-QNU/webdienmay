<?php
class Category extends Db{
    public function getAllCate(){
        $sql = self::$connection->prepare("SELECT * FROM category");
        return $this->select($sql);
    }
    public function getCateByName($cate_name){
        $sql = self::$connection->prepare("SELECT * FROM category WHERE cate_name='$cate_name'");
        return $this->select($sql);
    }
    public function getCateById($cate_id){
        $sql = self::$connection->prepare("SELECT * FROM category WHERE cate_id='$cate_id'");
        return $this->select($sql);
    }
    public function getCateNameById($cate_id){
        $sql = self::$connection->prepare("SELECT * FROM category WHERE cate_id='$cate_id'");
        $cate = $this->select($sql);
        foreach ($cate as $key => $value) {
            return $value['cate_name'];
        }
    }
}