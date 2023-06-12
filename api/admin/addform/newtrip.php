<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the values from the POST data
$startLocation = isset($_POST["startLocation"]) ? $_POST["startLocation"] : '';
$destinationLocation = isset($_POST["destinationLocation"]) ? $_POST["destinationLocation"] : '';
$date = isset($_POST["date"]) ? $_POST["date"] : '';
$time = isset($_POST["time"]) ? $_POST["time"] : '';
$busNumber = isset($_POST["busNumber"]) ? $_POST["busNumber"] : '';
$arriveTime = isset($_POST["arrivetime"]) ? $_POST["arrivetime"] : '';
$ticketprice = isset($_POST["ticketprice"]) ? $_POST["ticketprice"] : '';
$details = isset($_POST["details"]) ? $_POST["details"] : '';

  

  echo $startLocation;
  
  exit();
}
?>
