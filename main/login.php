<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    <title>login</title>
</head>
<style>
.error-field {
  border-color: red;
}

.error {
  color: red
}
</style>
<body>
    <?php  include('../include/header.html')   ?>
    <?php 
     if (isset($_GET['msg']) && ($_GET['msg'] == "failed")) {
      $errorMessage = "Login Failed: Invalid Email or Password!";
     }
    ?>
      <section class="login ">
        <div class="container">
            <div class="login-content">
                <h2>login</h2>
                <p>PLEASE ENTER YOUR LOGIN DETAILS TO SIGN IN.</p>
                <form id="loginform" action="processLogin.php" method="POST" onsubmit="return handleSubmit('login')">
                  <input oninput="handleEmailInput()" name="email" id="email" type="text"  placeholder="Email address">
                  <div class="error" id="email-error"></div> <!-- Error message for email -->
                  
                  <div class="flexSb password">
                    <input oninput="handlePasswordInput()" name="password" id="password" type="password"  placeholder="Password">
                    <i class="fa-solid fa-eye"onclick="showpassword(event)" ></i>
                  </div>
                  <div class="error" id="password-error"></div> <!-- Error message for password -->
                  
                  <div class="flexSb ">
                    <div class="check">
                      <input type="checkbox">
                      <p>Keep me logged in</p>
                    </div>
                    <h5 class="forget"><a href="#">Forgot password?</a></h5>
                  </div>
                  <button onsubmit="handleSubmit('login')" class="btn-blue" type="submit">Login</button>
                  <p class="dont">Don't have an account? <a href="signup.html">Sign up</a></p>
                </form>
                <div class="text-center">
                <span class="text-danger text-center" id="err"><?php echo isset($errorMessage) ? $errorMessage : ''; ?></span>
            </div>
            </div>
        </div>

      </section>
           <!-- Footer -->

           <?php include('../include/footer.html'); ?>
           <!-- Footer -->
             
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/validation.js"></script>
    
</body>
</html>