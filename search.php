<?php
// Retrieve the search query from the GET parameters
$searchQuery = $_GET['search'];

// Perform the necessary database query using the search query

// Assuming you have a database connection established, you can modify the following code to perform the search query
include("config.php");

// Construct the SQL query
$sql = "SELECT * FROM users WHERE username LIKE '%$searchQuery%'";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    // Display the search results
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the user information from the $row variable
        $username = $row['username'];
        $email = $row['email'];

        // Display the user information
        echo "<p>Username: $username</p>";
        echo "<p>Email: $email</p>";
        echo "<hr>";
    }
} else {
    // No results found
    echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
