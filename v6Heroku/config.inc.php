<?php
//define('DBHOST', 'localhost');
//define('DBNAME', 'travel');
//define('DBUSER', 'root');
//define('DBPASS', '');
//define('DBCONNSTRING',"mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

// set error reporting on to help with debugging
error_reporting(E_ALL);
ini_set('display_errors','1');

// you may need to change these for your own environment
$url = getenv('iz4owbvrjhjg4qfi:ri785pz4yr5d7x3n@xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/hf0c58geytrgkljs');
$dbparts = parse_url($url);

//$hostname = $dbparts['xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com'];
//$username = $dbparts['iz4owbvrjhjg4qfi'];
//$password = $dbparts['ri785pz4yr5d7x3n'];
//$database = ltrim($dbparts['hf0c58geytrgkljs'],'/');

$hostname = 'xefi550t7t6tjn36.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'iz4owbvrjhjg4qfi';
$password = 'ri785pz4yr5d7x3n';
$database = 'hf0c58geytrgkljs';

define('DBCONNSTRING', "mysql:host=$hostname;dbname=$database");
define('DBUSER', $username);
define('DBPASS', $password);

// auto load all classes so we don't have to explicitly include them
spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file)) 
      include $file;
});

// connect to the database
//$connection = DatabaseHelper::createConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));

// we can then pass this connection variable to other classes that need it
?>