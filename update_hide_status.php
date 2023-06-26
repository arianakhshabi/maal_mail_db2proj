<?php
include("config.php");

$username = $_GET['username'];
$hideStatus = $_GET['hide_status'];

$updateQuery = "UPDATE hide_users SET hide_status = '$hideStatus' WHERE username = '$username'";
if (mysqli_query($conn, $updateQuery)) {
  echo 'Hide status updated successfully';
} else {
  echo 'Error updating hide status: ' . mysqli_error($conn);
}
?>
