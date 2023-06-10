<?php

require('controller_login/user_functions.php');

require_once 'env.php';
loadEnv(__DIR__ . '/.env');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];
    $cloudName = $_ENV['cloudName'];
    $apiKey = $_ENV['cloudapiKey'];
    $apiSecret = $_ENV['cloudapiSecret'];

    // Call the uploadFileToCloudinary function
    $response = uploadFileToCloudinary($cloudName, $apiKey, $apiSecret, $file);

    // Handle the response
   // Handle the response
$responseData = json_decode($response, true);

if (isset($responseData['secure_url'])) {
    $secureUrl = $responseData['secure_url'];

    // Output the secure URL
    echo "Uploaded file URL: " . $secureUrl;
} else {
    echo "Upload failed. Response: " . $response;
}

}
?>
