
<?php include('server.php'); 

?>


<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
</head>

<body>
	<br><br>
	<div class="header">
        <center>
        <h2>Home Page</h2>
</center>
    </div>
	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		
		<?php if (isset($_SESSION['username'])) : ?>
			
<p>Welcome,<strong>
					<?php echo $_SESSION['username']; ?>
				</strong>
			</p>

	<?php endif ?>

				<a href="login.php" style="color: red;">
					Click here to Logout! &#128533;
				</a>
		
			
		

			<br><br>
            <center>
			<a href="bunvenit.php"><strong>Click here to intro</strong></a>
		</center>


</body>
</html>
