<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<?php
include("config.php");

$password = $_POST['password'];


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
    $stmt = mysqli_prepare($conn, "CALL sp_register_user(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $password, $first_name, $last_name, $nickname, $address, $codemeli, $tel, $date_of_birth);

    if (mysqli_stmt_execute($stmt)) {
        echo "New record created successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

    header('Location: login.php');
}
?>
