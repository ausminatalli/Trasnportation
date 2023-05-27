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
  <h2 class="text-center text-primary mt-5 mb-5">View Bus</h2>
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
            echo '<td>';
            
              echo '<select class="station-dropdown">';

              $stationData = ['Mohammad Yassine', 'Khodor haj hassan', 'Hassan Barada','Razan'];
              foreach ($stationData as $station) {
                $selected = $station == $row['Driver name'] ? 'selected' : '';
                echo '<option value="'.$station.'" '.$selected.'>'.$station.'</option>';
              }

              echo '</select>';
              echo '</td>';
              echo "<td>".$row['capacity']."</td>";
            echo '<td>';
              echo '<select class="station-dropdown">';

              $stationData = ['Tripoli', 'Beirut', 'Saida'];
              foreach ($stationData as $station) {
                $selected = $station == $row['Station'] ? 'selected' : '';
                echo '<option value="'.$station.'" '.$selected.'>'.$station.'</option>';
              }

              echo '</select>';
              echo '</td>';
            echo '<td><input type="date" value="'.$row['Mechanicdue date'].'"></td>';
            echo '<td><input type="text" value="'.$row['Insurance number'].'"></td>';
            echo "<td>".$row['Accidents number']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit" class="icon-trash"><i class="fa-solid fa-user-pen"></i></button> | 
            <button data-toggle="tooltip" data-placement="right" title="View Bus" class="icon-trash btn-delete2"><i class="fa-solid fa-trash"></i></button>
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
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
  </div>

  </body>
</html>
