<?php
include('../../path.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/login.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
    />
    <title>Driver Register page</title>
  </head>
  <body>
    <section class="register">
      <div class="container">
        <div class="login-content">
          <h2>Driver Sign up</h2>
          <p>PLEASE ENTER YOUR LOGIN TO SIGN UP.</p>
          <form action="">
            <div class="flexSb gap-2">
              <input type="text" name="" placeholder="Name" id="name" />
              <input
                type="text"
                name=""
                placeholder="Last Name"
                id="lastName"
              />
            </div>
            <div class="flexSb gap-2">
              <h6 class="text-danger ml-2" id="vname"></h6>
              <h6 class="text-danger" id="vlastName"></h6>
            </div>
            <input
              type="email"
              id="email"
              required
              placeholder="Email Adress"
            />
            <h6 class="text-danger" id="vemail"></h6>

            <div class="flexSb password">
              <input
                type="password"
                id="password"
                required
                placeholder="password"
              />
              <i class="fa-solid fa-eye" onclick="showpassword(event)"></i>
            </div>
            <h6 class="text-danger" id="vpassword"></h6>
            <div class="flexSb password">
              <input
                type="password"
                id="cpassword"
                required
                placeholder="confirm password"
              />
              <i
                class="fa-solid confirmpass fa-eye"
                onclick="showcpassword(event)"
              ></i>
            </div>
            <h6 class="text-danger" id="vcpassword"></h6>

            <div class="flexSb">
              <div class="check">
                <input type="checkbox" />
                <p>I agree to the terms of service and privacy policy</p>
              </div>
            </div>
            <a
              class="btn-blue"
              onclick="drivervalidation(event)"
              style="display: block; text-align: center; line-height: 50px"
              >Sign up</a
            >

            <p class="dont">
              Already a member? <a href="../login.php">Login</a>
            </p>
          </form>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php include("../../include/footer.html")  ?>
    <!-- Footer -->
    <script src="../js/validation.js"></script>
  </body>
</html>
