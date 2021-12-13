<?php
class Comment extends Db{
    public function getAllComment($id){
        $sql = self::$connection->prepare("SELECT * FROM comment WHERE id_products='$id' ORDER BY id DESC");
        return $this->select($sql);
    }
    public function addComment($id,$name,$comment){
        $sql = self::$connection->prepare("INSERT INTO comment(id_products,name,comment) VALUES('$id','$name','$comment')");
        $sql->execute();
    }
}