<?php
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/user.php';

$id = $_GET['id'];
$query = "DELETE FROM user WHERE id ='$id'";
$db = new Db();
$db->SIUD($query);
header('location:index.php');