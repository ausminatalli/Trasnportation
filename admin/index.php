<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skyline Dashboard</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/admin.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <style>
      body {
        background-color: #f4f6f9;
      }
      .gold-star {
        color: gold;
      }
      
    </style>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" class="menu">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <h1>
          <a id="title" href="index.html" class="logo text-center"
            ><img
              src="../img/Transportation_Logo.png"
              alt="Logo"
              class="logo-image"
          /></a>
        </h1>
        <ul class="list-unstyled components mb-5">
          <li id="dashboard">
            <a href="#"
              ><span class="fa fa-dashboard fa-beat mr-3"></span> Dashboard</a
            >
          </li>
          <li id="trips" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="fa-sharp fa-solid fa-plane fa-beat mr-3"></span>
              Trips</a
            >
            <ul class="dropdown-menu bg-secondary">
              <li id="addtrip"><a href="#">Add Trip</a></li>
              <li id="viewtrip"><a href="#">View Trip</a></li>
            </ul>
          </li>
          <li id="drivers" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              ><span class="fa-solid fa-car fa-beat mr-3"></span> Drivers</a
            >
            <ul class="dropdown-menu bg-secondary">
              <li id="adddriver"><a href="#">Add Driver</a></li>
              <li id="viewdriver"><a href="#">View Driver</a></li>
            </ul>
          </li>
          <li id="bus" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              ><span class="fa-solid fa-bus fa-beat mr-3"></span> Busses</a
            >
            <ul class="dropdown-menu bg-secondary">
              <li id="addbus"><a href="#">Add Bus</a></li>
              <li id="viewbus"><a href="#">View Bus</a></li>
            </ul>
          </li>
          <li id="applications">
            <a href="#"
              ><span class="fa-solid fa-user-tie fa-beat mr-3"></span>
              Applications</a
            >
          </li>
          <li id="stats">
            <a href="#"
              ><span class="fa-solid fa-chart-line fa-beat mr-3"></span>
              Statistics</a
            >
          </li>
          <li id="payments">
            <a href="#"
              ><span class="fa-solid fa-suitcase fa-beat mr-3"></span>
              Payments</a
            >
          </li>
          <li id="admin" class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
              ><span class="fa-solid fa-screwdriver-wrench fa-beat mr-3"></span>
              Admin</a
            >
            <ul class="dropdown-menu bg-secondary">
              <li id="addadmin"><a href="#">Add Admin</a></li>
              <li id="viewadmin"><a href="#">View Admin</a></li>
            </ul>
          </li>
        </ul>
        <div class="user">
          <div class="text-center d-flex flex-column align-items-center">
            <p class="username">Mohammad Yassine</p>
            <a href="#" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </nav>

      <!-- Page Content  -->
      
       
      <div id="content" class="p-4 p-md-5 pt-5">
        
      </div>
       
      
      
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/ajaxhandling.js"></script>
    <script
      src="https://kit.fontawesome.com/c2e9579f75.js"
      crossorigin="anonymous"
    ></script>
    <script>
      $(document).ready(function () {
        $(".dropdown-toggle").dropdown();
      });
      function showReview(stars, comment) {
        var reviewStars = document.getElementById("reviewStars");
        var reviewComment = document.getElementById("reviewComment");

        // Clear previous content
        reviewStars.innerHTML = "";
        reviewComment.innerHTML = "";

        // Display stars
        for (var i = 0; i < stars; i++) {
          var star = document.createElement("i");
          star.classList.add("fa", "fa-solid", "fa-star", "gold-star");
          reviewStars.appendChild(star);
        }

        // Display comment
        reviewComment.innerHTML = comment;

        // Show the modal
        $("#reviewModal").modal("show");
      }
      
    </script>
  </body>
</html>