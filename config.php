<?php

//////Apply Connection

$serverName='localhost';
$userName='root';
$password='';
$conn=mysqli_connect($serverName,$userName,$password);
if(!$conn)
{
    echo "Error Unable to connect";
    exit;
}
//echo "connection is done";



/////////create Database in server

$dbStudentRgest = 'student_registration'; 

// $sql="create database $dbStudentRgest";
// $sendQury=mysqli_query($conn,$sql);
// if(!$sendQury){

//     echo " <br> Error Unable to create DB :$dbStudentRgest";
//     exit;
// }
// echo "<br> create DB :$dbStudentRgest Successfuly";


//////////////Create Table studentsInfo

mysqli_select_db($conn,$dbStudentRgest);
// $sql="CREATE TABLE studentsInfo (
//     id INT AUTO_INCREMENT PRIMARY KEY, 
//     name VARCHAR(100) NOT NULL, 
//     email VARCHAR(150) NOT NULL UNIQUE, 
//     gender ENUM('Male', 'Female', 'Other') NOT NULL, 
//     receive_emails BOOLEAN NOT NULL DEFAULT 0
// )";
// $sendQury=mysqli_query($conn,$sql);
// if(!$sendQury){

//     echo " <br> Error Unable to create Table in DB :$dbStudentRgest";
//     exit;
// }
// echo "<br> create Table in DB :$dbStudentRgest Successfuly";

///////////// insert Data in table




//mysqli_close($conn);












?>