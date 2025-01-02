<?php
include "config.php";

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); 
    $sql = "SELECT * FROM studentsInfo WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "User not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
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
    <div class='m-4'>
    <h1 class='mb-4'>User with id : <?php echo  htmlspecialchars($row['id']);?> Details</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($row['id']); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($row['gender']); ?></p>
    <p><strong>Mail Status:</strong> <?php echo $row['receive_emails'] == 1 ? 'Yes' : 'No'; ?></p>
    <a href="displayFormData.php" class='btn btn-primary'>Back </a>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
