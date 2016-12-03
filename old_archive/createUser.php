<?php

$name = $_POST["name"];
$email = $_POST["email"];
$user_pw = $_POST["pw"];

include 'dbConVars.php';
// build conn
$conn = mysqli_connect($servername, $username, $password, $dbname);
// if conn is down, die
if(!$conn){
    die("Connection error: " . mysqli_connect_error());
}

//sql command
$sql = "INSERT INTO `cs290` (`name`, `email`, `password`) VALUES ('$name', '$email', '$user_pw')";

$success = mysqli_query($conn, $sql);

// if query was successful, set the cookie
if($success){
    $cookie_name = "RPS";
    $cookie_value = $_POST["name"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
}

//// RENDERRRR
//header
include("static/header.php");

// if running the query is successful, then prompt so.
if( $success ){
    echo "<br><h3>Sign up was successful!</h3>";
} else {
    echo "Error: " . $sql . "<br><h3>" . mysqli_error($conn) . "</h3>";
}
mysqli_close($conn);

//footer
include("static/footer.php");
?>
