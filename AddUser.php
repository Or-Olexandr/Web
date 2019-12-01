

<?php
//Start the session
session_start();
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
<?php
if(isset($_SESSION["auth"])){?>
    <table>
    <tr>
        <th width="400px" scope="col"></th>
        <th scope="col"></th>
    </tr>
    <form action="ChangeUser.php" method="post">
        <tr>
            <td width="400"> <img src= <?php echo $_SESSION["image"];?> width="200"  class="rounded mx-auto d-block" height="150"/><br>
                <div class="form-group">
                    <input type="file"  name="fileToUpload" id="fileToUpload" >
                </div>
            </td>
            <td>
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" value=<?php echo $_SESSION["name"];?> class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="exampleInputSurname">Surname</label>
            <input type="text" value=<?php echo $_SESSION["surname"];?> class="form-control" id="exampleInputSurname" name="surname" placeholder="Enter Surname">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value=<?php echo $_SESSION["password"];?> class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Roles">
            <option selected><?php echo $_SESSION["Role"];?></option>
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

<?php  }
else {?>

<form action="insert.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputName"> Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputSurname"> Surname</label>
        <input type="text" class="form-control" id="exampleInputName" name="surname" placeholder="Enter Surname">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"> Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Roles">
        <option selected>Role</option>
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select><br>
    <h1></h1>
    <div class="form-group">
        <label for="exampleInputImage"> Image</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<p class="h1"><?php
if(isset($_SESSION["error"]))
echo $_SESSION["error"]?>
</p>
<?php }?>
</body>
</html>
