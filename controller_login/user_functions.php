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

function existingMobile($conn, $mobileNb)
{
    $query = "SELECT * FROM users WHERE mobilenumber=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $mobileNb);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($row) {
        return true;
    } else {
        return false;
    }
}

  
//Check if Email exists

function existingEmail($conn, $email)
{
    $query = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($row) {
        return true;
    } else {
        return false;
    }
}


//add user according to rule

function addUser($conn, $data)
{
    $generatedId = $data['generatedID'];
        $firstname = $data['firstname'];
        $lastname = $data['lastName'];
        $mobilenumber = $data['mobilenumber'];
        $email = $data['email'];
        $city = $data['city'];
        $useraddress = $data['useraddress'];
        $birthdate = $data['birthdate'];
        $hashedPassword = $data['hashedPassword'];
    if ($data['role'] == 0) {

        $sql = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssss", $generatedId, $firstname, $lastname, $mobilenumber, $email, $city, $useraddress, $birthdate, $hashedPassword);

        if (mysqli_stmt_execute($stmt)) {
            echo "User added successfully.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    }
    else if($data['role'] == 1)
    {
        $licensedate = $data['licensedate'];
        $licenseUrl = $data['licenseUrl'];
        $about = $data['about'];
        $role = $data['role'];
       // User insertion
       $sqlUser = "INSERT INTO users (userid, firstname, lastname, mobilenumber, email, city, address, birthdate, password,role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
       $stmtUser = mysqli_prepare($conn, $sqlUser);
       mysqli_stmt_bind_param($stmtUser, "sssssssss", $generatedId, $firstname, $lastname, $mobilenumber, $email, $city, $useraddress, $birthdate, $hashedPassword,$role);

       if (mysqli_stmt_execute($stmtUser)) {
        echo "User added successfully.";
       } else {
        echo "Error: " . mysqli_stmt_error($stmtUser);
      }

       mysqli_stmt_close($stmtUser);

      // Driver insertion
      $sqlDriver = "INSERT INTO driver (driverid, licensedate, licenseexpiry, LicenseUrl, about) VALUES (?, ?, ?, ?, ?)";
      $stmtDriver = mysqli_prepare($conn, $sqlDriver);
      mysqli_stmt_bind_param($stmtDriver, "ssssss", $generatedId, $licensedate, $licenseexpiry, $licenseUrl, $about);

      if (mysqli_stmt_execute($stmtDriver)) {
      echo "Driver added successfully.";
      } else {
       echo "Error: " . mysqli_stmt_error($stmtDriver);
      }

      mysqli_stmt_close($stmtDriver);

    }
}





function uploadFileToCloudinary($cloudName, $apiKey, $apiSecret, $file)
{
    $uploadUrl = 'https://api.cloudinary.com/v1_1/' . $cloudName . '/image/upload';
    $timestamp = time();
    $signature = sha1('timestamp=' . $timestamp . $apiSecret);

    $postData = array(
        'file' => curl_file_create($file['tmp_name']),
        'api_key' => $apiKey,
        'timestamp' => $timestamp,
        'signature' => $signature
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $uploadUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}



?>

  


