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
    <?php include('../include/driverheader.html')    ?>

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
                <th scope="col">From</th>
                <th scope="col">Destination</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Details</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Beirut</td>
                <td>Saida</td>
                <td>Mon,May 17</td>
                <td>8:00 am -> 9:00 Pm</td>
                <td class="text-danger font-weight-bold">Delay</td>
                <td><button class="btn btn-primary">Details</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Baalbek</td>
                <td>Saida</td>
                <td>Mon,May 17</td>
                <td>8:00 am -> 9:00 Pm</td>
                <td class="text-success font-weight-bold">Done</td>
                <td><button class="btn btn-primary">Details</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Beirut</td>
                <td>Saida</td>
                <td>Mon,May 17</td>
                <td>8:00 am -> 9:00 Pm</td>
                <td class="text-warning font-weight-bold ">On The Way</td>
                <td><button class="btn btn-primary">Details</button></td>
            </tr>
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