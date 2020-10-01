<?php

    $username1 = "wellcar1_back";
    $password1 = "admin@96!";
    $hostname = "localhost"; 
    $database = "wellcar1_back_trim"; 
                    
    $mysqli= new mysqli($hostname, $username1 , $password1, $database);

    if (!$mysqli) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
?>