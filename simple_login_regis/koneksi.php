<?php
$host = 'localhost';
$username="root";
$pass = '';
$db = "simple_login_regis";

$con = mysqli_connect($host,$username,$pass,$db);
$connect = mysqli_select_db($con,'simple_login_regis');

?>