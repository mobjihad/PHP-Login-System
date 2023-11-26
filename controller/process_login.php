<?php

 session_start();
 if(isset($_SESSION["Username"])){

    header("Location:home.php");
    exit();
 }

?> 

<?php

include "../data/db_connect.php" ;
$message = "";
$summ ="";



if(isset($_POST["generate_code"])) { 
   
     

    $out = shell_exec('python script.py');
    $myfile = fopen("../data/code.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $out);
    fclose($myfile);
    $message =  "Generated";
    
      }

if(isset($_POST['submit'])) { 


    $username = $_POST["username"];
    $raw_pass = $_POST["pass"];
   
   
         $query = "SELECT * from users where Username='$username'";
         $result = mysqli_query($conn, $query) ; 
         $data = mysqli_num_rows($result);
        
      //    while( $row2 = mysqli_fetch_assoc($result)){

      //   echo $row2["Password"];
         
      //    }
         
         

         $myfile1 = fopen("../data/code.txt", "r") or die("Unable to open file!");
         $code = fgets($myfile1);
         fclose($myfile1); 
         $user_code = $_POST["code"];
         if ($data == 1) {
            
            while($row = mysqli_fetch_assoc($result)) {
              if(password_verify($raw_pass,$row["Password"])) {
               if($user_code == $code){  
               echo "Logged in";
               session_start();
               $_SESSION["Username"] = $username;
               header("Location: ../view/home.php");
               exit();
               }else {
                  echo "Wrong Code" ; 
               }
              }else {

               echo "Wrong Credentials" ;
            }
         

          
         }


}else {
   echo "User Not Found" ;
}
} 

?> 