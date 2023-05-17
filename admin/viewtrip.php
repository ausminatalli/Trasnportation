<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <h2 class="text-center text-primary mt-5 mb-5">Manage Trips</h2>
  
  <style>
    .btn {
      font-size: 17px;
    }
   

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <div>
    
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Origin</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Strat Time</th>
          <th>Arrive Time</th>
          <th>Driver</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('demodata/trip.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['origin']."</td>";
            echo "<td>".$row['destination']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['startTime']."  ------>></td>";
            echo "<td>".$row['arriveTime']."</td>";
            echo "<td><h6>".$row['DriverName']."</h6></td>";
            echo '<td colspan=""><button class="mr-2  btn btn-danger">Delete</button>
            <button class="btn btn-warning">Edit</button>
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

 
  
</body>
</html>

