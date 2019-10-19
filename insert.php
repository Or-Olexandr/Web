<?php
session_start();
require_once "db.php";
if($_POST["name"]==="") {
    $_SESSION["error"] = "name can`t be empty";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
}
elseif ($_POST["surname"]===""){
    $_SESSION["error"] = "surname can`t be empty";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }
elseif (strlen($_POST["password"])<=6){
    $_SESSION["error"] = "Short password";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }
elseif ($_POST["Roles"]==="Role"){
    $_SESSION["error"] = "Choose role";
    header('Location: ' . $newURL);
    header('Location: AddUser.php');
    }
else{
    $res = mysqli_query($conn, "SELECT * from users WHERE first_name=\"".$_POST["name"]."\";");
    $row = mysqli_fetch_array($res);
    if(is_array($row)){
        $_SESSION["error"] = "This user already exists";
        header('Location: ' . $newURL);
        header('Location: AddUser.php');
        die();
    }
$target_dir = "public/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
}
    mysqli_query($conn, "INSERT INTO users (first_name, last_name, password, image, id_role)
VALUES (\"" . $_POST["name"] . "\",\"" . $_POST["surname"] . "\",\"" . $_POST["password"] . "\",\"" .$target_file."\",\"". $_POST["Roles"] . "\");");
    $_SESSION["error"]="";
    header('Location: ' . $newURL);
    header('Location: infoAboutUser.php');
}
?>

