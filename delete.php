<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 <?php 
        include("config.php");
        $user_id=$_GET["id"];
        
        $sql = "DELETE FROM users WHERE user_id='$user_id'";

        if (mysqli_query($conn, $sql)) {
          echo "<div class='alert alert-warning' role='alert'>
          one reccord deleted
        </div>";
        } else {
          echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header('Location: index.php');
?>