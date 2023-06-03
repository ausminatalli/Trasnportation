<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <style>
    body {
      margin: 0px;
      padding: 0px;
      background-color:#e5f6ff !important;
    }
   
    .card {
      margin: 40px auto;
    }
    input {
      background-color: rgb(64, 64, 251);
      color: white;
      padding: 5px;
      border-radius: 5px;
      width: 250px;
      margin-top: 5px;
    }
    .flex {
      display: flex;
      justify-content: center;
    }
    .card-body {
      background-color: rgb(245, 245, 245);
      font-weight: 400;
    }
    p {
      font-size: 14px;
    }
  </style>
  <body>
  <?php   
   include('../headersearch.html');
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
    <?php include('../footer.html'); ?>
  </body>
</html>