<?php
include('../config.php');
include('../controller_login/user_functions.php');

$data = [
    'firstname' => mysqli_real_escape_string($conn, $_POST['firstname']),
    'lastName' => mysqli_real_escape_string($conn, $_POST['lastName']),
    'mobilenumber' => mysqli_real_escape_string($conn, $_POST['number']),
    'hashedPassword' => password_hash( mysqli_real_escape_string($conn, stripcslashes($_POST['password'])), PASSWORD_DEFAULT),
];


if(existingMobile($conn,$data['mobilenumber'])){
    header('location:editprofile.php?msg=Mobilefailed');
}
else
{
    editprofile($conn,$data);
    header('location:editprofile.php?msg=edit_success');
} 

// Close the database connection
$conn->close();
?>