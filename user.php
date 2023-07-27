<?php
//import connection
require 'includes/config/database.php';
$db = connectionDB();
//create email and pass
$email = 'test@test.com';
$password = '123456';

$passHash = password_hash($password,PASSWORD_BCRYPT);
//var_dump($passHash);

//query to save
$query = "INSERT INTO users (email, password) values ('$email', '$passHash');";

//run query
mysqli_query($db, $query);
