<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("config.php");
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

if(isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
  }

try
{
  $db = new PDO($conn_string, $username, $password);
  $query = 'SELECT * FROM Register WHERE USERNAME = :username';

  $stmt = $db->prepare($query);
 
  $stmt->bindParam(':username', $user);
  $r = $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $hash = password_hash($pass, PASSWORD_BCRYPT);
  if($_POST['password'] == $result['password']) {
        	echo "<html>Login Successful! <br></html>";
          echo "Welcome!";
    }
	else {
        	echo "Invalid username/password. Please try <a href='index.html'>again</a>.";
    }
    
  /*if($user.length == 0)
  {
    alert("Please Enter Your Username!");
  }*/
}

catch(Exception $e)
{
  echo $e->getMessage();
  echo "Something went wrong";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content = "3; url = 'http://web.njit.edu/~jk347/IT202//Project/welcome.html'"/>
</head>
</html>
