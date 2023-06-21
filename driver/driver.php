<?php
include_once('../path.php');
include('../include/driverheader.php');
if(isset($_SESSION['id']) && ($_SESSION['type'] == 1)) {
    $query = "SELECT * FROM tripview WHERE driverid = $driverId"; 
    $result = mysqli_query($conn, $query) or die("Selecting vacation request failed"); 
   
} else {
    header('location: ../main/login.php?msg=please_login'); 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/driver.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    <title>Document</title>
</head>
<body>
      <section class="container p-5 ">
        <h2 class="mb-5">Upcoming Trips</h2>
        <div class="row">
            <div class="col">
                <form class="d-flex">
            <input id="search-input" class="form-control p-2" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>

      
    </div>
       
    
    <table id="trip-table" class="table mt-5 ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">FROM</th>
                <th scope="col">Destination</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
        $i=1;
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $row['origin'] . '</td>';
            echo '<td>' . $row['destination'] . '</td>';
            echo '<td>' . $row['schedule'] . '</td>';
            echo '<td>' . $row['starttime'].'&nbsp->&nbsp;'.$row['arrivetime']. '</td>';
            $Statuscolor = $row['status'];
            $colorClass = '';
            switch ($Statuscolor) {
                case 0:
                    $colorClass = 'text-warning';
                    $status = 'Delay';
                    break;
                case 1:
                    $colorClass = 'text-danger';
                    $status = 'Cancel';
                    break;
                case 2:
                    $colorClass = 'text-success';
                    $status = 'Arrived';
                    break;
                    case 3:
                        $colorClass = 'text-secondary';
                        $status = 'On the way';
                        break;
                        case 2:
                            $colorClass = 'text-primary';
                            $status = 'In progress';
                            break;
                default:
                    $status = 'Unknown';
            }
            echo '<td class="' . $colorClass . '">' . $status . '</td>';
            echo '<td>Button</td>';

            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>

      </section>


           <!-- Footer -->
        <?php include('../include/footer.html')  ?>
  <!-- Footer -->

  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <script src="js/driver.js"></script>
</body>
</html>