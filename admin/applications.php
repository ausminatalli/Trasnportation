<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/modal.css" />
</head>
<body>
  <h2 class="text-center text-primary mt-5 mb-5">Manage Applications</h2>
  
  <style>
    .btn {
      font-size: 17px;
    }
   th{  
    text-align: center !important;
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
          <th>Last name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>City</th>
          <th>Address</th>
          <th>Date of Birthday</th>
          <th>License nb</th>
          <th>License Exp</th>
          <th class="about">About</th>
          <th>Apply Date</th>
          <th>Action</th>
          
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('demodata/application.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['lastName']."</td>";
            echo "<td>".$row['Email']."</td>";
            echo "<td>".$row['Phone']." </td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['licenseNb']."</td>";
            echo "<td>".$row['licenseExp']."</td>";
            echo "<td>".$row['about']."</td>";
            echo "<td>".$row['applyDate']."</td>";
            echo '<td colspan="">
            <button data-toggle="tooltip" data-placement="right" title="Show Licenset" class="icon-trash"><i class="fa-solid fa-id-card"></i></button><br> 
            <button data-toggle="tooltip" data-placement="right" title="Accept Driver" class="icon-trash"><i class="fa-solid fa-circle-check"></i></button><br>
            <button  data-toggle="tooltip" data-placement="right" title="Reject Driver" class="icon-trash btn-delete4"><i class="fa-solid fa-trash"></i></button>
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
              <span>Are you sure you want to Reject the driver?</span>
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

