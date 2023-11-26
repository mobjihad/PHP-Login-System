<?php
 $username = $raw_pass =$dname = "" ;
 if(isset($_POST["submit"])){
     
    $username = $_POST["username"];
    $raw_pass = $_POST["pass"];
    $dname= $_POST["dname"];
    $encrypted_pass = password_hash($raw_pass,PASSWORD_DEFAULT);
    $dbhost = "Localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "loginapp";
    $message = "" ; 
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

         if(!$conn){

            die("Connection Error!!");
            echo "Dbms ERROr" ;
         }

    $query = "INSERT INTO user(DisplayName,Username,Password) VALUES ('$dname', '$username', '$encrypted_pass')";
 
    if(mysqli_query($conn, $query)){
        
        echo "Information Added Succesfully";
     }

}



?> 