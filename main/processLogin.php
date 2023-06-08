<?php

include_once '../config.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = stripcslashes($email);
$password = stripcslashes($password);



$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($row) {
    if ($row['role'] == 0) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../user/usermain.php?msg=success');
    } else if ($row['role'] == 1) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../driver/driver.php?msg=success');
    }
    else if ($row['role'] == 2) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:../admin?msg=welcome-admin');
    }  else if ($row['role'] == 9) {
        session_start();
        $_SESSION["id"] = $row['userid'];
        $_SESSION["type"] = $row['role'];
        header('location:./registration/driverwaiting.php?msg=welcome-new-driver');
    }
} else {
    header('location:login.php?msg=failed');
}

?>
