<?php
//Start the session
session_start();
require_once "db.php";
?>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!doctype html>
<html lang="en">
<style>
    .btnshapka{display: inline-block; margin: 0px 0px 0px 1300px;}
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">

</head>
<body style="padding-top: 3rem;">
<?php if(isset($_SESSION["auth"])){?>
<form action="HandlerButtonAuth.php" method="post" class="btnshapka">
    <button type="submit"  class="btn btn-outline-primary" name="SignIn"><?php  echo isset($_SESSION["name"])?$_SESSION["name"]:'';?></button>
    <button type="submit"  class="btn btn-outline-secondary" name="SignOut">Sign Out</button>
</form>
<?php }
else {?>
<form action="HandlerButton.php" method="post" class="btnshapka">
    <button type="submit"  class="btn btn-outline-primary" name="Signin">Sign in</button>
    <button type="submit"  class="btn btn-outline-secondary" name="Signup">Sign up</button>
</form>
<?php }?>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">First_Name</th>
        <th scope="col">Last_Name</th>
        <th scope="col">Role</th>
    </tr>
    </thead>
    <?php
$res = mysqli_query($conn, "SELECT * FROM users;");
if ($res->num_rows > 0)
    // output data of each row
    while($row = $res->fetch_assoc()) { ?>
    <tbody>
    <tr>
        <th scope="row"><?php echo $row["id"];?></th>
        <td width="400"> <img src= <?php echo $row["image"];?> width="200" height="150"/></td>
        <td><?php echo $row["first_name"];?></td>
        <td><?php echo $row["last_name"];?></td>
        <td><?php echo mysqli_query($conn,"SELECT * from roles WHERE id=\"".$row["id_role"]."\";" )->fetch_assoc()["title"];?></td>
    </tr>
	<?php } ?>
</table>
<?php if(isset($_SESSION["Role"])) if($_SESSION["Role"]==="Admin"){?>
<h1>              </h1><br>
<form action="AdminWork.php" method="post" >
    <button type="submit"  class="btn btn-primary"  name="AddUser">AddUser</button>
    <button class="btn btn-primary" type="submit" name="ChangeUser">ChangeUser</button>
     Number user: <input type = "number" name="id_user_change">
    <button class="btn btn-primary" type="submit" name="DeleteUser">DeleteUser</button>
    Number user:<input type = "number" name="id_user_delete">
</form><?php }?>

</body>
</html>