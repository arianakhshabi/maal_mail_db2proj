<?php
include("config.php");
session_start();

$username = $_SESSION["username"];

$sql = "CALL logout_user(?)";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "s", $username);

// Execute the stored procedure
if (mysqli_stmt_execute($stmt)) {

    session_destroy();

    header("Location: index.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>