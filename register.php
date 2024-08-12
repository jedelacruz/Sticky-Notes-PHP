<?php

require("db.php");

if(isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        $sql = "INSERT into user (username, password) VALUES ('$username', '$password')";
        if(mysqli_query($conn, $sql)){
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>To Do App</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <div class="container-bg">
            <form method="POST">
                <h1>Register</h1>
                <input name="username" type="text" placeholder="Username">
                <input name="password" type="text" placeholder="Password">
                <input name="cpassword" type="text" placeholder="Confirm Password">
                <button name="submit">Register</button>
                <p>Want to join us? <a href="login.php">Login Here</a> </p>
            </form>
        </div>
        
        <script src="" async defer></script>
    </body>
</html>