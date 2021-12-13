<?php

require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM category WHERE cate_id='$id'";
    $db = new Db();
    $delete = $db->SIUD($sql);
    header('location:index.php');
}
?>