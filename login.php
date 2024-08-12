<?php

require("db.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * from user WHERE username ='$username'");
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
            $_SESSION['login'] = 'true';
            $_SESSION['id'] = $row['id'];
            header("location: viewNote.php");
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
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        
    <div class="container-bg">
        <form method="POST">
            <h1>Login</h1>
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="text" placeholder="Password">
            <button name="submit">Login</button>
            <p>Doesn't have an account? <a href="register.php">Register Here</a> </p>
        </form>
    </div>
        
        
        <script src="" async defer></script>
    </body>
</html>