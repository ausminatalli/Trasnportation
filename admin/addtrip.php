<?php $host = $_SERVER['HTTP_HOST'];
        $apiUrl = "http://$host/transportation/api/admin/dropdown.php";
        $data = file_get_contents($apiUrl);
        $dropdown = json_decode($data, true); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Add Trip</title>
    <style>
      .vspan {
        color: red !important;
      }
    </style>
  </head>
  <body>
    <h2 class="text-center text-primary mt-5 mb-5">Add Trip</h2>
    <div class="card-body content">
      <form action="../api/admin/addform/newtrip.php" method="POST" onsubmit="return validateTrip()">
        <h5 class="text-primary">
          Add Trip Origin Destination Time and Driver
        </h5>
        <hr class="hr" />
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>From</h5>
              <select
                class="form-control"
                style="width: 100%"
                name="startLocation"
                id="startLocation"
              >
                <option selected="selected">Start Location</option>
                <?php
        
        foreach ($dropdown['station'] as $station) {
          $stationid = $station['stationid'];
          $stationname = $station['stationname'];
          $provincename = $station['provincename'];
          echo '<option value="' . $stationid . '">' . $provincename . ', ' . $stationname . '</option>';
      }      
      ?>
              </select>
              <span id="vStartLocation" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h5>To</h5>
              <select
                class="form-control"
                style="width: 100%"
                id="destinationLocation"
                name="destinationLocation"
              >
                <option selected="selected">Select Location</option>
                <?php
        
        foreach ($dropdown['station'] as $station) {
          $stationid = $station['stationid'];
          $stationname = $station['stationname'];
          $provincename = $station['provincename'];
          echo '<option value="' . $stationid . '">' . $provincename . ', ' . $stationname . '</option>';
      }      
      ?>
              </select>
              <span id="vDestinationLocation" class="vspan"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Date</h5>
              <input
                type="date"
                class="form-control"
                style="width: 100%"
                name="date"
                id="date"
              />
              <span id="vDate" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Time</h5>
              <input type="time" class="form-control" id="time" name="time"/>
              <span id="vTime" class="vspan"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Bus</h5>
              <select class="form-control" style="width: 100%" id="busNumber" name="busNumber">
                <option selected="selected">Bus Number</option>
                <?php  foreach ($dropdown['bus'] as $busses) {
                
                $busid = $busses['busid'];
                echo '<option value="' . $busid . '">' . $busid . '</option>';
              }
              ?>
              </select>
              <span id="vBusNumber" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <h5>Arrive Time</h5>
              <input type="time" class="form-control" id="arrivetime" name="arrivetime"/>
              <span id="vArriveTime" class="vspan"></span>
              
            </div>
          </div>
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
            <h5>Ticket Price</h5>
              <input type="number" class="form-control" id="ticketprice" name="ticketprice"/>
              <span id="vTicketprice" class="vspan"></span>
            </div>

            </div>
            <div class="col-md-6">
            <div class="form-group">
            <h5>Details</h5>
            <textarea class="form-control" rows="10" id="details" name="details"></textarea>
              <span id="vDetails" class="vspan"></span>
            </div>
        </div>
        <hr class="hr" />
        <div class="bottom text-center">
          <button class="btn btn-primary"  id="submit">
            Submit
          </button>
        </div>
      </form>
    </div>
    <script src="./js/validation/tripvalidation.js"></script>
  </body>
</html>