<?php
include("config.php");
session_start();
$nUid = $_SESSION["eID"];

$password = $_POST['password'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$tel = $_POST['phone'];
$Addres = $_POST['address'];
$codemeli = $_POST['codemeli'];
$nick_name = $_POST['nickname'];
$date_of_birth = $_POST["date_of_birth"];

// Call the stored procedure and pass all the parameters
$stmt = mysqli_prepare($conn, "CALL UpdateUserInfo(?, ?, ?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "issssssss", $nUid, $password, $fname, $lname, $tel, $Addres, $codemeli, $nick_name, $date_of_birth);

if (mysqli_stmt_execute($stmt)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);

header('Location: view.php');
?>
