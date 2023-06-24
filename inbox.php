<?php
session_start();
$new_user=$_SESSION["username"];

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

    .list-group-item {
      border-radius: 0 !important;
    }

    .list-group-item:not(:last-child) {
      margin-bottom: 10px;
    }

    .list-group-item.active {
      background-color: #C8F4F9 !important;
      border-color: #C8F4F9 !important;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Email Inbox  <?php echo $new_user?></h1>

    <div class="row">
      <div class="col-md-4">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            Inbox
          </a>
          <a href="#" class="list-group-item list-group-item-action">Sent</a>
          <a href="#" class="list-group-item list-group-item-action">Drafts</a>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Email Subject</h5>
            <h6 class="card-subtitle mb-2 text-muted">Sender: sender@example.com</h6>
          </div>
          <div class="card-body">
            <p class="card-text">Email content goes here.</p>
          </div>
        </div>

        <!-- More emails can be added here -->

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
