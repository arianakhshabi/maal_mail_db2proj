<?php
include("config.php");
session_start();

// Retrieve the username from the session or any other method you are using to store the logged-in user
$username = $_SESSION["username"];

// Delete the user from the logged_in_users table
$sql = "DELETE FROM logged_in_users WHERE username = '$username'";
if (mysqli_query($conn, $sql)) {
    echo "User successfully logged out.";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Destroy the session and redirect to index.php
session_destroy();
header("Location: index.php");
exit();
?>
