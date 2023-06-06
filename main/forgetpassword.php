<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="../css/style.css" />
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
    <title>Forgot Password</title>
  </head>
  <body>
  <?php include('../include/header.html')  ?>
    <section class="login">
      <div class="container">
        <div class="login-content">
          <h2>Forgot Password</h2>
          <p>PLEASE ENTER YOUR EMAIL ADDRESS TO RESET YOUR PASSWORD.</p>
          <form id="forgetform" action="#">
          
            <input oninput='handleEmailInput()' id='email' type="email"  placeholder="Email address" />
            <div class="error text-danger" id="email-error"></div>
            <button onclick='handleSubmit(event,"forget")' id='submit' class="btn-blue" type="submit">Reset Password</button>
            <p class="dont">
              Remembered your password? <a href="#">Sign in</a>
            </p>
          </form>
        </div>
      </div>
    </section>
    <?php include('../include/footer.html') ?>
    <script src="js/validation.js"></script>
  </body>
</html>
