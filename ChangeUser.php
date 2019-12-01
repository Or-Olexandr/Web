<?php
session_start();
require_once "db.php";
//$data_from_post = json_decode(file_get_contents('php://input'),true);

$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        $_SESSION["target_file"] = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

    $id_roles = $_POST["Roles"];
    if($_POST["Roles"]==="Admin"||$_POST["Roles"]==="User"){
       // echo "SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";";
        //$res =  mysqli_query($conn,"SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";");
       // echo $res;
        $id_roles = mysqli_query($conn,"SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";")->fetch_assoc()["id"];
    }
    if($_POST["image"]!=="NULL"){
        mysqli_query($conn, "UPDATE users SET first_name=\"" . $_POST["name"] .
            "\", last_name=\"" . $_POST["surname"] .
            "\", password=\"" . $_POST["password"] .
            "\", id_role=\"" . $id_roles .
            "\", image=\"".$target_file.
            "\"WHERE first_name = \"" . $_POST["name"] . "\";");
    }
    else {
        mysqli_query($conn, "UPDATE users SET first_name=\"" . $_POST["name"] .
            "\", last_name=\"" . $_POST["surname"] .
            "\", password=\"" . $_POST["password"] .
            "\", id_role=\"" . $id_roles .
            "\"WHERE first_name = \"" . $_POST["name"] . "\";");
    }

   echo json_encode($_POST);

