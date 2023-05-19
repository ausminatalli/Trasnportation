<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Document</title>
    </head>
    <style>
      body{
        background-color: var(--backColor) !important;
      }
      h1{
        text-align:center;
      }
  table{
    width:70% !important;
  }
    </style>

<body>
<?php   
   include('header.html');

    ?>
    
    <div class="text mt-5 mb-5">

        <h1 class="mb-5">Booking's</h1>
        <div class="ms-5">
        <p>View and manage your booked bus tickets below. To <span class="one">cancel</span> a booking,
         click the "Cancel " button. Please note that cancellations must be made at least <span class="one">2 Hours</span> prior to the scheduled departure time.
        </p>
        <p>We recommend that you arrive at the bus stop at least <span class="two">15 minutes</span> before the scheduled departure time to ensure a timely departure.</p>
        <p>After your trip has ended, we welcome your feedback to help us improve our service</p>
        </div>
    </div>

    <table class="table ms-5">
    <thead >
        <tr>
            <th>PIN Number</th>
            <th>From</th>
            <th>To</th>
            <th>Date</th>
            <th>Time</th>
            <th>Bus Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>24634</td>
            <td>Beirut</td>
            <td>Saida</td>
            <td>2023-05-15</td>
            <td>8:00 AM</td>
            <td>ABC123</td>
            <td><button class="btn btn-danger">Cancel</button>
            <button class="btn btn-primary">Rate</button>
          </td>
        </tr>
        <tr>
            <td>24634</td>
            <td>Beirut</td>
            <td>Saida</td>
            <td>2023-05-15</td>
            <td>8:00 AM</td>
            <td>ABC123</td>
            <td><button class="btn btn-danger">Cancel</button>
            <button class="btn btn-primary">Rate</button>
          </td>
</tr>
        <tr>
            <td>24634</td>
            <td>Beirut</td>
            <td>Saida</td>
            <td>2023-05-15</td>
            <td>8:00 AM</td>
            <td>ABC123</td>
            <td><button class="btn btn-danger">Cancel</button>
            <button class="btn btn-primary">Rate</button>
          </td>
        </tr>
    </tbody>
</table>

    <?php   
   include('../main/footer.html');

    ?>
</body>
</html>