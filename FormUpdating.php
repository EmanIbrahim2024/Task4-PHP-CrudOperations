<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    $stmt = $conn->prepare("SELECT * FROM studentsInfo WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $agree=$_POST["agree"]? 1:0;
    $stmt = $conn->prepare("UPDATE studentsInfo SET name=?, email=?, gender=?, receive_emails=? WHERE id=?");
    $stmt->bind_param("ssssi", $_POST["studentName"], $_POST["email"], $_POST["Gender"], $agree,($_GET['id']));
    if ($stmt->execute()) {
        header("Location: displayFormData.php");
        exit;
    } else {
        error_log("Error updating record: " . $stmt->error);
        echo "<div class='m-4'>An error occurred. Please try again later.</div>";
    }
    $stmt->close();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class='m-4'>
        <h1>User Registration Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . htmlspecialchars($user_id, ENT_QUOTES, 'UTF-8'); ?>" method="POST">
            <label for='studentName'>Name</label><br>
            <input type='text' name='studentName' id='studentName' class='mb-2' required value="<?php echo isset($row) ? htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') : ''; ?>"><br>
            
            <label for='Email'>Email</label><br>
            <input type='email' name='email' id='Email' class='mb-2' required value="<?php echo isset($row) ? htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') : ''; ?>"><br>
            
            <label for='Gender'>Gender</label><br>
            <input type="radio" name="Gender" value="Female" id='Gender' <?php echo (isset($row["gender"]) && $row["gender"] === 'Female') ? 'checked' : ''; ?>> Female<br>
            <input type="radio" name="Gender" value="Male" class='mb-2' <?php echo (isset($row["gender"]) && $row["gender"] === 'Male') ? 'checked' : ''; ?>> Male<br>
            
            <input type="checkbox" name="agree" id="agree" class='mb-4' <?php echo (isset($row['receive_emails']) && $row['receive_emails'] == 1) ? 'checked' : ''; ?>>
            <label for="agree">Receive Emails from Us</label><br>
            
            <input type="submit" class="btn btn-success" name="submit" value="Submit" class='mb-2'>
        </form>
    </div>
</body>
</html>
