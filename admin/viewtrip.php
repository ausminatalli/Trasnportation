<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
          <th>Start Time</th>
          <th>Arrive Time</th>
          <th>Driver</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
        $host = $_SERVER['HTTP_HOST'];
          $jsonData = file_get_contents("http://$host/transportation/api/admin/view/alltrips.php");
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['origin']."</td>";
            echo "<td>".$row['destination']."</td>";

            echo "<td>".$row['schedule']."</td>";
            echo "<td>".$row['starttime']."</td>";
            echo "<td>".$row['arrivetime']."</td>";
            echo "<td><h6>".$row['firstname'].' '.$row['lastname']."</h6></td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit Trip" class="icon-trash btn-edit"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="editForm" method="post" action="edit.php">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Trip</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label for="origin">Origin:</label>
            <select class="form-control" id="origin" name="origin">
              <!-- Add dropdown options here -->
              <option value="Beirut">Beirut</option>
              <option value="Saida">Saida</option>
              <option value="Tyre">Tyre</option>
              <option value="Nabatieh">Nabatieh</option>
              <option value="Baalbek">Baalbek</option>
              <option value="Byblos">Byblos</option>
            </select>
          </div>
          <div class="form-group">
            <label for="destination">Destination:</label>
            <select class="form-control" id="destination" name="destination">
              <!-- Add dropdown options here -->
              <option value="Beirut">Beirut</option>
              <option value="Saida">Saida</option>
              <option value="Tyre">Tyre</option>
              <option value="Nabatieh">Nabatieh</option>
              <option value="Baalbek">Baalbek</option>
            </select>
          </div>
          <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
          <div class="form-group">
            <label for="startTime">Start Time:</label>
            <input type="time" class="form-control" id="startTime" name="startTime">
          </div>
          <div class="form-group">
            <label for="arriveTime">Arrive Time:</label>
            <input type="time" class="form-control" id="arriveTime" name="arriveTime">
          </div>
          <div class="form-group">
            <label for="driver">Driver:</label>
            <select class="form-control" id="driver" name="driver">
              <!-- Add dropdown options here -->
              <option value="Ali Mantach">Ali Mantach</option>
              <option value="Mohamad Yassin">Mohamad Yassin</option>
              <option value="Khodor Hajj Hassan">Khodor Hajj Hassan</option>
              <option value="Hassan Barada">Hassan Barada</option>
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

