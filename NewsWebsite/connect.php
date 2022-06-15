<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dzod";
$conn = mysqli_connect($servername,$username,$password,$database) or die("không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");
?>