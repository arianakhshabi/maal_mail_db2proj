<?php
session_start();
$new_user = $_SESSION["username"];
include("config.php");

if (isset($_GET['id'])) {
  $messageId = $_GET['id'];
  
  // Delete the message from the corresponding table
  $tableName = "message_" . $new_user;
  $deleteQuery = "DELETE FROM `$tableName` WHERE id = $messageId";
  $result = mysqli_query($conn, $deleteQuery);

  if ($result) {
    // Redirect back to the inbox page
    header("Location: inbox.php");
    exit();
  } else {
    echo "Failed to delete the message.";
  }
} else {
  echo "Invalid message ID.";
}
?>
