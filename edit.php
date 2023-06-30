
<?php include("config.php");
session_start();
$user_id=$_GET["id"];
$_SESSION["eID"]=$user_id;
$sql = " SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $uname = $row["username"];
    $password = $row["password"];
    $tel = $row["tel"];
    $date_of_birth = $row["date_of_birth"];
    $fname = $row["first_name"];
    $lname = $row["last_name"];
    $nick_name = $row["nickname"];
    $codemeli = $row["codemeli"];
    $Addres = $row["address"];
  
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
    <title>Document</title>
</head>
<body>
    <?php include("config.php"); ?>
    <div class= "container form">

        <form action="editfunc.php" method="post">
        <h3>Edit User <?php echo $uname; ?> Data</h3>
        <input type="hidden" value="<?php echo $user_id;?>">
        <a href="view.php"><button type="button" class="btn btn-dark back" href="login.php">back</button></a>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"name="password">
    </div>
    <div class="mb-3">
        <label for="phone" class ="form-label">Phone Number</label>
        <input type="tel" id="phone" class= "form-control" name="phone"  pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{4}" required value="<?php echo $tel;?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address" value="<?php echo $Addres;?>" >
        
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nick Name </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nickname" value="<?php echo $nick_name;?>">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">First Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1"name="first_name" value="<?php echo $fname;?>">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="last_name" value="<?php echo $lname;?>">
    
    </div>
    <div class="mb-3">
        <label for="phone" class ="form-label">Code Melli</label>
        <input type="tel" id="phone" class= "form-control" name="codemeli" placeholder="ex:0045820510"  value="<?php echo $codemeli;?>" pattern="[0-9]{10}" required >
    </div>
    <div class="row g-7 align-items-center weight" >
    <div class="col-auto">
        <label for="Weight" class="col-form-label">Date of Birth</label>
    </div>
    <div class="col-auto">
        <input type="date" id="date_of_birth" class="form-control"name="date_of_birth"  value="<?php echo $date_of_birth;?>" >
    </div>
    </div>
    
    <button type="submit" class="btn btn-primary sub">Submit</button>
    </form>
    </div>
    
</body>
</html>