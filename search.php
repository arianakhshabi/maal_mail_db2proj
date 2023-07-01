<?php
// Retrieve the search query from the GET parameters
$searchQuery = $_GET['search'];
$searcher = $_GET['searcher'];
// Perform the necessary database query using the search query
include("config.php");

// Construct the SQL query with a join between users and hide_users tables
$sql2 = "CALL show_SearchUsers('$searchQuery', '$searcher')";
$result2 = mysqli_query($conn, $sql2);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="view.css">
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
<div class='container t1'>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">FirstName</th>
        <th scope="col">LastName</th>
        <th scope="col">DateofBirth</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
       
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result2) > 0) {
        // Initialize a row counter
        $rowNumber = 1;

        // output data of each row
        while ($row = mysqli_fetch_assoc($result2)) {
          // Display the data for each row in the table
          echo "<tr>";
          echo "<td>" . $rowNumber . "</td>";
          echo "<td>" . $row["username"] . "</td>";
          echo "<td>" . $row["email_address"] . "</td>";
          echo "<td>" . $row["first_name"] . "</td>";
          echo "<td>" . $row["last_name"] . "</td>";
          echo "<td>" . $row["date_of_birth"] . "</td>";
          echo "<td>" . $row["created_at"] . "</td>";
          echo "<td>" . $row["updated_at"] . "</td>";
          echo "</tr>";

          // Increment the row counter for the next row
          $rowNumber++;
        }

        // Display the total number of results found
      } else {
        echo "
        <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
          <symbol id='exclamation-triangle-fill' viewBox='0 0 16 16'>
            <!-- Your SVG code for the exclamation-triangle icon -->
          </symbol>
        </svg>
        <div class='alert alert-warning d-flex align-items-center' role='alert'>
          <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
          <div>
            <h1>No data in the database</h1>
          </div>
        </div>";
      }
      mysqli_close($conn);
      ?>
    </tbody>
  </table>
</div>