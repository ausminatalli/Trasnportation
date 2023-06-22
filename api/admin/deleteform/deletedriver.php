<?php

require_once('../../../config.php');
require('../adminfunctions.php');

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $driverid = isset($_POST["driverid"]) ? $_POST["driverid"] : '';

       
        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM driver WHERE driverid = ?");
        $stmt->bind_param('i', $driverid);
        $stmt->execute();

        // Check if the delete query was successful
        if ($stmt->affected_rows > 0) {
            echo "Driver deleted successfully.";
        } else {
            echo "Driver Cannot be deleted";
            
        }
    }
} catch (Exception $e) {
    // Handle the exception here
    echo 'Driver Cannot be deleted';
}
?>