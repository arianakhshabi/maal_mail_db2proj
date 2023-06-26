<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<?php include("config.php");
   
    $password = $_POST['password'];
    $ramz_pas = hash('sha256', $password);// hash gozari shode 
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
        VALUES ('$username', '$ramz_pas', CONCAT('$username', '@voovle.com'), '$first_name', '$last_name', '$date_of_birth', '$nickname', '$address', '$codemeli', '$tel')";

      
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        $hideStatus = 'unhide'; // Default hide status
        $hideUsersQuery = "INSERT INTO hide_users (username, hide_status) VALUES ('$username', '$hideStatus')";
    mysqli_query($conn, $hideUsersQuery);
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      header('Location: login.php');
    }

    ?>