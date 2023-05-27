<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/modal.css" />
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
    .refund{
      color:blue;
    }
    .refund:hover
    {
      color:red;
      cursor: pointer;
      font-size:42px
    }
    .review{
      color:#9FA909;
    }
    .review:hover{
      color:gold;
      cursor: pointer;
      font-size:42px
    }
  </style>
  <div>
  <h2 class="text-center text-primary mt-5 mb-5">Payments</h2>
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
          <th>Refund</th>
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
            echo '<td><i class="fa-solid fa-star fa-xl review"></i></td>';
            echo '<td><i class="fa-regular fa-credit-card fa-xl refund"></i></td>';
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
