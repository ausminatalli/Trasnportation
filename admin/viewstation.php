
<?php
$host = $_SERVER['HTTP_HOST'];
$apiUrl = "http://$host/transportation/api/admin/dropdown.php";
$data = file_get_contents($apiUrl);
$dropdown = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/modal.css" />
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
  <h2 class="text-center text-primary mt-5 mb-5">View Stations</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Station ID</th>
          <th>Station name</th>
          <th>province</th>
          <th>capacity</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/transportation/api/admin/view/allstations.php");

            $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo '<tr data-stationid="' . $row['stationid'] . '">';
            echo "<td>".$row['stationid']."</td>";
            echo "<td>".$row['stationname']."</td>";
            echo "<td>".$row['provincename']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit" data-stationid="' . $row['stationid'] . '" class="icon-trash btn-editstation"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="Remove station" data-stationid="' . $row['stationid'] . '" class="icon-trash btn-deletestation">
            <i class="fa-solid fa-trash"></i>
            </button>
            </td>';
            echo "</tr>";
          }
        ?>
        
      </tbody>
    </table>
<!-- Modal -->


  </body>
</html>