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
  <?php
  $host = $_SERVER['HTTP_HOST'];
        $apiUrl = "http://$host/transportation/api/admin/dropdown.php";
        $data = file_get_contents($apiUrl);
        $dropdown = json_decode($data, true);
      
      ?>
    <h2 class="text-center text-primary mt-5 mb-5">Add Trip</h2>
    <div class="card-body content">
      <form action="">
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
                id="startLocation"
              >
                <option selected="selected">Start Location</option>
                <?php
        
        foreach ($dropdown['station'] as $station) {
          $stationname = $station['stationname'];
          $provincename = $station['provincename'];
          echo '<option>'. $provincename.', ' . $stationname . '</option>';
        }
      ?>
              </select>
              <span id="vStartLocation" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
  <div class="form-group">
    <h5>From</h5>
    <select class="form-control" style="width: 100%" id="startLocation">
      <option selected="selected">Start Location</option>
      <?php
        
        foreach ($dropdown['station'] as $station) {
          $stationname = $station['stationname'];
          $provincename = $station['provincename'];
          echo '<option>'. $provincename.', ' . $stationname . '</option>';
        }
      ?>
    </select>
    <span id="vStartLocation" class="vspan"></span>
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
                id="date"
              />
              <span id="vDate" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Time</h5>
              <input type="time" class="form-control" id="time" />
              <span id="vTime" class="vspan"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Bus</h5>
              <select class="form-control" style="width: 100%" id="busNumber">
              <option selected="selected">Bus ID</option>
              <?php  foreach ($dropdown['bus'] as $busses) {
                
          $busid = $busses['busid'];
          echo '<option>' . $busid . '</option>';
        }
        ?>
              </select>
              <span id="vBusNumber" class="vspan"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <h5>Select Driver</h5>
              <select class="form-control" style="width: 100%" id="driverName">
                <option selected="selected">Driver Name</option>
                <?php
        
        foreach ($dropdown['driver'] as $drivers) {
          $drivername = $drivers['Drivers'];
          echo '<option>'. $drivername. '</option>';
        }
      ?>
              </select>
              <span id="vDriverName" class="vspan"></span>
            </div>
          </div>
        </div>
        <hr class="hr" />
        <div class="bottom text-center">
          <button class="btn btn-primary" onclick="validateTrip()" id="submit">
            Submit
          </button>
        </div>
      </form>
    </div>
    <script src="./js/validation/tripvalidation.js"></script>
  </body>
</html>
