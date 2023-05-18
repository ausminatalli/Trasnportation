<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
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
  <h2 class="text-center">Payments</h2>
    <table id="myTable" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>PaymentID</th>
          <th>Userid</th>
          <th>Tripid</th>
          <th>Firstname</th>
          <th>LastName</th>
          <th>AmountPaid</th>
          <th>Review</th>
          <th>Action</th>
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('./demodata/payment.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['PaymentID']."</td>";
            echo "<td>".$row['Userid']."</td>";
            echo "<td>".$row['Tripid']."</td>";
            echo "<td>".$row['Firstname']."</td>";
            echo "<td>".$row['LastName']."</td>";
            echo "<td>".$row['AmountPaid']."</td>";
            echo '<td><button class="btn btn-primary">Review</button></td>';
            echo '<td><button class="btn btn-danger">Refund</button></td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>

 
  </body>
</html>
