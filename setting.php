<?php
include("config.php");
?>

<?php
session_start();
$username = $_GET['username']; // Retrieve the username from the query parameter

// Rest of your code

?>
<?php
$sql = "SELECT * FROM users where username= '$username'";
$result = mysqli_query($conn, $sql);
?>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="setting.css">
<style>
    body {
        padding: 20px;
    }

    .logout-button {
        background-color: red;
        color: white;
    }

    .left-div {
        height: calc(100vh - 56px); /* Adjust the value as needed */
    }

    .form-check-label {
        font-size: 16px; /* Adjust the value as needed */
    }

    /* Additional CSS */
    .table-responsive {
        overflow-x: auto;
    }

    .table-checkbox {
        width: 30px;
        height: 30px;
    }
</style>

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
    <div class="row">
        <!-- Left Div for Selecting Inbox, Sent, and Settings -->
        <div class="col-md-3 left-div">
            <div class="list-group">
                <a href="inbox.php" class="list-group-item list-group-item-action">Inbox</a>
                <a href="sent.php" class="list-group-item list-group-item-action">Sent</a>
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Settings</a>
                <a href="logout.php" class="list-group-item list-group-item-action logout-button">Logout</a>
                <!-- Added Logout Button -->
            </div>
        </div>

        <!-- Right Div for Displaying Information in the Settings Page -->
        <div class="col-md-9 right-div">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Settings</h5>
                </div>
                <div class="card-body">
                    <!-- Display information or settings options here -->
                    <p>Some information or settings content goes here.</p>
                    <h1> salam <?php echo $username; ?></h1>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="hide-info-checkbox" onchange="toggleSearchVisibility(this)">
                        <label class="form-check-label" for="hide-info-checkbox">Hide Information from Search</label>
                    </div>
                    <h4>
                    <?php
                      $sql_status = "SELECT hide_status FROM hide_users WHERE username = '$username'";
                      $result_status = mysqli_query($conn, $sql_status);
                      $hideStatus = ""; // Initialize the variable

                      if ($result_status && mysqli_num_rows($result_status) > 0) {
                          $row_status = mysqli_fetch_assoc($result_status);
                          $hideStatus = $row_status['hide_status'];
                          echo "status: " . $hideStatus;
                      } else {
                          echo "No status found";
                      }
                      ?>

                    </h4>

                    <script>
                        function toggleSearchVisibility(checkbox) {
                            var hideStatus = checkbox.checked ? 'hide' : 'unhide';

                            // Send AJAX request to update hide_status
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    console.log('Hide status updated successfully');
                                }
                            };
                            xhttp.open('GET', 'update_hide_status.php?username=<?php echo $username; ?>&hide_status=' + hideStatus, true);
                            xhttp.send();
                        }
                    </script>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">FirstName</th>
                                    <th scope="col">LastName</th>
                                    <th scope="col">DateofBirth</th>
                                    <th scope="col">codemeli</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            
                                            <th scope="row"><?php echo $row["user_id"] ?></th>
                                            <td><?php echo $row["username"] ?></td>
                                            <td><?php echo $row["email_address"] ?></td>
                                            <td><?php echo $row["first_name"] ?></td>
                                            <td><?php echo $row["last_name"] ?></td>
                                            <td><?php echo $row["date_of_birth"] ?></td>
                                            <td><?php echo $row["codemeli"] ?></td>
                                            <td><?php echo $row["created_at"] ?></td>
                                            <td><button type="button" class="btn btn-outline-warning"><a class="text-warning text-decoration-none" target="_blank" href="edit.php?id=<?php echo $row["user_id"] ?>">Edit</a></button></td>
                                            <td><button type="button" class="btn btn-danger"><a class="text-light text-decoration-none" target="_blank" href="delete.php?id=<?php echo $row["user_id"] ?>">Delete</a></button></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "
                                    <svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>
                                        <symbol id='exclamation-triangle-fill' viewBox='0 0 16 16'>
                                            <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                                        </symbol>
                                    </svg>
                                    <div class='alert alert-warning d-flex align-items-center' role='alert'>
                                        <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                                        <div>
                                            <h1>There's no data in the database.</h1>
                                        </div>
                                    </div>";
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
