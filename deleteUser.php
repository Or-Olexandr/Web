<?php
session_start();
require_once "db.php";
 $res =   mysqli_query($conn, "DELETE FROM users WHERE users.id = " . $_SESSION["id_change_user"] . " ;");
if($_SESSION["id"]===$_SESSION["id_change_user"]) {
    session_unset();
    session_destroy();}
    header('Location: ' . $newURL);
    header('Location: infoAboutUser.php');

