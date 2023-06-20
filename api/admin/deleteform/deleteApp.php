<?php
require('../../../sendmail.php');
require('../../../config.php');

if (isset($_POST['driverid'])) {
    $userId = $_POST['driverid'];
    $email = $_POST['email'];
    $subject = "Application Status Notification";
    $cc = "teamesamailer@gmail.com";
    $message = "Dear Applicant,\n\nUnfortunately, you have been rejected.";

    // Delete the driver entry from the 'driver' table
    $sql = "DELETE FROM driver WHERE driverid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);

    $response = array();

    if ($stmt->execute()) {
        // Update the user's role in the 'users' table to 0 (assuming 0 represents a rejected status)
        $sql = "UPDATE users SET role = 0 WHERE userid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $userId);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            sendEmailWithCC($email, $cc, $subject, $message);
            $response['message'] = 'Driver rejected successfully.';
        } else {
            $response['success'] = false;
            $response['message'] = 'Failed to update user role.';
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to delete driver entry.';
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array('success' => false, 'message' => 'Missing driverid parameter.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
