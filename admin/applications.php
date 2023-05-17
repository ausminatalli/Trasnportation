<!DOCTYPE html>
<html>
<head>

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
            <button class="  btn btn-secondary w-100 mb-1">License</button>
            <button class="btn btn-primary w-100 mb-1">Accept</button>
            <button class="  btn btn-danger w-100">Reject</button>
            
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

 
  
</body>
</html>

