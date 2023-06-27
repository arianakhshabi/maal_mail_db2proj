<?php
session_start();
$new_user = $_SESSION["username"];

include("config.php");

// Get the form data
$recipients = $_POST['recipient'];
$cc = $_POST['cc'];
$subject = $_POST['subject'];
$content = $_POST['content'];

// Split the recipients string into an array
$recipientArray = explode(",", $recipients);

// Iterate over each recipient and send the message
foreach ($recipientArray as $recipient) {
    // Prepare the insert query for recipient's inbox
    $recipientTable = "message_" . trim($recipient);
    $insertQueryRecipient = "INSERT INTO `$recipientTable` (subject, sender, receivers, carboncopy_receivers, email_content, sending_time) VALUES ('$subject', '$new_user', '$recipient', '$cc', '$content', NOW())";

    // Execute the insert query for recipient's inbox
    if (mysqli_query($conn, $insertQueryRecipient)) {
        echo "Email sent successfully to $recipient.<br>";
    } else {
        echo "Error sending email to $recipient: " . mysqli_error($conn) . "<br>";
    }
}

// Prepare the insert query for sender's sent messages
$sentTable = "sent_message_" . $new_user;
$insertQuerySent = "INSERT INTO `$sentTable` (subject, sender, receivers, carboncopy_receivers, email_content, sending_time) VALUES ('$subject', '$new_user', '$recipients', '$cc', '$content', NOW())";

// Execute the insert query for sender's sent messages
if (mysqli_query($conn, $insertQuerySent)) {
    echo "Email added to sent messages.";
} else {
    echo "Error adding email to sent messages: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
