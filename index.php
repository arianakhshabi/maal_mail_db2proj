<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kaykogym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>
<body>

<?php include("navbar.php");?>
<br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maal_mail_database";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//dfsmdfdkfj
// $sql = "CREATE TABLE Users (
//   user_id INT AUTO_INCREMENT PRIMARY KEY,
//   username VARCHAR(50) NOT NULL,
//   password VARCHAR(255) NOT NULL,
//   email_address VARCHAR(255) NOT NULL,
//   first_name VARCHAR(50),
//   last_name VARCHAR(50),
//   date_of_birth DATE,
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//   updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table Users created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

mysqli_close($conn);
?>

<h1>mall mail
</h1>

<h1>dfj</h1>
<?php include("footer.php");?>

</body>
</html>