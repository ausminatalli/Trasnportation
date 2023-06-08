<?php
include('../path.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/driver.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
 <?php include('../include/driverheader.html')   ?>
    
      <section class="container p-5 ">
        <h2 class="mb-5"></h2>
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
                <th scope="col">#Vacation req</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Reason</th>
                <th scope="col">Response</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>12/07/2023</td>
                <td>30/07/2023</td>
                <td>Death</td>
                <td class="text-success font-weight-bold">Accept</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>05/05/2023</td>
                <td>22/05/2023</td>
                <td>Vacation</td>
                <td class="text-danger font-weight-bold">Reject</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>16/09/2023</td>
                <td>18/09/2023</td>
                <td>Vacation</td>
                <td class="text-warning font-weight-bold">In Progress</td>
            </tr>
        </tbody>
      </table>
      </section>
    
   
      <?php
      include('../include/footer.html')
      ?>
       <script>
    const searchInput = document.getElementById('search-input');
    const tripTable = document.getElementById('trip-table');
    const tableRows = tripTable.getElementsByTagName('tr');

    searchInput.addEventListener('input', function() {
      const searchQuery = searchInput.value.toLowerCase();

      for (let i = 1; i < tableRows.length; i++) {
        const row = tableRows[i];
        const rowData = row.innerText.toLowerCase();

        if (rowData.includes(searchQuery)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>