<?php
session_start();

if(!is_null($_POST["Signin"])){
header('Location: '.$newURL);
header('Location: login.php');
}
else{
    $_SESSION["error"]="";
    header('Location: '.$newURL);
    header('Location: AddUser.php');
}
