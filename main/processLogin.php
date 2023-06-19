<?php

include_once '../config.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Prepare the SQL statement
$query = "SELECT * FROM users WHERE email=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($row && password_verify($password, $row['password'])) {

   

    if ($row['isblocked'] == 1) {
        
        header('location:../404.html?msg=blocked');
        exit;
    }


    // Password is correct
    if ($row['role'] == 0 && $row['emailapproved'] == 1) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../user/usermain.php?msg=success');
    } else if ($row['role'] == 0 && $row['emailapproved'] == 0) {
        header('location:registration/verification.php?msg=enter-your-verification-code');
    } else if ($row['role'] == 1) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        $_SESSION["name"] = $row['firstname'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["mobile"] = $row['mobilenumber'];
        header('location:../driver/driver.php?msg=success');
    } else if ($row['role'] == 2) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../admin?msg=welcome-admin');
    } else if ($row['role'] == 9) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:./registration/driverwaiting.php?msg=welcome-new-driver');
    }
} else {
    // Password is incorrect or user doesn't exist
    header('location:login.php?msg=failed');
}

?>
