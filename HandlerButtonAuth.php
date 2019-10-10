<?php
session_start();
if(!is_null($_POST["SignIn"])){
header('Location: '.$newURL);
header('Location: AddUser.php');
}
else{
    session_unset();
    session_destroy();
   header('Location: '.$newURL);
   header('Location: infoAboutUser.php');
}
?>
