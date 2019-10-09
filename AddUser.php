

<?php
//Start the session
session_start();
?>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!doctype html>
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
<form action="insert.php" method="post">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="exampleInputSurname">Surname</label>
        <input type="text" class="form-control" id="exampleInputName" name="surname" placeholder="Enter Surname">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Roles">
        <option selected>Role</option>
        <option value="1">Admin</option>
        <option value="2">User</option>
    </select><br>
    <h1></h1>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
