<?php
require('../../../config.php')
?>
<?php 
$query="SELECT * FROM paymentsview";
$result=mysqli_query($conn,$query);
$payments=array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
}
$conn->close();
header('Content-Type: application/json');
echo json_encode($payments);
?>