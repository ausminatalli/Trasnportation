<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="ContactStyle.css" />
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  
  <body>
    <?php include('header.html'); ?>
    <div class="Contact">
      <div class="image">
        <img
          src="email-support-outsourcing-service-in-australia-v3os-australia - Copy.png"
          alt="ContactUs illustration" />
      </div>
      <div class="con2">
        <h2>Contact us</h2>
        <form action="../api/contactApi.php" method="POST" class="contact-input">
          <input type="text" id="fullName" name="name" placeholder="Full Name" />
          <input type="text" id="email" name="email" placeholder="Email" />
          <input type="text" id="phoneNumber" name="phone" placeholder="phone" />
          <textarea
            name="text"
            placeholder="message..."
            id="message"
            cols="30"
            rows="10"></textarea>
          <button type="submit" name="send">Submit</button>
          <h6 class="text-success" id="success"></h6>
        </form>
      </div>
    </div>
    <script src="./ContactUs.js"></script>
    <?php include('footer.html'); ?>
  </body>
</html>
