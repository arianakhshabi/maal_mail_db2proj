<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<?php include("config.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nickname = $_POST['nickname'];
    $address = $_POST['address'];
    $codemeli = $_POST['codemeli'];
    $tel=$_POST['phone'];
    $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth'])); // Format the date
    
   
    // Rest of your code to execute the SQL query and handle any errors
    // bayad jadval ra avaz konim va chand fild bayad ezafe shavad
    // dastoorat : ALTER TABLE `users` ADD address varchar(256);
    //ALTER TABLE `users` ADD tel varchar(20);
    //ALTER TABLE `users` ADD codemeli varchar(20); va nickname
    if (empty($username and $password)){
      echo "<div class='alert alert-warning' role='alert'>
      Please complete forms
      </div>";
    }
    else{

      $sql = "INSERT INTO users (username, password, email_address, first_name, last_name, date_of_birth, nickname, address, codemeli, tel) 
        VALUES ('$username', '$password', CONCAT('$username', '@voovle.com'), '$first_name', '$last_name', '$date_of_birth', '$nickname', '$address', '$codemeli', '$tel')";

      
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      header('Location: login.php');
    }

    ?>