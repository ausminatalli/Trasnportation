<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function sendVerificationEmail($email, $verificationCode) {
    // Include the sendmail.php file
    require('../../sendmail.php');

    // Prepare the email content
    $to = $email;
    $cc = "cc@example.com";
    $subject = "Skyline Email Verification";
    $message = "
    <div style='width: 100%; background-color:#E5F6FF;padding:10px;border-radius:5px;'>
        <h3 style='color: #0A3B5F;text-align: center;'>Here is the confirmation code to join Skyline:</h2>
        <h1 style='color: black;text-align: center;'>" . $verificationCode . "</h1>
        <h4 style='color: #0A3B5F; text-align: center;'>All you have to do is copy the confirmation code and paste it into your form to complete the email verification process.</h4>
    </div>
    ";

    // Send the email
    sendEmailWithCC($to, $cc, $subject, $message);
}
?>

</body>
</html>