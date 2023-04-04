<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "pexeso";

// Creating connection
$conn = mysqli_connect($host, $user, $password, $database);

// Checking connection
if (!$conn) {
  die("Connection failer" . mysqli_connect_error());
}
?>