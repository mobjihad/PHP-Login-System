<?php

$dbhost = "Localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "newUser";
    $message = "";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn) {
     die("Connection Error: " . mysqli_connect_error());
}

?> 