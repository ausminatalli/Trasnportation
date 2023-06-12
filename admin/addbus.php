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
    
    <title>Document</title>
    <style>
      .vspan{
        color:red !important;
      }
    </style>
  </head>

  <body>
  <?php 
        $host=$_SERVER['HTTP_HOST'];
        $Url="http://$host/transportation/api/admin/dropdown.php";
        $data=file_get_contents($Url);
        $dropdown=json_decode($data, true);
    ?>
    <h2 class="text-center text-primary mt-5 mb-5">Add Bus</h2>
    <div class="card-body content">
      <h5 class="text-primary">Add Bus Information Capacity and Mechanic</h5>
      <hr class="hr">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <h5>Select Station</h5>
            <span id="vselectstation" class="vspan"></span>
            <select  class="form-control " id="selectstation" style="width: 100%;">

              <option selected="selected">Base Location</option>
              
              <?php
        
        foreach ($dropdown['station'] as $station) {
          $stationid = $station['stationid'];
          $stationname = $station['stationname'];
          $provincename = $station['provincename'];
          echo '<option value="' . $stationid . '">' . $provincename . ', ' . $stationname . '</option>';
      }      
      ?>

            </select>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
          <h5>Select Driver</h5>
          <span id="vselectdriver" class="vspan"></span>
            <select class="form-control" id="selectdriver"  style="width: 100%;">
              <option selected="selected">Driver Name</option>
              <?php
              foreach ($dropdown['driver'] as $drivers) {
               $drivername = $drivers['Drivers'];
               echo '<option>'. $drivername. '</option>';
             }
        ?>
            </select>
          </div>
        </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
               <h5>Capacity</h5>
               <span id="vcapacity" class="vspan"></span>
            <input type="number" class="form-control" id="capacity" style="width: 100%;">
            </div>
           

          </div>
          <div class="col-md-6">
            <div class="form-group">
               <h5>Plate Number</h5>
               <span id="vplate" class="vspan"></span>
               <input type="text" class="form-control" id="platenumber">
            </div>
           

          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <h5>Mechanic due</h5>
              <span id="vmechanic" class="vspan"></span>
              <input type="date" class="form-control" id="Mechanic">

             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
            <h5>Insurance Number</h5>
            <span id="vinsurance" class="vspan"></span>
            <input type="Number" class="form-control" id="Insurance">
             
            </div>
          </div>

      
    </div>
    <hr class="hr">
    <div class="bottom text-center">
      <button onclick="validatebus()"  class="btn btn-primary " id="submit" >Submit</button>

  </body>
</html>
