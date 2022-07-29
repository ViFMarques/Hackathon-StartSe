<?php 

$server = "us-cdbr-east-06.cleardb.net";
$user = "b326f338c9b7f1";
$pass = "d26072da";
$database = "heroku_3b24d75e5dde9c9";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>
