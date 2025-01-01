
<?php
include "config.php";

$sql = "Select * from studentsInfo";

$sendQury=mysqli_query($conn,$sql);

// if(!$sendQury){

//     echo " <br> Error Unable to  Select Table studentsInfo ";
//     exit;
// }
// echo "<br> Select Data In Table studentsInfo Successfuly";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class='w-50 m-4'>
<div class="mt-2 mb-8 d-flex  justify-content-between">
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
    </tr>
  </thead>
  <tbody>
  <?php
        // Assuming $sendQury contains the result of a SELECT query
        if (mysqli_num_rows($sendQury) > 0) {
            while ($row = $sendQury->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</th>";
                echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
                if(htmlspecialchars($row["receive_emails"])==1)
                echo "<td> yes </td>";
                else
                echo "<td> no </td>";     
                echo "</tr>";
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