<?php 
    session_start();

    $username = "";
    $email = "";
    $errors = array();
    

    
    $db = mysqli_connect("localhost", "root", "", "registration");

   

    if(isset($_POST['register'])) {
    
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

        if (empty($username)) {
            array_push($errors, "Username este luat deja, incearca altul!");
        }

        if (empty($email)) {
            array_push($errors, "Email este luat deja, incearca altul!");
        }

        if (empty($password_1)) {
            array_push($errors, "Parola nu este completata!");
        }

        if($password_1 != $password_2) {
            array_push($errors, "Cele două parole nu se potrivesc!");
        }

        $user_check_query= "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if($user) {
            if($user['username'] === $username) {
                array_push($errors, "Username deja exista");
            }

            if($user['email'] === $email) {
                array_push($errors, "Email-ul a fost folosit deja");
            }
        }

        if(count($errors) == 0) {
            $password = md5($password_1);

            $query = "INSERT INTO users (username, email, password) 
                    VALUES ('$username', '$email', '$password')";
            mysqli_query($db, $query); 
            $_SESSION['username']= $username;
            $_SESSION['success']="You have logged in";
            header('location: index.php');
           
        }
    }

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
      
        if (empty($username)) {
            array_push($errors, "Username-ul nu este valid");
        }
        if (empty($password)) {
            array_push($errors, "Parola nu este corecta.");
        }
      
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) == 1) {
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";
              header('location: index.php');
            }else {
                array_push($errors, "Wrong username/password combination");
               
            }
        }
      } 
    //logout
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>