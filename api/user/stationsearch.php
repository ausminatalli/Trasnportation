<?php
include_once('../../config.php');
$origin;
$destination;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    if (empty($origin)) {
        echo "currency not found";
    } else {
        //print($currency);
    }
}

$query = "SELECT
`skyline`.`trips`.`tripid` AS `tripid`,
`skyline`.`station`.`provincename` AS `origin`,
`station2`.`provincename` AS `destination`,
`skyline`.`trips`.`schedule` AS `schedule`,
TIME_FORMAT(`skyline`.`trips`.`movetime`, '%H:%i') AS `movetime`,
TIME_FORMAT(`skyline`.`trips`.`arrivetime`, '%H:%i') AS `arrivetime`,
TIME_FORMAT(TIMEDIFF(`skyline`.`trips`.`arrivetime`, `skyline`.`trips`.`movetime`), '%H:%i') AS `time_difference`,
`skyline`.`trips`.`ticketprice` AS `ticketprice`
FROM
((`skyline`.`trips`
JOIN `skyline`.`station` ON ((`skyline`.`station`.`stationid` = `skyline`.`trips`.`tripfrom`)))
JOIN `skyline`.`station` `station2` ON ((`station2`.`stationid` = `skyline`.`trips`.`tripto`))) 
WHERE
`skyline`.`station`.`provincename` = '$origin' AND `station2`.`provincename` = '$destination';
";

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error executing the query: ' . mysqli_error($conn));
} else {
    $searchResults = array();
    $count = 0 ;
    while ($row = mysqli_fetch_assoc($result)) {
        $count++;
        $searchResults[] = array(
            'origin' => $row['origin'],
            'destination' => $row['destination'],
            'movetime' => $row['movetime'],
            'arrivetime' => $row['arrivetime'],
            'ticketprice' => $row['ticketprice'],
            'time_difference' => $row['time_difference']
        );
    }

    mysqli_close($conn);
}

?>

<?php
if($searchResults){
foreach ($searchResults as $item) {
    ?>
    <div class="box">
        <div class="leftsection">
            <div class="firstrow">
                <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
                <h5 class="from"><?php echo $item['movetime']; ?></h5>
                <h5 class="origin"><?php echo $item['origin']; ?></h5>
            </div>
            <div class="secondrow">
                <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
                <h5 class="to"><?php echo $item['arrivetime']; ?></h5>
                <h5 class="destination"><?php echo $item['destination']; ?></h5>
            </div>
            <div class="thirdrow">
                <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
                <h5 class="totaltime"><?php echo $item['time_difference']; ?></h5>
            </div>
        </div>
        <div class="rightsection">
            <h5><?php echo $item['ticketprice'].' L.L'; ?></h5>
            <a href="#">
                Select
            </a>
            <i class="fa-duotone fa-arrow-right fa-2xs"></i>
        </div>
        
    </div>
    <span value="<?php echo $count; ?>"></span>
    <?php
}}
else
{ ?>
<span value="<?php echo $count; ?>"></span>
    <h1 class="text-center mt-5">No Data Found</h1>
<?php } 
?>
