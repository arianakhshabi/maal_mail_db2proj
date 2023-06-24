<?php
include("config.php");

// Check if the logged_in_users table has any rows
$checkSql = "SELECT COUNT(*) as count FROM logged_in_users";
$checkResult = mysqli_query($conn, $checkSql);
$countRow = mysqli_fetch_assoc($checkResult);
$count = $countRow['count'];

if ($count == 0) {
    // Show the login form
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <style>
            body.background {
                background-color: #f8dfec;
            }

            div.logdiv {
                background-color: #DFF8EB;
                border-radius: 10px;
                width: 700px;
                margin: 100px auto;
                padding: 20px;
                width: 50%;
                padding-bottom: 20px;
                z-index: 5;
                box-shadow: 5px 10px #888888;
            }

            div.button {
                margin: auto;
                text-align: center;
            }

            button.backhome {
                margin-bottom: 10px;
            }

            a.backhome {
                margin-left: 15px;
            }
        </style>
    </head>
    <body class="background">
        <div class="logdiv">
        <a href="index.php"><button type="button" class="btn btn-dark backhome" href="index.php">Home</button></a>
          <form action="logfunc.php" method="post">
            <div class="form-floating mb-3 container">
              <input type="text" class="form-control" id="floatingInput" placeholder="UserName" name="username">
              <label for="floatingInput">UserName</label>
            </div>
            <div class="form-floating container">
              <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password">
              <label for="floatingPassword">Password</label>
              <a href="registerform.php">create account</a>
            </div>
            <div class="button">
                <a href="logfunc.php"><button type="submit" class="btn btn-primary">login</button></a>
            </div>
            </form>
        </div>
    </body>
    </html>';
} else {
    // Redirect the user to inbox.php
    header('Location: inbox.php');
    exit();
}
?>
