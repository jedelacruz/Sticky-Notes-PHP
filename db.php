<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "to_do_app";
    $conn = "";


    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_li_exception){
        echo "Database Server is not running";
    }
    

    if(!$conn){
        echo "Database Connection Failed";
    }
?>