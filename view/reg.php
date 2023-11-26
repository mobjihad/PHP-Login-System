<?php 

   include "../controller/process_registration.php" ;

?> 

<html>
<head> 

<link rel="stylesheet" href="../design.css">
</head>
<body>
 <div class="Container"> 
<form action="" method="post">
<h1> Registration </h1>
  <label>Display Name : </label>
  <input type="text" name="dname"> <br><br>
  <label>User Name : </label>
  <input type="text" name="username"> <br><br>
  <label>Password : </label>
  <input type="text" name="pass"> <br><br>
  <input type="submit" name="submit" > 
  <label><?php echo $entrymessage ?>  </label>


</form>
      <p> Already an User ? </p>
      <a href="login.php">Login</a>

</div>
</body>

</html>