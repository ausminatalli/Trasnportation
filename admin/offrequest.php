
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
          <th>Vacation ID</th>
          <th>Driver ID</th>
          <th>vacation_start</th>
          <th>vacation_end</th>
          <th>reason_of_vacation</th>
          <th>vacation_approved</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/transportation/api/admin/view/alldayoff.php");

            $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo '<tr data-vacationid="' . $row['vacationid'] . '">';
            echo "<td>".$row['vacationid']."</td>";
            echo "<td>".$row['driverid']."</td>";
            echo "<td>".$row['vacation_start']."</td>";
            echo "<td>".$row['vacation_end']."</td>";
            echo "<td>".$row['reason_of_vacation']."</td>";
            echo "<td>".$row['vacation_approved']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="accept" data-vacationid="' . $row['vacationid'] . '" class="icon-trash btn-acceptv"><i class="fa-solid fa-circle-check"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="decline vacation" data-vacationid="' . $row['vacationid'] . '" class="icon-trash btn-declinev">
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