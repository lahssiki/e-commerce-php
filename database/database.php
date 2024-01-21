<?php

    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "e-commerce_php";
    
        $conn = mysqli_connect($host, $username, $password, $database);

        // check connection
        if(!$conn)
        {
            die("MADAEATCH CONNXION DATABASE: " . mysqli_connect_error());
        }