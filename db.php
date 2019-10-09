<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "testdb";

$conn = new mysqli($servername, $username,$password, $database);
if($conn->connect_error){
    die("Connection failded: ". $conn->connect_error);
}
echo  "Connected successfully";
$sql = "SELECT * FROM users WHERE first_name = \"admin\" AND PASSWORD = \"admin\"";
$result = $conn->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <style>
        .container{
            width: 400px;
        }
    </style>
</head>
<body>
<div class ="container">
    <?php
    if($result->num_rows >0)
    while($row = $result->fetch_assoc()){
    echo  "id: ". $row["id"]. "\n";
    echo  "Name: ". $row["first_name"]. "\n";
    }?>
    <br>
</div>
</body>

