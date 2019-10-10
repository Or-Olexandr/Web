<?php

if(is_null($_POST["Signin"])){
header('Location: '.$newURL);
header('Location: AddUser.php');
}
else{
    header('Location: '.$newURL);
    header('Location: login.php');
}
