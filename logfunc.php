<?php
include("config.php");
session_start();
$U_name = $_POST['username'];
$p_pass = $_POST['password'];
$ramz_pass = hash('sha256', $p_pass);

$sql = "SELECT * FROM users WHERE username='$U_name' AND password='$ramz_pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Insert the logged-in user into the logged_in_users table
  $insertSql = "INSERT INTO logged_in_users (username, login_time) VALUES ('$U_name', NOW())";
  mysqli_query($conn, $insertSql);

  // Store the user's username in the session
  $_SESSION["username"] = $U_name;

  // Redirect to the users.php page
  header('Location: inbox.php');
} else {
  echo "<div class='alert alert-warning' role='alert'>
    Please input valid number
  </div>";
}

mysqli_close($conn);
?>