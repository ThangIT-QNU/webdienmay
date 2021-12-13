<?php
class Bill extends Db{
    public function getAllBill(){
        $sql = self::$connection->prepare("SELECT * FROM bill ORDER BY id_bill DESC");
        return $this->select($sql);
    }
    public function getBillById($id){
        $sql = self::$connection->prepare("SELECT * FROM bill WHERE id_bill='$id'");
        return $this->select($sql);
    }
}