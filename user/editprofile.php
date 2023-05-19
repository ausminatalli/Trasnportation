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

</style>
<body>

   <?php  include('header.html') ?>
      <section class="Profile" >
        <div class="container">
            <div class="login-content">
                <h2>Edit your profile</h2>
                <p>PLEASE ENTER YOUR NEW INFORMATION</p>
                <form action="">
                    <div class="flexSb gap-2">
                        <input type="text" name="" placeholder="Name" id="">
                        <input type="text" name="" placeholder="Last Name" id="">
                    </div>
                    <input type="number" required placeholder="Your Phone Number">
                    <div class="flexSb password">
                        <input type="password" required placeholder="password">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="flexSb password">
                        <input type="password" required placeholder="confirm password">
                        <i class="fa-solid fa-eye"></i>
                    </div>

                    <div class="flexSb ">
                        <div class="check">
                            <input type="checkbox">
                            <p>I agree to change my personal information</p>
                        </div>
                    </div>
                    <button class="btn-blue" type="submit">Save</button>
                    
                </form>
            </div>
        </div>
        </section>
      <?php include('../main/footer.html')   ?>
     
        
</body>
</html>