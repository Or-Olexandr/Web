<?php
session_start();
require_once "db.php";
 $res =   mysqli_query($conn, "DELETE FROM users WHERE users.id = " . $_GET["id"] . " ;");
if($_SESSION["id"]===$_GET["id"]) {
    session_unset();
    session_destroy();}
    header('Location: infoAboutUser.php');

