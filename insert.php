<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
<?php include("config.php");
    
    $username= $_POST ['fname'];
    $password= $_POST ['lname'];
    $email_address= $_POST ['email'];
    $first_name= $_POST ['tel'];
    $last_name= $_POST ['addres'];
    $date_of_birth= $_POST ['weight'];
    
    if (empty($fname and $password)){
      echo "<div class='alert alert-warning' role='alert'>
      Please complete forms
      </div>";
    }
    else{

      $sql = "INSERT INTO users (username, password, email_address, first_name, last_name, date_of_birth)
      VALUES ('$fname', '$lname', '$email','$tel','$Addres',$weight,$height)";
      
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      header('Location: login.php');
    }

    ?>