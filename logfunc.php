<?php
include("config.php");
session_start();
$U_name = $_POST['username'];
$p_pass = $_POST['password'];

// Call the stored procedure
$stmt = mysqli_prepare($conn, "CALL LoginUser(?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $U_name, $p_pass);
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $status, $redirect_url);

// Fetch the results from the stored procedure
mysqli_stmt_fetch($stmt);

// Check the status returned by the stored procedure
if ($status === 'Success') {
    // Store the user's username in the session
    $_SESSION["username"] = $U_name;

    // Redirect to the inbox page
    header("Location: $redirect_url");
    exit(); // Make sure to add exit() after header redirect
} else {
    echo "<div class='alert alert-warning' role='alert'>$status</div>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
