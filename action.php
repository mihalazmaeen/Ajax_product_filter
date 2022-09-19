<?php
require 'config.php';
if(isset($_POST['action'])){
    $sql = "select * from products where brand !='' ";
    if(isset($_POST['brand'])){
        $brand = implode("','",$_POST['brand']);
        $sql .= "AND brand IN ('" . $brand . "')";
    }
}



?>