<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="css/modal.css" />
</head>
<body>
  <h2 class="text-center text-primary mt-5 mb-5">Manage Admins</h2>
  
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
          <th>Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Email Time</th>
          <th>Date of Birthday Time</th>
          <th>City</th>
          <th>Address</th>
          <th>Action</th>
          
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('demodata/admin.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['lastname']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['email']."  </td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo '<td colspan=""><button data-toggle="tooltip" data-placement="right" title="Remove Admin"  class="icon-trash btn-delete3"><i class="fa-solid fa-trash"></i></button>
            
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
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

