<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$username = $raw_pass = $dname = "";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $raw_pass = $_POST["pass"];
    $dname = $_POST["dname"];
    $encrypted_pass = password_hash($raw_pass, PASSWORD_DEFAULT);
    $dbhost = "Localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "crud";
    $message = "";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn) {
     die("Connection Error: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

    $query = "INSERT INTO pandas(Name,identifier,img_source) VALUES('$dname', '$username', '$raw_pass')";

    if (mysqli_query($conn, $query)) {
     echo "Information Added Successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}
?>

<html>

<head>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <div class="Container">
        <h1> Registration </h1>
        <form class="form" action="" method="post">
            <label> Display Name : </label>
            <input type="text" name="dname" value="<?php echo $dname; ?>"><br><br>
            <label> Username Name : </label>
            <input type="text" name="username" value="<?php echo $username; ?>"><br><br>
            <label> Password : </label>
            <input type="password" name="pass" value="<?php echo $raw_pass; ?>"><br><br>
            <input type="submit" value="submit">
        </form>
    </div>
</body>

</html>
