<?php
//generates Random ID for the role
function generateId($role) {
     $prefix;
     $randomDigits;
    
    if ($role === 0) {
      $prefix = '1';
    } else if ($role === 1) {
      $prefix = '2';
    } else if ($role === 2) {
      $prefix = '3';
    } else {
      return "Invalid role";
    }
  
    $randomDigits = strval(mt_rand(10000000, 99999999));
    return $prefix . $randomDigits;
  }

//Check if MobileNb exists

function existingMobile($conn,$mobileNb)
{
$query = "SELECT * FROM users WHERE mobilenumber='$mobileNb'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if($row)
{
    return true;
}
else
    return false;
}
  
//Check if Email exists

function existingEmail($conn,$email)
{
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
if($row)
{
    return true;
}
else
    return false;
}

//add user according to rule

function addUser($conn,$data)
{
    if ($data['role'] == 0) {
        $generatedId = $data['generatedID'];
        $firstname = $data['firstname'];
        $lastname = $data['lastName'];
        $mobilenumber = $data['mobilenumber'];
        $email = $data['email'];
        $city = $data['city'];
        $useraddress = $data['useraddress'];
        $birthdate = $data['birthdate'];
        $hashedPassword = $data['hashedPassword'];

        $sql = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password) VALUES ('$generatedId', '$firstname', '$lastname', '$mobilenumber', '$email', '$city', '$useraddress', '$birthdate', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            echo "User added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

  ?>


