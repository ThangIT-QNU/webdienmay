<base href="../../">
<?php

require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/product.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id='$id'";
    $db = new Db();
    $db->SIUD($sql);
    header('location:index.php');
}
?>

