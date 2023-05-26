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
<section class="top-nav  driver-nav">
        <div class="logo">
            <a href="index.html"><img src="../img/Transportation_Logo.png" alt=""></a>
        </div>
        <input id="menu-toggle" type="checkbox" />
        <label class='menu-button-container' for="menu-toggle">
        <div class='menu-button'></div>
      </label>
        <ul class="menu">
            <li><a class="line" href="#">Driver Name</a></li>
            <li><a class="line" href="#">Profile</a></li>
            <li><a class="signup" href="../index.html">Logout</a></li>
          
      </section>
    
    
    <section class="container p-5 ">
        <h2 class="mb-5 h1">Day Off History</h2>
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
                <th scope="col" class="h5 p-3">Full Name</th>
                <th scope="col" class="h5 p-3">Email</th>
                <th scope="col" class="h5 p-3">Phone Number</th>
                <th scope="col" class="h5 p-3">Start Date</th>
                <th scope="col" class="h5 p-3">End Date</th>
                <th scope="col" class="h5 p-3">Reason</th>
                <th scope="col" class="h5 p-3">Response</th>
            </tr>

        </thead>
        <tbody>
            <tr>
                <td scope="row" class="h6 p-3">Razan AlBitar</td>
                <td class="h6 p-3">razanbittar57@gmail.com</td>
                <td class="h6 p-3">+961 81768974</td>
                <td class="h6 p-3">05/05/2023</td>
                <td class="h6 p-3">21/05/2023</td>
                <td class="h6 p-3">Vacation</td>
                <td class="text-danger font-weight-bold h6 p-3">Declined</td>
            </tr>
            <tr>
                <td scope="row" class="h6 p-3" >Razan AlBitar</td>
                <td class="h6 p-3">razanbittar57@gmail.com</td>
                <td class="h6 p-3">+961 81768974</td>
                <td class="h6 p-3">07/09/2023</td>
                <td class="h6 p-3">10/09/2023</td>
                <td class="h6 p-3">Illness</td>
                <td class="text-success font-weight-bold h6 p-3">Accepted</td>
            </tr>
            <tr>
                <td scope="row" class="h6 p-3">Razan AlBitar</td>
                <td class="h6 p-3">razanbittar57@gmail.com</td>
                <td class="h6 p-3">+961 81768974</td>
                <td class="h6 p-3">07/09/2023</td>
                <td class="h6 p-3">08/09/2023</td>
                <td class="h6 p-3">Death</td>
                <td class="text-success font-weight-bold h6 p-3">Accepted</td>
            </tr>
        </tbody>
      </table>
      </section>
      <?php
      include('../main/footer.html')
      ?>
</body>
</html>