


 <link rel="stylesheet" href="form.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body>
    <?php include("config.php"); ?>
    <style>
      body {
        background-color: #f8dfec;
      }
    </style>
    <div class="container form">
        <form action="insert.php" method="post">
        <a href="login.php"><button type="button" class="btn btn-dark back" href="login.php">back</button></a>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"name="password">
    </div>
    <div class="mb-3">
        <label for="phone" class ="form-label">Phone Number</label>
        <input type="tel" id="phone" class= "form-control" name="phone" placeholder="Enter your phone number" pattern="[0]{1}[0-9]{3}[0-9]{3}[0-9]{4}" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nick Name </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nickname">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">First Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1"name="first_name">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="last_name">
    
  </div>

  <div class="mb-3">
        <label for="phone" class ="form-label">Code Melli</label>
        <input type="tel" id="phone" class= "form-control" name="codemeli" placeholder="ex:0045820510" pattern="[0-9]{10}" required>
    </div>
    <div class="row g-7 align-items-center weight" >
    <div class="col-auto">
        <label for="Weight" class="col-form-label">Date of Birth</label>
    </div>
    <div class="col-auto">
        <input type="date" id="date_of_birth" class="form-control"name="date_of_birth" >
    </div>
    </div>
    
    
    
    <button type="submit" class="btn btn-primary sub">Submit</button>
    </form>
    </div>
    
</body>
</html> 