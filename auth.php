<?php
//Start the session
session_start();
require_once "db.php";
$data_from_post = json_decode(file_get_contents('php://input'),true);
//die();
if(count($data_from_post)>0){
	$res = mysqli_query($conn, "SELECT * from users WHERE first_name=\"".$data_from_post["first_name"]."\" AND password=\"".
		$data_from_post["password"]."\";");
		$row = mysqli_fetch_array($res);
		if(is_array($row)){
	   /* $_SESSION["id"] = $row["id"];
		$_SESSION["name"] = $row["first_name"];
		$_SESSION["surname"] =$row["last_name"];
		$_SESSION["password"] = $row["password"];
		$_SESSION["Role"] = mysqli_query($conn,"SELECT * from roles WHERE id=\"".$row["id_role"]."\";" )->fetch_assoc()["title"];
		$_SESSION["image"] = $row["image"];
		$_SESSION["auth"] = true;*/
	   $data["success"][] = "authorization";
	   $data["name"][]=$row["first_name"];
	   echo json_encode($data);
        //header('Location: infoAboutUser.php');
	}
	else{
        $data["success"][] = "invalid password";
		echo json_encode($data);
		//header('Location: login.php');
	}
	}


