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
          <th>Bus ID</th>
          <th>Driver name</th>
          <th>capacity</th>
          <th>Station</th>
          <th>Mechanic Date</th>
          <th>Insurance number</th>
          <th>Mechanic Due</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          // $jsonData = file_get_contents('demodata/bus.json');
        $host = $_SERVER['HTTP_HOST'];
          $jsonData = file_get_contents("http://$host/Transportation/api/admin/view/allbus.php");
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['busid']."</td>";
            echo "<td>".$row['firstname'].' '.$row['lastname']."</td>";
            echo "<td>".$row['capacity']."</td>";
            echo "<td>".$row['province'].', '.$row['station']."</td>";
            echo "<td>".$row['mechanicdate']."</td>";
            echo "<td>".$row['insurancenb']."</td>";
            echo "<td>".$row['mechanicdue']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Edit" class="icon-trash btn-edit"><i class="fa-solid text-primary fa-user-pen"></i></button> | 
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
            <label for="Driver name">Driver name:</label>
            <select class="form-control" id="Driver name" name="Driver name">
              <!-- Add dropdown options here -->
              <option value="Mohammad Yassine">Mohammad Yassine</option>
              <option value="Ali Mantach">Ali Mantach</option>
              <option value="Hassan Barada">Hassan Barada</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Station">Station:</label>
            <select class="form-control" id="Station" name="Station">
              <!-- Add dropdown options here -->
              <option value="beirut">Beirut</option>
              <option value="tyre">Tyre</option>
              <option value="saida">Saida</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Mechanicdue date">Mechanicdue date:</label>
            <input type="date" class="form-control" id="Mechanicdue date" name="Mechanicdue date">
          </div>
          <div class="form-group">
            <label for="Insurance number">Insurance number:</label>
            <input type="text" class="form-control" id="Insurance number" name="Insurance number">
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
