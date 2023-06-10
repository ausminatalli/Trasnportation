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
    <title>DriverInfo page</title>
  </head>
  <body>
    <section class="register">
      <div class="container">
        <div class="login-content">
          <h2>Driver Information</h2>
          <p>
            Please fill all the requerments information, we will contact with
            you after 48h.
          </p>
    
          <form id='registerBus' method="POST" enctype="multipart/form-data" action="../../upload.php" onsubmit="return driverInfovalidation(event)">
            <div class="flexSb gap-2">
              <input type="text" name="" placeholder="City" id="city" />
              <input type="text" name="" placeholder="Address" id="address" />
            </div>
            <div class="flexSb gap-2">
              <h6 class="text-danger ml-2" id="vcity"></h6>
              <h6 class="text-danger" id="vaddress"></h6>
            </div>
            <input
              type="number"
              
              placeholder="Phone number"
              id="number"
            />
            <h6 class="text-danger" id="vnumber"></h6>

            <label for="date"
              >Date of birthday <span class="text-danger">*</span></label
            >
            <div class="flexSb password">
              <input type="date"  id="date" />
            </div>
            <h6 class="text-danger" id="vdate"></h6>

            <label for="license"
              >License section <span class="text-danger">*</span></label
            >
            <div class="flexSb gap-2">
              <input
                type="number"
                name=""
                placeholder="License Number"
                id="lnum"
              />
              <input
                type="date"
                name=""
                placeholder="Expiry Date"
                id="ledate"
              />
            </div>
            <div class="flexSb gap-2">
              <h6 class="text-danger ml-2" id="vlnum"></h6>
              <h6 class="text-danger" id="vledate"></h6>
            </div>

            <div class="flexSb">
              <input
                id="file"
                class="custom-file-input"
                placeholder=""
                name="file"
                type="file"
              />
            </div>
            <h6 class="text-danger" id="vfile"></h6>

            <textarea
              placeholder="About Your Self..."
              name=""
              id="info"
              rows="5"
              class="w-100"
            ></textarea>
            <h6 class="text-danger" id="vinfo"></h6>
            <button type="submit" class="btn-blue" style="display: block; text-align: center; line-height: 50px">Submit</button>
          </form>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <?php include('../../include/footer.html') ?>
    <!-- Footer -->

    <script src="../js/validation.js"></script>
  </body>
</html>
