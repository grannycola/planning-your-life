<?php
$host = 'localhost'; 
$database = 'plans';
$user = 'root';
$password = '12345678';
$mysqli = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($mysqli));
?>