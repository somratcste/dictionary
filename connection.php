<?php
$host = 'localhost';
$user = 'root';
$password = "";
$dbname = 'worddb';

$connection =  mysqli_connect($host, $user, $password , $dbname);

if(!$connection){
	die("connection error " . mysqli_connect_error());
}

?>