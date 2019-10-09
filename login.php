<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/materialize.min.css">
<?php
//Start the session
session_start();
?>


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
<style>
.container{
	width: 400px;
}
</style>
</head>
<body style="padding-top: 3rem;">
<div class="container">
<form action="auth.php" method="post">
Name: <input type="text" name="name"><br>
Password : <input type="text" name="password"><br>
<input type="submit" class="btn">
</form>
</div>
</body>
</html>