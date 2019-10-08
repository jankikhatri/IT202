<?php
//TODO add error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//load the config from the same directory
require('config.php');
echo "Loaded host: " . $host;

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo " Connected";

	//create table
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$stmt = $db->prepare($query);
	print_r($stmt->errorInfo());
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
 
	//insert
  $user = "JohnDoe";
  $pin = 1234;
	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) VALUES (:username, :pin)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute(array(":username"=> $user, ":pin"=> $pin));
  print_r($stmt->errorInfo());
  
	//TODO catch error from DB
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
	
	//select * from TestUsers where username = 
 /*$select_query = "select * from 'TestUsers' where username = :username";
 $stmt = $db->prepare($select_query);
 $r = $stmt->execute(array(":username"=> $user)); 
 
 //previous connection/query prep/etc
 $results = $stmt->fetch(PDO::FETCH_ASSOC);
 echo "<pre>" . var_export($results, true) . "</pre>"; */

}
catch(Exception $e){
	echo $e->getMessage();
	echo "Something went wrong";
}
?>
