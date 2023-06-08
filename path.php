<?php
// Check if the requested page/resource exists
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) {
    // Set the HTTP response code to 404
    http_response_code(404);

    // Include the custom 404 error page
    include('404.html');
    exit();
}
?>