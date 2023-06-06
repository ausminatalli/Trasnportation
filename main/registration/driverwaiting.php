<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            background-color: #e5f6ff;
        }
        .container{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-bottom:30px;
            gap:25px;
            width: 80%;
            
        }
        .content{
            width:40%;
            background-color:white;
            border-radius:5px;
            padding:15px;
          
        }
        .image{
            width:45%;
            margin-top:30px;
        }
       .x{
        margin-top:3px;
       }
     
       @media screen and (max-width:700px) {
        body{
            margin: 0;
            padding: 0;
        }
       
        .container{
            flex-direction:column-reverse;
            margin: 0;
            width: 100%;
        }
        .content{
            width:80%;
        }
         .image{
            width:80%;
            margin-left: 0;
        }
       }
    </style>
</head>
<body>
  
    
      <div class="container">
        <div class="content">
            <h6 class="mg">Thank you for your interest to join our team,we will contact you in the upcoming days.</h6>
            <button class="btn btn-sm btn-primary"> <a  href="../../index.php" class="text-white text-decoration-none" >Back to Homepage</a></button>
        </div>
        
            <img class="image" src="../../img/Bus.gif"  alt="...">
        
      </div>
      
   
      <?php include('../footer.html'); ?>
    
</body>
</html>