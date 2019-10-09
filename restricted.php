<?php
//Start the session
session_start();
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
<?php if(isset($_SESSION['auth']) && $_SESSION['auth']) echo 'You auth';
else { ?>
<a href="login.php">Login</a>
<?php
}?>
<br>
</div>
</body>
</html>
