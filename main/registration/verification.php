<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/verification.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
  <?php   
   include('../../include/header.html');
    ?>
  <div class="container">
    <div class="card" style="width: 35rem; height: 35rem">
      <img
        src="https://i.ibb.co/3YpB4pH/veri.jpg"
        class="card-img-top"
        alt="..."
      />
      <div class="card-body">
        <h5 class="card-title text-center">Verify your email address</h5>
        <p class="card-text mt-4 ms-3">
          We have sent to you an email to verify your email adress and activate
          your account.the link in the email will expire in 24 hours.
        </p>
        <div class="flex">
          <a href="#"><input type="submit" value="Verify your email" /></a>
        </div>
      </div>
    </div>
  </div>
    <?php include('../../include/footer.html'); ?>
  </body>
</html>
