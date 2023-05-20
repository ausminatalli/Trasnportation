<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" href="css/modal.css" />
    <title>Skyline View Drivers</title>
  </head>
  <body>
    <style>
      .btn {
        font-size: 17px;
      }

      #myTable {
        margin-bottom: 0px;
      }

      .green {
        background-color: green !important;
        border: 1px solid;
        width: 30px;
      }

      .red {
        background-color: red !important;
        border: 1px solid;
        width: 30px;
      }

      .action-buttons {
        display: flex;
        gap: 10px;
      }
    </style>
    <div>
      <h2 class="text-center">View Driver</h2>
      <table id="myTable" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>MobileNumber</th>
            <th>Email</th>
            <th>Station</th>
            <th>Licensedate</th>
            <th>LicenseEx</th>
            <th>Online</th>
            <th>Action</th>
            <!-- Added column for the block button -->
          </tr>
        </thead>
        <tbody>
          <?php
            $jsonData = file_get_contents('demodata/driver.json');
            $data = json_decode($jsonData, true);

            foreach ($data as $row) {
              $onlineClass = $row['Online'] == 1 ? 'green' : 'red';
              $licenseClass = $row['LicenseExpired'] == 1 ? 'green' : 'red';
              echo "<tr>";
              echo "<td>".$row['Firstname']."</td>";
              echo "<td>".$row['Lastname']."</td>";
              echo "<td>".$row['MobileNumber']."</td>";
              echo "<td>".$row['Email']."</td>";
              echo '<td>';
              echo '<select class="station-dropdown">';

              $stationData = ['Tripoli', 'Beirut', 'Saida'];
              foreach ($stationData as $station) {
                $selected = $station == $row['Station'] ? 'selected' : '';
                echo '<option value="'.$station.'" '.$selected.'>'.$station.'</option>';
              }

              echo '</select>';
              echo '</td>';
              echo '<td><input type="date" value="'.$row['Licensedate'].'"></td>';
              echo '<td class="'.$licenseClass.'"></td>';
              echo '<td class="'.$onlineClass.'"></td>';
              echo '<td>';
              echo '<div class="action-buttons">';
              echo '<button data-toggle="tooltip" data-placement="right" title="Edit" class="icon-trash"><i class="fa-solid fa-user-pen"></i></button> | ';
              echo '<button data-toggle="tooltip" data-placement="right" title="Delete Driver" class="icon-trash btn-delete"><i class="fa-solid fa-trash"></i></button>';
              echo '</div>';
              echo '</td>';
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

