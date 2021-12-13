<?php 
class Mamufactures extends Db{
    public function getAllManu(){
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        return $this->select($sql);
    }
    public function getManuByName($manu_name){
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_name='$manu_name'");
        return $this->select($sql);
    }
    public function getManuById($manu_id){
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id='$manu_id'");
        return $this->select($sql);
    }
    public function updateManufacture(){
        $sql = self::$connection->prepare("SELECT * FROM ");
    }
    public function getManuNameById($id){
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id='$id'");
        $manu = $this->select($sql);
        foreach ($manu as $key => $value) {
            return $value['manu_name'];
        }
    }
}