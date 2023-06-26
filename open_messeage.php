<?php
session_start();
$new_user = $_SESSION["username"];
include("config.php");

// Check if the message ID is provided in the URL
if (isset($_GET['id'])) {
  $messageId = $_GET['id'];
  
  // Retrieve the message from the corresponding table
  $tableName = "message_" . $new_user;
  $selectQuery = "SELECT subject, sender, sending_time, email_content FROM `$tableName` WHERE id = $messageId";
  $result = mysqli_query($conn, $selectQuery);
  $row = mysqli_fetch_assoc($result);

  // Check if the message exists
  if ($row) {
    $subject = $row['subject'];
    $sender = $row['sender'];
    $sendingTime = $row['sending_time'];
    $emailContent = $row['email_content'];

    // Display the message information
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Message Details</title>";
    echo "<!-- Bootstrap CSS -->";
    echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<h1>Message Details</h1>";
    echo "<p><strong>Subject:</strong> $subject</p>";
    echo "<p><strong>Sender:</strong> $sender</p>";
    echo "<p><strong>Sending Time:</strong> $sendingTime</p>";
    echo "<p><strong>Email Content:</strong></p>";
    echo "<p>$emailContent</p>";
    echo "<a href='inbox.php' class='btn btn-primary'>Back to Inbox</a>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
  } else {
    echo "<p>Message not found.</p>";
  }
} else {
  echo "<p>Invalid message ID.</p>";
}
?>
