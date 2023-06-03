<?php
$currency;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currency = $_POST['currency'];
    if (empty($currency)) {
        echo "currency not found";
    } else {
        //print($currency);
    }
}
?>

<?php
$data = json_decode(file_get_contents("../main/user.json"), true);

foreach ($data as $item) {
    $price = $currency === 'USD' ?'$' . number_format((int)$item['price'] / 94000,2 ): $item['price'];
    
    ?>
    <div class="box">
        <div class="leftsection">
            <div class="firstrow">
                <i class="fa-solid fa-location-dot fa-xs" id="uppericon"></i>
                <h5 class="from"><?php echo $item['from']; ?></h5>
                <h5 class="origin"><?php echo $item['origin']; ?></h5>
            </div>
            <div class="secondrow">
                <i class="fa-solid fa-location-dot fa-xs" id="bottomicon"></i>
                <h5 class="to"><?php echo $item['to']; ?></h5>
                <h5 class="destination"><?php echo $item['destination']; ?></h5>
            </div>
            <div class="thirdrow">
                <i class="fa-sharp fa-solid fa-bus fa-sm"></i>
                <h5 class="totaltime"><?php echo $item['totaltime']; ?></h5>
            </div>
        </div>
        <div class="rightsection">
            <h5><?php echo $price; ?></h5>
            <a href="#">
                Select
            </a>
        </div>
    </div>
    <?php
}
?>
