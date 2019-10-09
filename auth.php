<?php
//Start the session
session_start();
require_once "db.php";

if(count($_POST)>0){
	$res = mysqli_query($conn, "SELECT * from users WHERE first_name=\"".$_POST["name"]."\" AND password=\"".
	$_POST["password"]."\";");
	$row = mysqli_fetch_array($res);
	if(is_array($row)){
		$_SESSION["name"] = $row["id"];
		$_SESSION["password"] = $row["password"];
		echo "authorization";
	}
	else{
		echo "invalid password";
		header('Location: '.$newURL);
		header('Location: restricted.php');
	}
	}
?>
