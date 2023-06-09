<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="../css/currency.css" />
    <title>Document</title>
  </head>
  <style></style>
  <body>
    <section class="top-nav">
      <div class="logo">
        <a href="../index.php"
          ><img src="../img/Transportation_Logo.png" alt=""
        /></a>
      </div>
      <input id="menu-toggle" type="checkbox" />
      <label class="menu-button-container" for="menu-toggle">
        <div class="menu-button"></div>
      </label>
      <ul class="menu">
        <li><h5 class="line text-danger"><?php echo $row['firstname'] ,' ', $row['lastname'] ?>
</h5></li>
        <li><a class="line" href="./editprofile.php">Profile</a></li>
        <li class="currencycontainer">
          <a class="line" href="#" id="currency">Lira</a>
        </li>
        <li><a class="line" href="./userbooking.php">Manage</a></li>
        <li><a class="signup" href="logout.php">Logout</a></li>
      </ul>
    </section>
    <div id="ajaxtest"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </body>
</html>
