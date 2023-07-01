<?php
include("config.php");

$username = $_GET['username'];
$hideStatus = $_GET['hide_status'];

$sql = "CALL update_hide_status(?, ?)";

// Prepare the statement
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the parameters (s for string)
    mysqli_stmt_bind_param($stmt, "ss", $username, $hideStatus);

    // Execute the stored procedure
    if (mysqli_stmt_execute($stmt)) {
        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch the row (in this case, we expect only one row)
        $row = mysqli_fetch_assoc($result);

        // Output the message
        echo $row['message'];
    } else {
        // Error handling in case the stored procedure fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Error handling in case the statement preparation fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>