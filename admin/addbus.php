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
              <option selected="selected">Start Location</option>
              <option>Beirut</option>
              <option>Saida</option>
              <option>Tyre</option>
              <option>Baalbek</option>
              <option>Byblos</option>
              <option>Nabatieh</option>
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
                <option>Ta3an</option>
                <option>Jahjeh</option>
                <option>2afas</option>
                <option>Tokle</option>
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