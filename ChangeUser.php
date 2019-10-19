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

    $id_roles = $_POST["Roles"];
    if($_POST["Roles"]==="Admin"||$_POST["Roles"]==="User"){
       // echo "SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";";
        //$res =  mysqli_query($conn,"SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";");
       // echo $res;
        $id_roles = mysqli_query($conn,"SELECT id FROM roles WHERE roles.title = \"".$_POST["Roles"]."\";")->fetch_assoc()["id"];
    }

    if(isset($_SESSION["id_change_user"])) {
        echo $_SESSION["id_change_user"];
       // echo $_SESSION["id"];
        if ($_SESSION["id_change_user"] !== $_SESSION["id"]) {
            echo $_SESSION["id"];
            mysqli_query($conn, "UPDATE users SET first_name=\"" . $_POST["name"] .
                "\", last_name=\"" . $_POST["surname"] .
                "\", password=\"" . $_POST["password"] .
                "\", id_role=\"" . $id_roles .
                "\"WHERE id = \"" . $_SESSION["id_change_user"] . "\";");
            $_SESSION["error"]="";
            $_SESSION["id_change_user"] = $_SESSION["id"];
            header('Location: ' . $newURL);
            header('Location: infoAboutUser.php');
            die();


        }
    }

    mysqli_query($conn, "UPDATE users SET first_name=\"". $_POST["name"] .
        "\", last_name=\"".$_POST["surname"].
        "\", password=\"".$_POST["password"].
        "\", id_role=\"".$id_roles.
        "\"WHERE id = \"".$_SESSION["id"]."\";");
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["surname"] =$_POST["surname"];
    $_SESSION["password"] = $_POST["password"];
    $_SESSION["Role"] = $_POST["Roles"];
    $_SESSION["error"]="";
    header('Location: ' . $newURL);
    header('Location: infoAboutUser.php');

}
?>