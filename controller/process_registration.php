<?php

$entrymessage = "" ;
$userExist = true;
include "../data/db_connect.php" ;
if(isset($_POST["submit"])){

    $dname=$_POST["dname"];
    $username = $_POST["username"];
    $password = $_POST["pass"];

    $encrypted_pass = password_hash($password,PASSWORD_DEFAULT);
       
         $query2 = "SELECT * from users where Username='$username'";
         $result2 = mysqli_query($conn, $query2) ; 
         $data2 = mysqli_num_rows($result2);
         if($data2>0){

            $userExist =  true;
         }
         

   

    $query = "INSERT INTO `users`(`DisplayName`, `Username`, `Password`) VALUES ('$dname', '$username', '$encrypted_pass')";
    if($userExist==false){ 
    if (mysqli_query($conn, $query)) {
     $entrymessage = "Information Added Successfully";
    }else {

        $entrymessage = "Couldn't Added Data";
    }
} else {
    $entrymessage = "User Already Exist, Try different username" ;
   
}
}
?>
