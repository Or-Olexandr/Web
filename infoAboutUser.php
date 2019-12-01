<?php
//Start the session
session_start();
require_once "db.php";

$res = mysqli_query($conn, "SELECT * FROM users;");
if ($res->num_rows > 0)
    // output data of each row
    $count = 0;
    while($row = $res->fetch_assoc()) {
    $users["id"][]= $row["id"] ;
    $users["first_name"][]=$row["first_name"];
    $users["last_name"][]=$row["last_name"];
    $users["image"][]=$row["image"];
    $users["role"][]= mysqli_query($conn,"Select roles.title FROM roles WHERE roles.id = ".$row["id_role"].";")->fetch_assoc()["title"];
    $count++;
    }
    $users["count"]= $count;
echo json_encode($users);