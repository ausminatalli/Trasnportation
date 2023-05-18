<!DOCTYPE html>
<html>
<head>

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
            echo '<td colspan=""><button class=" btn btn-danger">Delete</button>
            
            </td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

 
  
</body>
</html>

