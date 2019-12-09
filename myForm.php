<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirm'])){
		if($_POST['password'] == $_POST['confirm']){
			echo "<br>Passwords Matched!<br>";
		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}
?>
<html>
<head>
<script>
function validate(){
	var form = document.forms[0];
	var password = form.password.value;
	var conf = form.confirm.value;
	console.log(password);
	console.log(conf);
	if(password == conf){
		return true;
	}
	
	alert("Passwords don't match");
	return false;
	
}
</script>
</head>
<body><?php getName();?>
<form method="POST" action="#" onsubmit="return validate();">
Username:<input name="name" type="text" placeholder="Enter your name"/><br><br>
Password:<input type="password" name="password"/><br><br>
Confirm <br>Password:<input type="password" name="confirm"/><br><br>

<input type="submit" value="Submit"/>
</form>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>