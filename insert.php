<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<?php
include("config.php");

$password = $_POST['password'];
$ramz_pas = hash('sha256', $password); // Hashed password

// Check if password meets the requirements
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)) {
    echo "<div class='alert alert-danger' role='alert'>
        Password must be at least 8 characters long and contain a combination of letters and numbers.
    </div>";
    exit;
}

$username = $_POST['username'];

// Convert username to lowercase for case-insensitive comparison
$username = strtolower($username);

// Check if the username is at least 6 characters long
if (strlen($username) < 6) {
    echo "<div class='alert alert-danger' role='alert'>
        Username must be at least 6 characters long.
    </div>";
    exit;
}

// Check if the username is already taken
$existingUserQuery = "SELECT * FROM users WHERE LOWER(username) = LOWER('$username')";
$existingUserResult = mysqli_query($conn, $existingUserQuery);

if (mysqli_num_rows($existingUserResult) > 0) {
    echo "<div class='alert alert-danger' role='alert'>
        Username is already taken. Please choose a different one.
    </div>";
    exit;
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$nickname = $_POST['nickname'];
$address = $_POST['address'];
$codemeli = $_POST['codemeli'];
$tel = $_POST['phone'];
$date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth'])); // Format the date

if (empty($username) && empty($password)) {
    echo "<div class='alert alert-warning' role='alert'>
        Please complete the forms.
    </div>";
} else {
    // Insert new user into the 'users' table
    $sql = "INSERT INTO users (username, password, email_address, first_name, last_name, date_of_birth, nickname, address, codemeli, tel) 
            VALUES ('$username', '$ramz_pas', CONCAT('$username', '@voovle.com'), '$first_name', '$last_name', '$date_of_birth', '$nickname', '$address', '$codemeli', '$tel')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        $hideStatus = 'unhide'; // Default hide status
        $hideUsersQuery = "INSERT INTO hide_users (username, hide_status) VALUES ('$username', '$hideStatus')";
        mysqli_query($conn, $hideUsersQuery);

        // Create 'message+$user_id' table for new user
        $user_id = mysqli_insert_id($conn);
        $tableName = "message_" . $username;
        $sqlCreateTable = "CREATE TABLE IF NOT EXISTS `$tableName` (
            `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `sender` VARCHAR(255) NOT NULL,
            `receivers` VARCHAR(255) NOT NULL,
            `carboncopy_receivers` VARCHAR(255),
            `subject` VARCHAR(255) NOT NULL,
            `sending_time` DATETIME NOT NULL,
            `email_content` TEXT NOT NULL
        )";
        mysqli_query($conn, $sqlCreateTable);

        // Create 'sent_message' table for new user
        $tableName2 = "sent_message_" . $username;
        $sqlCreateSentTable = "CREATE TABLE IF NOT EXISTS `$tableName2` (
            `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `sender` VARCHAR(255) NOT NULL,
            `receivers` VARCHAR(255) NOT NULL,
            `carboncopy_receivers` VARCHAR(255),
            `subject` VARCHAR(255) NOT NULL,
            `sending_time` DATETIME NOT NULL,
            `email_content` TEXT NOT NULL
        )";
        mysqli_query($conn, $sqlCreateSentTable);

        // Send welcome email
        $subject = "Welcome to MaalMail";
        $message = "Hello $username, welcome to MaalMail!";
        $headers = "From: your-email@example.com"; // Replace with your email address

        // Use PHP's mail function to send the email
        $insertMessageQuery = "INSERT INTO `$tableName` 
        (`sender`, `receivers`, `carboncopy_receivers`, `subject`, `sending_time`, `email_content`) 
        VALUES 
        ('system_mail@voovle.com', '$username@voovle.com', '', '$subject', NOW(), '$message')";
        mysqli_query($conn, $insertMessageQuery);


    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header('Location: login.php');
}
?>
