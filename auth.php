<?php
//Start the session
session_start();
require_once "db.php";

if(count($_POST)>0){
	$res = mysqli_query($conn, "SELECT * from users WHERE first_name=\"".$_POST["name"]."\" AND password=\"".
	$_POST["password"]."\";");
	$row = mysqli_fetch_array($res);
	if(is_array($row)){
	    $_SESSION["id"] = $row["id"];
		$_SESSION["name"] = $row["first_name"];
		$_SESSION["surname"] =$row["last_name"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["Role"] = mysqli_query($conn,"SELECT * from roles WHERE id=\"".$row["id_role"]."\";" )->fetch_assoc()["title"];
		$_SESSION["image"] = $row["image"];
		$_SESSION["auth"] = true;
		echo "authorization";
        header('Location: '.$newURL);
        header('Location: infoAboutUser.php');
	}
	else{
		echo "invalid password";
		header('Location: '.$newURL);
		header('Location: login.php');
	}
	}
?>
