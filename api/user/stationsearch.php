<?php
include_once('../../config.php');

$origin = $_GET['origin'];
$destination = $_GET['destination'];
$date = $_GET['date'];
$time = $_GET['time'];

$query = "SELECT s1.provincename AS origin, s2.provincename AS destination, t.movetime, t.schedule, t.ticketprice FROM trips t JOIN station s1 ON t.tripfrom = s1.stationid JOIN station s2 ON t.tripto = s2.stationid WHERE s1.provincename = '$origin' AND s2.provincename = '$destination'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error executing the query: ' . mysqli_error($conn));
}
else {

    $searchResults = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = array(
            'origin' => $row['origin'],
            'destination' => $row['destination'],
            'movetime' => $row['movetime'],
            'schedule' => $row['schedule'],
            'ticketprice' => $row['ticketprice']
        );
    }


}

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($searchResults);

// Free the result set
mysqli_free_result($result);

// Close the database conn
mysqli_close($conn);
?>
