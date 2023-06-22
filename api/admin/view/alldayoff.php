<?php
// Connect to MySQL database
require('../../../config.php')
?>
<?php
// Fetch data from MySQL table
$sql = "SELECT * FROM vacation_request";
$result = $conn->query($sql);

$vacation = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vacation[] = $row;
    }
}

// Close the database connection
$conn->close();
// Return the users as JSON
header('Content-Type: application/json');
echo json_encode($vacation);
?>