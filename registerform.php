<body>
    <?php include("config.php"); ?>
    <div class="container form">
        <form action="insert.php" method="post">
        <a href="login.php"><button type="button" class="btn btn-dark back" href="login.php">back</button></a>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fname">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">LastName</label>
        <input type="text" class="form-control" id="exampleInputPassword1"name="lname">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Telephone</label>
        <input type="tel" class="form-control" id="exampleInputPassword1 "name="tel" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleInputPassword1"name="addres">
    </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
    <div class="row g-7 align-items-center weight" >
    <div class="col-auto">
        <label for="Weight" class="col-form-label">Weight</label>
    </div>
    <div class="col-auto">
        <input type="number" id="Weight" class="form-control"name="weight" >
    </div>
    </div>
    <div class="row g-7 align-items-center Height">
    <div class="col-auto">
        <label for="height" class="col-form-label">Height</label>
    </div>
    <div class="col-auto">
        <input type="number" id="height" class="form-control" name="height">
    </div>
    </div>
    
    
    <button type="submit" class="btn btn-primary sub">Submit</button>
    </form>
    </div>
    
</body>
</html>