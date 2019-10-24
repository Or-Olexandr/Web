<?php
session_start();
require_once "db.php";
$res = mysqli_query($conn, "SELECT * from users WHERE id=\"".$_GET["id"]."\";");
$row = mysqli_fetch_array($res);
$role = mysqli_query($conn,"SELECT * from roles WHERE id=\"".$row["id_role"]."\";" )->fetch_assoc()["title"];
if(is_array($row)){
?>
    <!doctype html><link rel="stylesheet"
                         href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <html lang="en">
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
<table>
    <tr>
        <th width="400px" scope="col"></th>
        <th scope="col"></th>
    </tr>
    <form action="ChangeUser.php" method="post">
        <tr>
            <td width="400"> <img src= <?php echo $row["image"];?> width="200"  class="rounded mx-auto d-block" height="150"/><br>
                <div class="form-group">
                    <input type="file" class="form-control" name="image" placeholder="Enter name">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" value=<?php echo $row["first_name"];?> class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputSurname">Surname</label>
                    <input type="text" value=<?php echo $row["last_name"];?> class="form-control" id="exampleInputSurname" name="surname" placeholder="Enter Surname">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" value=<?php echo $row["password"];?> class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Roles">
                    <option selected><?php echo $role;?></option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select><br>
                <h1></h1>

                <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </td>
    </tr>
</table>
<p class="h1"><?php
    if(isset($_SESSION["error"]))
        echo $_SESSION["error"]?>
</p>
<?php }?>
</body>
    </html>

