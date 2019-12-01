<?php

//Start the session
session_start();
require_once "db.php";
$data_from_post = json_decode(file_get_contents('php://input'), true);
//die();
if (count($data_from_post) > 0) {
    if($data_from_post["search_from_id"]===true){
        $res = mysqli_query($conn, "SELECT * from users WHERE id=\"" . $data_from_post["id"]."\";");
        $row = mysqli_fetch_array($res);
        if (is_array($row)) {
            $data["name"] = $row["first_name"];
            $data["surname"] = $row["last_name"];
            $data["password"] = $row["password"];
            $data["Role"] = mysqli_query($conn, "SELECT * from roles WHERE id=\"" . $row["id_role"] . "\";")->fetch_assoc()["title"];
            $data["image"] = $row["image"];
            echo json_encode($data);
        }
    }else {
        $res = mysqli_query($conn, "SELECT * from users WHERE first_name=\"" . $data_from_post["first_name"]."\";");
        $row = mysqli_fetch_array($res);
        if (is_array($row)) {
            $data["name"] = $row["first_name"];
            $data["surname"] = $row["last_name"];
            $data["password"] = $row["password"];
            $data["Role"] = mysqli_query($conn, "SELECT * from roles WHERE id=\"" . $row["id_role"] . "\";")->fetch_assoc()["title"];
            $data["image"] = $row["image"];
            echo json_encode($data);
        }
    }
}
