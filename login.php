<?php include('server.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login System</title>
    <link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
    <body>
        <br><br>
        <div class="header">
            <center>
                <h2>Login</h2>
            </center>
</div>

        <form method = "post" action = "login.php"> 
            <?php include('errors.php'); ?>

            <div class = "input-group">
                <label>Username:</label>
                <input type = "text" name = "username" >
            </div> 

            <div class = "input-group">
                <label>Password:</label>
                <input type = "password" name = "password" >
            </div> 

            <div class = "input-group">
                <button type = "submit" name = "login" class = "btn">Login</button>
            </div> 
            <p>
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
               

    </body>

</html>
