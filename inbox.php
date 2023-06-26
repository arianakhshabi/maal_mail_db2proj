<?php
session_start();
$new_user = $_SESSION["username"];

include("config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Inbox</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

  <!-- Custom styles -->
  <style>
      body {
        padding: 20px;
      }

      .logout-button {
        background-color: red;
        color: white;
      }

      .middle-div {
        width: 60%;
        height: 800px; /* Adjust the height as per your requirement */
        overflow-y: scroll;
        padding-left: 20px;
        margin: 0 auto;
      }

      .left-div {
        width: 15%;
        position: absolute;
        left: 20px;
      }
      .right-div{
        margin-left:20px
      }
</style>


</head>

<body>
<nav class="navbar" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MaaLmail</a>
    <form class="d-flex" role="search" action="search.php" method="GET">
      <input class="form-control me-2" type="search" placeholder="username" aria-label="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
  <h1>Email Inbox <?php echo $new_user ?></h1>

  <div class="row ">
    <div class="col-md-2 left-div">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          Inbox
        </a>
        <a href="#" class="list-group-item list-group-item-action">Sent</a>
        <a href="setting.php?username=<?php echo $new_user; ?>" class="list-group-item list-group-item-action">Settings</a>
        <a href="logout.php" class="list-group-item list-group-item-action logout-button">Logout</a> <!-- Added Logout Button -->
      </div>
    </div>
    <!-- Middle Div for Displaying Emails -->
    <div class="col-md-4 middle-div">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Sender</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Code to retrieve and display emails goes here
          $tableName = "message_" . $new_user;
          $selectQuery = "SELECT subject, sender, sending_time FROM `$tableName`";
          $result = mysqli_query($conn, $selectQuery);
          while ($row = mysqli_fetch_assoc($result)) {
            $subject = $row['subject'];
            $sender = $row['sender'];
            $sendingTime = $row['sending_time'];
            echo "<tr>";
            echo "<td>$subject</td>";
            echo "<td>$sender</td>";
            echo "<td>$sendingTime</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Right Div for Sending Email -->
    <div class="col-md-4 right-div">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Compose Email</h5>
        </div>
        <div class="card-body">
          <form action="send_email.php" method="post">
            <div class="mb-3">
              <label for="recipient" class="form-label">Recipient:</label>
              <input type="email" class="form-control" id="recipient" name="recipient">
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject:</label>
              <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
              <label for="content" class="form-label">Content:</label>
              <textarea class="form-control" id="content" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
