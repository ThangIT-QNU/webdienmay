<?php 
session_start();
if(isset($_GET['id_product'])){
    $id = $_GET['id_product'];
    unset($_SESSION['cart'][$id]);
    header('location:cart.php');
}
if(isset($_GET['delete'])){
    unset($_SESSION['cart']);
    header('location:cart.php');
}