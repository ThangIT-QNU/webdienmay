<?php
class User extends Db{
    public function getUserByUsername($username){
        $sql = self::$connection->prepare("SELECT * FROM user WHERE username='$username'");
        // $sql->bind_param('s',$username);
        return $this->select($sql);
    }
    public function getUserById($id){
        $sql = self::$connection->prepare("SELECT * FROM user WHERE id='$id'");
        return $this->select($sql);
    }
    public function getAllUser(){
        $sql = self::$connection->prepare("SELECT * FROM user");
        return $this->select($sql);
    }
    public function getUserIdByUserName($username){
        $sql = self::$connection->prepare("SELECT * FROM user WHERE username='$username'");
        $user = $this->select($sql);
        foreach ($user as $key => $value) {
            return $value['id'];
        }
    }
}