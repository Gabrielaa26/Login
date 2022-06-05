<?php include('server.php') ?>

<?php
 

if (isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You have to log in first";
	header('location: login.php');
}


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head> 
    <title> Bine ati venit!</title>
    <link rel= "stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br><br>
    <div class="header"> 
    <center>
    <h2> Bine ati venit!</h2>
</center>
</div>
<br><br>
<center>
<img src="bazadedate.jpg" weith="50">
</center>
<br><br><br><br><br><br><br><br><br>
<p>
				<a href="login.php" style="color: red;">
					Click here to Logout
				</a>
			</p>
</body>
</html>
