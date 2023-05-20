<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css">

</head>
<body>
  <style>
    .btn {
      font-size: 17px;
    }

    #myTable {
      margin-bottom: 0px;
    }
  </style>
  <div>
  <h2 class="text-center text-primary mt-5 mb-5 title">Dashboard</h2>

    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>MobileNumber</th>
          <th>Number of trips</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('demodata/users.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['Firstname']."</td>";
            echo "<td>".$row['Lastname']."</td>";
            echo "<td>".$row['MobileNumber']."</td>";
            echo "<td>".$row['Number of trips']."</td>";
            echo ' <td><button class="icon-trash"><i class="fa-solid fa-ban"></i></button></td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

 
  
</body>
</html>
