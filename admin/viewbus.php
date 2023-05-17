<!DOCTYPE html>
<html>
  <head>
   
  </head>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <body>
  
  <div>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Driver name</th>
          <th>capacity</th>
          <th>Station</th>
          <th>Mechanicdue date</th>
          <th>Insurance number</th>
          <th>Accidents number</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('demodata/bus.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['Driver name']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo "<td>".$row['Station']."</td>";
            echo "<td>".$row['Mechanicdue date']."</td>";
            echo "<td>".$row['Insurance number']."</td>";
            echo "<td>".$row['Accidents number']."</td>";
            echo '<td><button class="btn btn-warning mr-2">Edit</button><button class="btn btn-danger">Delete</button></td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

  </body>
</html>
