<?php
session_start();
if(!is_null($_POST["SignIn"])){
    header('Location: AddUser.php');
}
else{
    $_SESSION["auth"] = false;
    session_unset();
    session_destroy();
   header('Location: infoAboutUser.php');
}
