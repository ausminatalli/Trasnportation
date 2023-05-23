<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactstyle.css" />
  </head>
  <body>
    <?php
    include('header.html')
    ?>
    <div class="Contact mb-5">
      <div class="image">
        <img
          src="../img/email-support-outsourcing-service-in-australia-v3os-australia - Copy.png" />
      </div>
      <div class="con2">
        <h2>Contact us</h2>
        <form action="" class="contact-input">
          <input type="text" placeholder="Full Name" />
          <input type="text" placeholder="Email" />
          <input type="text" placeholder="phone" />
          <textarea
            name=""
            placeholder="message..."
            id=""
            cols="30"
            rows="10"></textarea>
          <button>Submit</button>
        </form>
      </div>
    </div>
    <?php
    include('footer.html')
    ?>
  </body>
</html>
