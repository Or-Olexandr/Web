<?php
session_start();
require_once "db.php";
mysqli_query($conn,"INSERT INTO users (first_name, last_name, password, id_role)
VALUES (\"".$_POST["name"]."\",\"".$_POST["surname"]."\",\"".$_POST["password"]."\",\"".$_POST["Roles"]."\");");
?>
<!doctype html>
<html lang="en">
<head>
 <br>
<?php
echo "New user is record";
?>
</html>
