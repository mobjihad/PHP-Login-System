<?php
session_start();
if(!isset($_SESSION["Username"])){



    header("Location:login.php");
    exit();
}

if(isset($_REQUEST["logout"])){

      session_start();
      unset($_SESSION["Username"]);
      header("Location:login.php");
      exit();
}

?>

<?php





?> 

<html>

<body>
    <h1>Welcome <?php echo $_SESSION["Username"] ?></h1>
    <br>

    <a href="?logout">Logout</a>
</body>

</html>