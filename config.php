<?php

$conn = new mysqli("localhost", "root", "", "ajaxfilter");
if($conn->connect_error){
    die("Connection Failed" . $conn->connect_error);
}

?>