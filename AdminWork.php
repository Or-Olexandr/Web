<?php
session_start();
if(!is_null($_POST["AddUser"])){
    header('Location: '.$newURL);
    header('Location: AddUserFromAdmin.php');
}
elseif (!is_null($_POST["ChangeUser"])){
    $_SESSION["id_change_user"] = $_POST["id_user_change"];
    header('Location: '.$newURL);
    header('Location: ChangeUserFromAdmin.php');
    }
else{
    $_SESSION["id_change_user"] = $_POST["id_user_delete"];
    echo "hello";
    header('Location: '.$newURL);
    header('Location: deleteUser.php');
}
