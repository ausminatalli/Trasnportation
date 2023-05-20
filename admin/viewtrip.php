<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="css/modal.css"/>
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
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit Trip" class="icon-trash"><i class="fa-solid fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="Remove Trip" class="icon-trash btn-delete1"><i class="fa-solid fa-trash"></i></button>
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <div class="modal-container" id="myModal">
      <div class="modal-wrapper bg-white">
        <div class="modall">
          <header>
            <h2>Confirmation</h2>
          </header>
          <main>
            <div class="icon-wrapper">
              <i class="fa-solid fa-circle-exclamation"></i>
            </div>
            <div class="text-wrapper">
              <span>Are you sure you want to delete?</span>
            </div>
          </main>
          <footer>
            <div class="btn-container">
              <div class="cancel-wrapper">
                <button class="btn btn-cancel">Cancel</button>
              </div>
              <div class="delete-confirm-wrapper">
                <button class="btn btn-confirm">
                  <i class="fa-solid fa-trash"></i>
                  Confirm
                </button>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
 
  
</body>
</html>

