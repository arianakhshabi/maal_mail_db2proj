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
  <title>Email Sent</title>

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
        height: 650px; /* Adjust the height as per your requirement */
        
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
    <input type="hidden" name="searcher" value="<?php echo $_SESSION['username']; ?>">
    <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container">
  <h1>Sent Emails <?php echo $new_user ?></h1>

  <div class="row ">
    <div class="col-md-2 left-div">
      <div class="list-group">
        <a href="inbox.php" class="list-group-item list-group-item-action">Inbox</a>
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
          Sent
        </a>
        <a href="setting.php?username=<?php echo $new_user; ?>" class="list-group-item list-group-item-action">Settings</a>
        <a href="logout.php" class="list-group-item list-group-item-action logout-button">Logout</a> <!-- Added Logout Button -->
      </div>
    </div>
    <!-- Middle Div for Displaying Sent Emails -->
    <div class="col-md-4 middle-div">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Recipient</th>
            <th scope="col">Time<div class="btn-group">
            <button class="btn btn-sm btn-outline-primary" id="orderButton" onclick="toggleOrder()">Order</button>
          </div></th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Pagination settings
          $rowsPerPage = 10; // Number of rows to display per page
          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
          $order = isset($_GET['order']) ? $_GET['order'] : 'asc'; // Current order (asc or desc)

          
          // Check connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $tableName='sent_message_'.$new_user;
          $sql2 = "CALL GetRowCount('$tableName', @rowCount)";
          mysqli_query($conn, $sql2);

          // Fetch the output parameter value
          $result2 = mysqli_query($conn, "SELECT @rowCount as rowCount");
          $row = mysqli_fetch_assoc($result2);
          $totalRows = $row['rowCount'];
                    
          $sql = "CALL GetSentEmails('$new_user', $currentPage, $rowsPerPage, '$order')";

          $result = mysqli_query($conn, $sql);
          

          while ($row = mysqli_fetch_assoc($result)) {
            $messageId = $row['id'];
            $subject = $row['subject'];
            $recipient = $row['receivers'];
            $sendingTime = $row['sending_time'];
            $seenStatus = $row['seen_status'];
            echo "<tr>";
            echo "<td>$subject</td>";
            echo "<td>$recipient</td>";
            echo "<td>$sendingTime</td>";
            echo "<td>$seenStatus</td>";
            echo "<td>
                    <button class='btn btn-primary'>
                      <a class='text-light text-decoration-none' target='_blank' href='open_sent_message.php?id=$messageId'>Open</a>
                    </button>
                    <button class='btn btn-danger'>
                      <a class='text-light text-decoration-none' target='_blank' href='delete_sent_message.php?id=$messageId'>Delete</a>
                    </button>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>

      <!-- Pagination links -->
      <nav aria-label="Email Pagination">
        <ul class="pagination justify-content-center">
          <?php
          // Calculate the total number of pages
          $totalPages = ceil($totalRows / $rowsPerPage);

          // Display the pagination links
          for ($i = 1; $i <= $totalPages; $i++) {
            $activeClass = ($i == $currentPage) ? "active" : "";
            echo "<li class='page-item $activeClass'><a class='page-link' href='sent.php?page=$i&order=$order'>$i</a></li>";
          }
          ?>
        </ul>
      </nav>
    </div>
    <script>
  function toggleOrder() {
    var currentOrder = "<?php echo $order; ?>";
    var newOrder = (currentOrder === "asc") ? "desc" : "asc";
    window.location.href = "sent.php?page=<?php echo $currentPage; ?>&order=" + newOrder;
  }
</script>

   

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
