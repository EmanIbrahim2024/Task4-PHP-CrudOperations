


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class='m-4'>
    <h1>User Registration Form</h1>
<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="StudentsInfo"  >
    <label for='studentName'>Name</label><br>
    <input type='text' name='studentName' id='studentName' class='mb-2' required > <br>
    <label for= 'Email'>Email</label><br>
    <input type='email' name='email' id='Email' class='mb-2' required> <br>
    <label for= 'Gender'>Gender</label><br>
    <input type="radio" name="Gender" value="Female" id='Gender' > 
    <label>Female</label><br>
    <input type="radio" name="Gender" value="Male" class='mb-2' >
    <label>Male</label><br>
    <input type="checkbox" name="agree" id="agree" class='mb-4'>
    <label for="agree">Recieve Emails from Us</label><br>
    <input type="submit" class="btn btn-success" name="submit" value="Submit" class='mb-2'>
</form> 
</div>  
</body>
</html>
<?php

include "config.php";
if($_SERVER["REQUEST_METHOD"] == 'POST' ){
    $name = mysqli_real_escape_string($conn, $_POST["studentName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $gender = mysqli_real_escape_string($conn, $_POST["Gender"]);
    $agree = isset($_POST["agree"]) ? 1 : 0; // Convert checkbox value to 1 or 0
}

if (empty($name) || empty($email) || empty($gender)) {
    echo " <div class='m-4 '> All fields are required! </div>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == 'POST' ) {
    

$sql = "INSERT INTO studentsInfo (name, email, gender, receive_emails) 
        VALUES ('$name', '$email', '$gender', $agree)";

$sendQury=mysqli_query($conn,$sql);

if(!$sendQury){

    echo " <br> Error Unable to  Insert Data In Table studentsInfo ";
    exit;
}
// echo "<br> Insert Data In Table studentsInfo Successfuly";


/////// After Success Sending data go to displayFormData

header("Location: displayFormData.php");
        exit;

}

    ?>


