<?php
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
    $id = $_GET['id'];
    $sql = "UPDATE bill SET status=1 WHERE id_bill='$id'";
    $db= new Db();
    $db->SIUD($sql);
    header('location:index.php');
