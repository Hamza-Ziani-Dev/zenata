<?php
//Connect To DB
$host="127.0.0.1";
$user="root";
$password="";
$database="zenata";
//URL de Connection
$connect=  mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    die("can not connect to database field:". mysqli_connect_error());
}
?>