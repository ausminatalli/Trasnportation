<?php

require_once('../../../config.php');
require('../adminfunctions.php');
require('../../../controller_login/user_functions.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the values from the POST data
$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
$phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : '';
$email = isset($_POST["email"]) ? stripcslashes($_POST["email"]) : '';
$address = isset($_POST["address"]) ? $_POST["address"] : '';
$licenseDate = isset($_POST["licenseDate"]) ? $_POST["licenseDate"] : '';
$password="Skyline2023";
echo $licenseDate;

$data = [
  'firstname' => mysqli_real_escape_string($conn, $firstname),
  'lastName' => mysqli_real_escape_string($conn, $lastname),
  'mobilenumber' => mysqli_real_escape_string($conn, $phoneNumber ),
  'email' => mysqli_real_escape_string($conn, $email),
  'useraddress' => mysqli_real_escape_string($conn, $address),
  'licensedate' => mysqli_real_escape_string($conn, $licenseDate),
  'birthdate' => mysqli_real_escape_string($conn, '1970-07-02'),
  'licenseUrl' => mysqli_real_escape_string($conn, ''),
  'about' => mysqli_real_escape_string($conn, ''),
  'role' => mysqli_real_escape_string($conn, '1'),
  'city' => mysqli_real_escape_string($conn, ''),
  'generatedID' => generateId(0),
  'isaccepted' => mysqli_real_escape_string($conn, '1'),
  'hashedPassword' => password_hash( mysqli_real_escape_string($conn, stripcslashes($password)), PASSWORD_DEFAULT),
]; 

addUser($conn,$data);
header('location:../../../admin?msg=newdriver');
}
?>