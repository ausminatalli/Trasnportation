
<?php

function getTrips($conn,$condition,$data)
{
 
    $query = "SELECT
    `skyline`.`trips`.`tripid` AS `tripid`,
    `skyline`.`station`.`provincename` AS `origin`,
    `station2`.`provincename` AS `destination`,
    `skyline`.`station`.`stationname` AS `originlocation`,
    `station2`.`stationname` AS `destinationlocation`,
    DATE_FORMAT(`skyline`.`trips`.`schedule`, '%Y-%m-%d') AS `schedule`,
    TIME_FORMAT(`skyline`.`trips`.`movetime`, '%H:%i') AS `movetime`,
    TIME_FORMAT(`skyline`.`trips`.`arrivetime`, '%H:%i') AS `arrivetime`,
    TIME_FORMAT(TIMEDIFF(`skyline`.`trips`.`arrivetime`, `skyline`.`trips`.`movetime`), '%H:%i') AS `time_difference`,
    `skyline`.`trips`.`ticketprice` AS `ticketprice`
    FROM
    `skyline`.`trips`
    JOIN `skyline`.`station` ON (`skyline`.`station`.`stationid` = `skyline`.`trips`.`tripfrom`)
    JOIN `skyline`.`station` `station2` ON (`station2`.`stationid` = `skyline`.`trips`.`tripto`)
    WHERE `skyline`.`station`.`provincename` = '" . $data[0]['origin'] . "' AND `station2`.`provincename` = '" . $data[0]['destination'] . "'";
if($condition=='All')
{
    $query .= "
        AND DATE(`skyline`.`trips`.`schedule`) = '" . $data[0]['tripdate'] . "' AND `movetime` = '" . $data[0]['triptime'] . "'";
}
    else if($condition=='triptime')
    {
        $query .= "
        AND `movetime` = '" . $data[0]['triptime'] . "'";

   
    }
    else if($condition=='tripdate')
    {
        $query .= "
    AND DATE(schedule) = '" . $data[0]['tripdate'] . "';";

    }
    else if($condition=='validated')
    {

    }
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error executing the query: ' . mysqli_error($conn));
    } else {
        $searchResults = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = array(
                'origin' => $row['origin'],
                'destination' => $row['destination'],
                'movetime' => $row['movetime'],
                'arrivetime' => $row['arrivetime'],
                'ticketprice' => $row['ticketprice'],
                'time_difference' => $row['time_difference'],
                'originlocation' => $row['originlocation'],
                'destinationlocation' => $row['destinationlocation']
            );
        }
}

return $searchResults;
}
?>