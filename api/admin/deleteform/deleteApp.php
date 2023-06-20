<?php
require('../../../sendmail.php');
require('../../../config.php');

if (isset($_POST['driverid'])) {
    $userId = $_POST['driverid'];
    $email =$_POST['email'];
    $subject = "Application Status Notification";
    $cc ="teamesamailer@gmail.com";

    $sql = "UPDATE driver SET accepted = 1 WHERE driverid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    $response = array();

    if ($stmt->execute()) {
        $response['success'] = true;
        sendEmailWithCC($email, $cc, $subject, $message);
        $message = "Dear Applicant,\n\nUnfortunately, You have been rejected.";
        $response['message'] = 'Driver rejected successfully.';
    } else {
        $response['success'] = false;
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false);
}

header('Content-Type: application/json');
echo json_encode($response);
?>
