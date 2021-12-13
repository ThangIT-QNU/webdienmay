<?php
class Customer extends Db{
    public function getCustomerByPhone($phone){
        $sql = self::$connection->prepare("SELECT * FROM customer WHERE phone='$phone' ORDER BY id DESC LIMIT 1");
        return $this->select($sql);
    }
    public function getCustomerById($id){
        $sql = self::$connection->prepare("SELECT * FROM customer WHERE id='$id'");
        return $this->select($sql);
    }
    public function getAllCustomer(){
        $sql = self::$connection->prepare("SELECT * FROM customer");
        return $this->select($sql);
    }
}