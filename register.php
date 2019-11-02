<?php
//TODO add error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//load the config from the same directory
require('config.php');

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	
	//create table
	$query = "create table if not exists `Register`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`password` varchar(30) not null,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);

	$r = $stmt->execute();
	
	//insert
  $user = $_POST['username'];
  $pass = $_POST['password'];
	$insert_query = "INSERT INTO `Register`( `username`, `password`) VALUES (:username, :password)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute(array(":username"=> $user, ":password"=> $pass));
  
  
	//TODO catch error from DB
	echo "<br>" . ($r>0?"Registration succesful":"Registration failed") . "<br>";
  echo "Return to <a href='index.html'>Login</a> Page";
	
	
}
catch(Exception $e){
	echo $e->getMessage();
	echo "Something went wrong";
}
?>
