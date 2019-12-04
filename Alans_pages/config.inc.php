<?php
define('DBHOST', 'localhost');
define('DBNAME', 'travel');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

//database connection
$conn = mysqli_connect("localhost","root","","travel");
 
if(!$conn){
	die("Connection error: " . mysqli_connect_error());	
}
?>