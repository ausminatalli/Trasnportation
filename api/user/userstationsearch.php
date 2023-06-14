<?php
include_once('../../config.php');
require('../main/functions.php');
session_start();
$id=$_SESSION['id'];
$tripid;
$origin;
$destination;
$query;
$searchResults;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    
    if(isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['triptime']) && isset($_POST['tripdate']))
    {
        $triptime = $_POST['triptime'];
        $tripdate = $_POST['tripdate'];
        $data[] = array(
            
            'origin' => $origin,
            'destination' => $destination,
            'triptime' => $triptime,
            'tripdate' => $tripdate,
        );
        $searchResults = getTrips($conn,'triptime',$data);
    }

    else if(isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['triptime']))
    {
        $triptime = $_POST['triptime'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'triptime' => $triptime
        );
        $searchResults = getTrips($conn,'triptime',$data);
    }
    else if( isset($_POST['origin']) && isset($_POST['destination']) && isset($_POST['tripdate']))
    {
        $tripdate = $_POST['tripdate'];
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
            'tripdate' => $tripdate
        );
        $searchResults = getTrips($conn,'tripdate',$data);
    }
    
    else if($_POST['origin'] && $_POST['destination'] ){
        
      
        $data[] = array(
            'origin' => $origin,
            'destination' => $destination,
        );
        $searchResults = getTrips($conn,'validated',$data);
    }
    
    if (empty($origin)) {
        echo "currency not found";
    } else {
        //print($currency);
    }
}


    mysqli_close($conn);

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
                <h5 class="origin"><?php echo $item['origin'].', '.$item['originlocation']; ?></h5>
            </div>
            <div class="secondrow">
                <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
                <h5 class="to"><?php echo $item['arrivetime']; ?></h5>
                <h5 class="destination"><?php echo $item['destination'].', '.$item['destinationlocation']; ?></h5>
            </div>
            <div class="thirdrow">
                <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
                <h5 class="totaltime"><?php echo $item['time_difference']; ?></h5>
            </div>
        </div>
        <div class="rightsection">
            <h5><?php echo $item['ticketprice'].' L.L'; ?></h5>
            <a href="./payment.php?t=<?php echo $item['tripid'] ?>&u=<?php echo $id ?>&p=<?php echo $item['ticketprice'] ?>">
    Book
</a>

            <i class="fa-duotone fa-arrow-right fa-2xs"></i>
        </div>
        
    </div>
    <span value="<?php echo count($searchResults); ?>"></span>
    <?php
}}
else
{ ?>
<span value="<?php echo 0; ?>"></span>
    <h1 class="text-center mt-5">No Data Found</h1>
<?php } 
?>
