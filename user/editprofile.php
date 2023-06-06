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
<body>

   <?php  include('../include/userheader.html') ?>
      <section class="Profile" >
        <div class="container">
            <div class="login-content">
                <h2>Edit your profile</h2>
                <p>PLEASE ENTER YOUR NEW INFORMATION</p>
                <form action="">
                    <div class="flexSb gap-2">
                        <input type="text" name="" placeholder="Name" id="name" value="hassan">
                        <input type="text" name="" placeholder="Last Name" id="lastname" value="barada">
                    </div>
                    <div class="flexSb gap-2">
                      <h6 class="text-danger ml-2" id="vname"></h6>
                      <h6 class="text-danger" id="vlastName"></h6>
                    </div>

                    <input type="number"  placeholder="Your Phone Number" id="number">
                    <h6 class="text-danger" id="vnumber"></h6>

                    <div class="flexSb password">
                        <input type="password"  placeholder="password" id="password">
                        <i class="fa-solid fa-eye" onclick="showpassword(event)"></i>
                    </div>
                    <h6 class="text-danger" id="vpassword"></h6>
                    <div class="flexSb password">
                        <input type="password"  placeholder="confirm password" id="cpassword">
                        <i class="fa-solid confirmpass fa-eye" onclick="showcpassword(event)"></i>
                    </div>
                    <h6 class="text-danger" id="vcpassword"></h6>

                    <div class="flexSb ">
                        <div class="check">
                            <input type="checkbox">
                            <p>I agree to change my personal information</p>
                        </div>
                    </div>
                    <button class="btn-blue" onclick="validation(event)" type="submit">Save</button>
                    
                </form>
            </div>
        </div>
        </section>
      <?php include('../main/footer.html')   ?>
     
      <script src="js/editprofile.js"></script>
</body>
</html>