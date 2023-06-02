<link rel="stylesheet" href="form.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<body>
    <?php include("config.php"); ?>
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
        <label for="exampleInputPassword1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email_address" >
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">First Name</label>
        <input type="text" class="form-control" id="exampleInputPassword1"name="first_name">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="last_name">
    
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