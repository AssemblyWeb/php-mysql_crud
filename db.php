<?php
$connection = 'localhost';
$username = 'root';
$password = 'root';
$database = 'phpmysql_crud';

session_start();

$conn = mysqli_connect($connection, $username, $password, $database);

// if(isset($conn)){
//     echo 'db is connected';
// }
?>