<?php

$conn = mysqli_connect("localhost", "root", "", "ajaxfilter");

if (!$conn) {
    echo "Connection Failed";
}