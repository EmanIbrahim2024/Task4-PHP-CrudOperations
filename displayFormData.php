
<?php
include "config.php";

$sql = "Select * from studentsInfo";

$sendQury=mysqli_query($conn,$sql);


/////Delete Data if needed

if (isset($_GET['id'])) {
  $user_id = intval($_GET['id']); 
     
      $sql = "DELETE FROM studentsInfo WHERE id = $user_id";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo "<div class='alert alert-success'>Record deleted successfully FROM studentsInfo WHERE id = $user_id</div>";
          header("Location: " . $_SERVER['PHP_SELF']);
        exit();
      } else {
          echo "<div class='alert alert-danger'>Error deleting record: " . mysqli_error($conn) . "</div>";
      }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  </head>
<body>
    <div class='w-50 m-4'>
<div class="mt-2 mb-4 d-flex  justify-content-between">
    <h1>User Details</h1>
   <a href='form.php'> <button type="button" class="btn btn-success">Add new User</button></a>
</div>
<div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Mail Status</th>
      <th scope="col">Action</th>

      
    </tr>
  </thead>
  <tbody>
  <?php
        // Assuming $sendQury contains the result of a SELECT query
        if (mysqli_num_rows($sendQury) > 0) {
            while ($row = mysqli_fetch_assoc($sendQury)) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</th>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                if(htmlspecialchars($row["receive_emails"])==1)
                echo "<td> yes </td>";
                else
                echo "<td> no </td>"; 
                echo "<td>
                <a href='viewStudentsInfo.php?id=" . $row["id"] . "'>
                    <i class='fas fa-eye'></i>
                </a>
                <a href='FormUpdating.php?id=" . $row["id"] . "'>
                    <i class='fas fa-edit'></i>
                </a>
                <a href='" . $_SERVER["PHP_SELF"] . "?id=" . $row["id"] . "'>
                    <i class='fas fa-trash'></i>
                </a>
              </td>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        ?>
  </tbody>
</table>
</div>

</div>
    
</body>
</html>

<?php
mysqli_close($conn);

?>