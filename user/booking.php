<!DOCTYPE html>
<html>
  <head>
   
  </head>
  <style>
    body{
        background-color: #E7F7FE;
      }
      h1{
        text-align: center;
        color:#20415B;
        line-height: 70px;
      }
      div{
        font-size: 13px;
        margin-left: 15px;
        color:#20415B;
        margin-top: 150px;
      }
      .one{
        color:#FF0000;
        font-weight: bold;
      }
      .two{
        color:#15CF60;
        font-weight: bold;
      }
      table{
        border:1px solid rgba(0, 0, 0, 0.21);
        width: 70%;
        border-collapse: collapse;
        margin-top: 40px;
        margin-left: 15px;
        text-align: center;
      
      }
      th,td{
        border:1px solid rgba(0, 0, 0, 0.21);
        padding: 5px;
        font-weight: bold;
      }
      th{
        background-color:  #E7F7FE;
      }
      tr{
        background-color: white;
      }
      button{
        border-radius:10px;
        width: 60%;
      }
      .red{
        background-color: #f62b2b;;
      }
      .green{
        background-color: #87DAA8;;
      }
  </style>
  <body>
  
  <div class="text">
        <h1>Booking's</h1>
        <p>View and manage your booked bus tickets below. To <span class="one">cancel</span> a booking,
         click the "Cancel " button. Please note that cancellations must be made at least <span class="one">2 Hours</span> prior to the scheduled departure time.
        </p>
        <p>We recommend that you arrive at the bus stop at least <span class="two">15 minutes</span> before the scheduled departure time to ensure a timely departure.</p>
        <p>After your trip has ended, we welcome your feedback to help us improve our service</p>
    </div>
    <table id="myTable" class="table table-striped" style="width: 70%">
      <thead>
        <tr>
          <th>PIN Number</th>
          <th>From</th>
          <th>To</th>
          <th>Date</th>
          <th>Time</th>
          <th>Bus Number</th>
          <th>Action</th>
        
          <!-- Added column for the block button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $jsonData = file_get_contents('booking.json');
          $data = json_decode($jsonData, true);

          foreach ($data as $row) {
            echo "<tr>";
            echo "<td>".$row['PIN Number']."</td>";
            echo "<td>".$row['From']."</td>";
            echo "<td>".$row['To']."</td>";
            echo "<td>".$row['Date']."</td>";
            echo "<td>".$row['Time']."</td>";
            echo "<td>".$row['Bus Number']."</td>";
            echo '<td><button class="btn btn-warning mr-2">Edit</button><button class="btn btn-danger">Delete</button></td>';
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>


  </body>
</html>
