<?php

 session_start();
 if(isset($_SESSION["Username"])){

    header("Location:home.php");
    exit();
 }

?> 

<?php
$message = "";
$summ ="";



if(isset($_POST["generate_code"])) { 
   
     

    $out = shell_exec('python script.py');
    $myfile = fopen("code.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $out);
    fclose($myfile);
    $message =  "Generated";
    
      }

if(isset($_POST['submit'])) { 


    $username = $_POST["username"];
    $raw_pass = $_POST["pass"];
   
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
         $query = "SELECT * from user where Username='$username' and Password='$raw_pass'";
         $result = mysqli_query($conn, $query) ; 
         $data = mysqli_num_rows($result);

         $myfile1 = fopen("code.txt", "r") or die("Unable to open file!");
         $code = fgets($myfile1);
         fclose($myfile1); 
         $user_code = $_POST["code"];
         if($data==1 && $user_code==$code){
            echo "Logged iN";
            session_start();
            $_SESSION["Username"] = $username ;  
            header("Location:home.php");
            exit();
         }else {

            echo "Wrong Credentials" ;
         }
      


} 

?> 


<html>

<head>
 
<link rel="stylesheet" href="design.css">

</head>

<body>

 <div class="Container">
         
  <form action="" method="post" > 
      <h1> Login </h1>
      
      <label> Username Name : </label>
      <input type ="text" name="username"> <br><br>
      <label> Password : </label>
      <input type ="password" name="pass"> <br><br>
      <label> Login Code : </label>
      <input type ="text" name="code">
      <input type="submit" value="Generate Code" name="generate_code" >
      <label><?php echo $message ?></label> <br><br>
      <input type="submit" value="submit" name="submit">
      <label><?php echo $summ ?></label> <br><br>
      
      </form> 



 </div>


</body>

</html>