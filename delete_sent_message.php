<?php
session_start();
$new_user = $_SESSION["username"];
include("config.php");

if (isset($_GET['id'])) {
  $messageId = $_GET['id'];
  

  $deleteQuery = "CALL delete_sent_message('$new_user', $messageId)";
  $result = mysqli_query($conn, $deleteQuery);


  if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['message'];

    // Redirect back to the inbox page if necessary
    header("Location: inbox.php");
    exit();
  } else {
    echo "Failed to delete the message.";
  }
} else {
  echo "Invalid message ID.";
}
?>