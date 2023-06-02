<?php

include("config.php");
// include("logfunc.php");
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   $user_name=$_POST ['fname'];
//   $email= $_POST ['email'];
//   if(!empty($user_name) && !empty($email) && !is_numeric($user_name)){
//     $sql = "SELECT * FROM users where firstname='$user_name' limit 1";
//     $result=mysqli_query($conn,$sql);
//     if ($result){
//       if ($result && mysqli_num_rows($result) > 0 ){
//         $user_Data=mysqli_fetch_assoc($result);
//         if ($user_Data["email"]===$email){
//           $_SESSION["userid"]=$user_Data["id"];
//           header('Location: users.php');
//           die;
//         }
//      }
//     }
   

//     }else{
//       echo "input valid information";
//     }

// }

?>
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
</head>
<body class="background">
    <div class="logdiv">
    <a href="index.php"><button type="button" class="btn btn-dark backhome" href="index.php">Home</button></a>
      <form action="log2func.php" method="post">
        <div class="form-floating mb-3 container">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"name="email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating container">
          <input type="text" class="form-control" id="floatingPassword" placeholder="UserName" name="fname">
          <label for="floatingPassword">UserName</label>
          <a href="registerform.php">create account</a>
        </div>
        <div class="button">

            <a href="log2func.php"><button type="submit" class="btn btn-primary">login</button></a>
        </div>
        </form>
    </div>
</body>
</html>