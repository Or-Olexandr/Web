<?php
session_start();

if(!is_null($_POST["Signin"])){
header('Location: login.php');
}
else{
    $_SESSION["error"]="";
    header('Location: AddUser.php');
}
