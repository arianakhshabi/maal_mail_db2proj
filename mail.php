<?php
session_start();
$new_user = $_SESSION["username"];

include("config.php");

$recipients = $_POST['recipient'];
$cc = $_POST['cc'];
$subject = $_POST['subject'];
$content = $_POST['content'];

$sql = "CALL SendEmail('$new_user', '$recipients', '$cc', '$subject', '$content')";
if (mysqli_query($conn, $sql)) {
    echo "Email(s) sent successfully.";
} else {
    echo "Error sending email(s): " . mysqli_error($conn);
}

mysqli_close($conn);
?>
