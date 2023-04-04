<?php
include('../config/db.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$options = array("cost" => 4);
$hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);

$duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (mysqli_num_rows($duplicate) > 0) {
  header('location: /?message= Uzivatel jiz existuje');
} else {
  try {
    $sql = "INSERT INTO users(email, username, password) VALUES('$email', '$username', '$hashPassword')";
    $result = mysqli_query($conn, $sql);


    if ($result) {
      header('location: ../index.php');
    }
  } catch (PDOException $e) {
    echo $sql . "
        " . $e->getMessage();
  }
  $conn = null;
}



?>