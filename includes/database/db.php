<?php 
session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '', 
    'php_mysql_crud_luis'
) or die(mysqli_error($mysqli));


?>