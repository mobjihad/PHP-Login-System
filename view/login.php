<?php

include "../controller/process_login.php" ;

?> 

<html>

<head>
 
<link rel="stylesheet" href="../design.css">

</head>

<body>

 <div class="Container">
         
  <form action="" method="post" class="form" > 
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
      <p> Not an User ? </p>
      <a href="reg.php">Register</a>



 </div>


</body>

</html>