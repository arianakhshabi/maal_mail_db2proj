<?php
include("config.php");
session_start();
$nUid = $_SESSION["eID"];
$username = $_POST["username"];
$password = $_POST['password'];
$ramz_pas = hash('sha256', $password);
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$tel = $_POST['phone'];
$Addres = $_POST['address'];
$codemeli = $_POST['codemeli'];
$nick_name = $_POST['nickname'];
$date_of_birth = $_POST["date_of_birth"];

// Get the original username from the 'users' table
$originalUsernameQuery = "SELECT username FROM users WHERE user_id='$nUid'";
$originalUsernameResult = mysqli_query($conn, $originalUsernameQuery);

if ($originalUsernameResult && mysqli_num_rows($originalUsernameResult) > 0) {
    $row = mysqli_fetch_assoc($originalUsernameResult);
    $originalUsername = $row['username'];

    // Check if the username has changed
    if ($originalUsername !== $username) {
        // Update the record in the 'users' table
        $updateQuery = "UPDATE users SET username='$username', password='$ramz_pas', tel='$tel', first_name='$fname', last_name='$lname', codemeli='$codemeli', nickname='$nick_name', address='$Addres', date_of_birth='$date_of_birth',updated_at=Now() WHERE user_id='$nUid'";
        if (mysqli_query($conn, $updateQuery)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Insert a new row into the message table
    $tableName = "message_" . $username;
    $insertMessageQuery = "INSERT INTO `$tableName` 
    (`sender`, `receivers`, `carboncopy_receivers`, `subject`, `sending_time`, `email_content`) 
    VALUES 
    ('system_mail@voovle.com', '$username@voovle.com', '', 'Changed Information', NOW(), 'Your information was successfully changed')";
    mysqli_query($conn, $insertMessageQuery);

    // Check if the original username exists in 'logged_in_users' table
    $checkQuery = "SELECT * FROM logged_in_users WHERE username='$originalUsername'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Delete the user from 'logged_in_users' table
        $deleteQuery = "DELETE FROM logged_in_users WHERE username='$originalUsername'";
        mysqli_query($conn, $deleteQuery);
        echo "User deleted from logged_in_users table";
    }
} else {
    echo "Failed to retrieve original username";
}

header('Location: view.php');
?>
