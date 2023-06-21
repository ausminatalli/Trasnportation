<?php

require_once('../../../config.php');

if (isset($_POST['driverid'])) {
    $driverId = $_POST['driverid'];
    $response = array();

    try {
        // Check if the driver is assigned to a bus
        $sql = "SELECT busid FROM bus WHERE driverid = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param("s", $driverId);
        $stmt->execute();
        $stmt->bind_result($busId);

        if ($stmt->fetch()) {
            $sql = "DELETE FROM bus WHERE driverid = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $stmt->bind_param("s", $driverId);

            if ($stmt->execute()) {
               
                $sql = "DELETE FROM driver WHERE driverid = ?";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    throw new Exception('Prepare failed: ' . $conn->error);
                }

                $stmt->bind_param("s", $driverId);

                if ($stmt->execute()) {
                    // Update the user's role in the users table
                    $sql = "UPDATE users SET role = 0 WHERE userid = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $driverId);

                    if ($stmt->execute()) {
                        $response['success'] = true;
                        $response['message'] = 'Driver and associated bus deleted successfully.';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'Failed to update user role.';
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Failed to delete driver entry.';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to delete associated bus.';
            }
        } else {
           
            $sql = "DELETE FROM driver WHERE driverid = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            $stmt->bind_param("s", $driverId);

            if ($stmt->execute()) {
                
                $sql = "UPDATE users SET role = 0 WHERE userid = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $driverId);

                if ($stmt->execute()) {
                    $response['success'] = true;
                    $response['message'] = 'Driver deleted successfully.';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Failed to update user role.';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Failed to delete driver entry.';
            }
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = 'An error occurred: ' . $e->getMessage();
    }
} else {
    $response = array('success' => false, 'message' => 'Missing driverid parameter.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>