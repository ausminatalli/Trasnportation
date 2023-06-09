<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

      .active {
  color: green !important;
}

.inactive {
  color: red !important;
}
.valid {
  color: green !important;
}

.expired {
  color: red !important;
}

      .action-buttons {
        display: flex;
        gap: 10px;
      }
    
    </style>
    <div>
    <h2 class="text-center text-primary mt-5 mb-5">View Driver</h2>
      <table id="myTable" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Location</th>
            <th>MobileNumber</th>
            <th>Email</th>
            <th>Birthday</th>
            <th>Station</th>
            <th>Apply Date</th>
            <th>Licensedate</th>
            <th>LicenseEx</th>
            <th>Online</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $jsonData = file_get_contents('demodata/driver.json');
        $host = $_SERVER['HTTP_HOST'];

          $jsonData = file_get_contents("http://$host/Transportation/api/admin/alldriver.php");

            $data = json_decode($jsonData, true);

            foreach ($data as $row) {
              $onlineClass = $row['isOnline'] == 1 ? 'Active' : 'Inactive';
              $licenseClass = $row['licenseexpiry'] == 1 ? 'Valid' : 'Expired';
              echo "<tr>";
              echo "<td>".$row['firstname'].' '.$row['lastname']."</td>";
              echo "<td>".$row['city'].' '.$row['address']."</td>";
              echo "<td>".$row['mobilenumber']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['birthdate']."</td>";
              echo "<td>".$row['workstation']."</td>";
              echo "<td>".$row['applydate']."</td>";
              echo "<td>".$row['licensedate']."</td>";
              echo '<td class="' . strtolower($licenseClass) . '">' . $licenseClass . '</td>';
              echo '<td class="' . strtolower($onlineClass) . '">' . $onlineClass . '</td>';
              echo '<td>';
              echo '<div class="action-buttons">';
              echo '<button data-toggle="tooltip" data-placement="right" title="Edit" class="icon-trash btn-edit"><i class="fa-solid text-primary fa-user-pen"></i></button> | ';
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


    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" method="post" action="edit.php">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit driver</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="Licensedate">LicenseDate:</label>
            <input type="date" class="form-control" id="Licensedate" name="Licensedate">
          </div>
          <div class="form-group">
            <label for="Station">Station:</label>
            <select class="form-control" id="Station" name="Station">
              <!-- Add dropdown options here -->
              <option value="Beirut">Beirut</option>
              <option value="Saida">Saida</option>
              <option value="Tyre">Tyre</option>
              <option value="Tripoli">Tripoli</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>

