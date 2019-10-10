<?php
session_start();
require_once "db.php";
if($_POST["name"]==="") {
    $_SESSION["error"] = "name can`t be empty";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
}
elseif ($_POST["surname"]===""){
    $_SESSION["error"] = "surname can`t be empty";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }
elseif (strlen($_POST["password"])<=6){
    $_SESSION["error"] = "Short password";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }
elseif ($_POST["Roles"]==="Role"){
    $_SESSION["error"] = "Choose role";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }

  else{  mysqli_query($conn, "INSERT INTO users (first_name, last_name, password, id_role)
VALUES (\"" . $_POST["name"] . "\",\"" . $_POST["surname"] . "\",\"" . $_POST["password"] . "\",\"" . $_POST["Roles"] . "\");");
    $_SESSION["error"]="";
    header('Location: ' . $newURL);
    header('Location: infoAboutUser.php');
}
?>

