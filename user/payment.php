<?php
include('../path.php');
include("../config.php");

session_start();

$id = $_SESSION['id'];
if(isset($_SESSION['id'])&& ($_SESSION['type']==0))
{
    $query = "select * from users WHERE userid = $id";
    $result = mysqli_query($conn, $query) or die("Selecting user profile failed");
    $row = mysqli_fetch_array($result);
    $_SESSION['username']=$row['firstname'];
    $_SESSION['user_id']=$row['userid'];
}
else
{
  header('location:../main/login.php?msg=please_login');
}


if(isset($_POST["payment"])){

    $tripid=$_GET['t'];
    $userid=$_GET['u'];
    $paymentprice=$_GET['p'];


    $query = "SELECT * FROM payments WHERE userid = ? and tripid=?";
    $stmtCheckEmail = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmtCheckEmail, 'ii', $userid, $tripid);
    mysqli_stmt_execute($stmtCheckEmail);
    $result = mysqli_stmt_get_result($stmtCheckEmail);
  
    if (mysqli_num_rows($result) > 0) {

    header('Location: userbooking.php?msg=err-pay');


    }else{

    
      

    $sql="INSERT INTO PAYMENTS (userid, tripid, amountpaid) Values (?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"iis", $userid, $tripid, $paymentprice);


    if(mysqli_stmt_execute($stmt)){
        echo "payment successfully";
        $sql = "UPDATE trips SET seats = seats - 1 WHERE tripid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $tripid);
        $stmt->execute();
        $sql2 = "UPDATE users SET nboftrips = nboftrips + 1 WHERE  userid= ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $userid);
        $stmt2->execute();
        if ($stmt->affected_rows > 0) {
          echo "Seats decremented successfully.";
      }
      header('Location: userbooking.php?msg=pay_success');
    }
    else{
        echo "('Error: " . mysqli_stmt_error($stmt) . "')";
    }

    mysqli_stmt_close($stmt);
}

}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/payment.css"/>
  <body>
 
    <div class="container">
      <div class="card-container">
        <div class="front">
          <div class="image">
            <img src="https://i.ibb.co/BPbrXHr/chip.png" alt="" />
            <img src="https://i.ibb.co/k48rfHD/visa.png" alt="" />
          </div>
          <div class="card-number-box">################</div>
          <div class="flexbox">
            <div class="box">
              <span>card holder</span>
              <div class="card-holder-name">full name</div>
            </div>
            <div class="box">
              <span>expires</span>
              <div class="expiration">
                <span class="exp-month">mm</span>
                <span class="exp-year">yy</span>
              </div>
            </div>
          </div>
        </div>

        <div class="back">
          <div class="stripe"></div>
          <div class="box">
            <span>cvv</span>
            <div class="cvv-box"></div>
            <img src="image/visa.png" alt="" />
          </div>
        </div>
      </div>

      <form  action="" method="POST" onsubmit="return paymentvalidate();" >   
      <div class="ticket">
        <h3 class="title">The price of trip selected:</h3>
        <p class="price"><?php echo '<i class="fa-solid fa-money-check-dollar"></i>' . $_GET['p'] . ' L.L';?></p>
      </div>     
      <div class="inputBox">
          <span>card number</span>
          <input type="text" maxlength="16" class="card-number-input" id="cardnumber"/>
          <span id="vcardnumber" class="vspan"></span>
        </div>
        <div class="inputBox">
          <span>card holder</span>
          <input type="text" class="card-holder-input" id="cardholder"/>
          <span id="vcardholder" class="vspan"></span>
        </div>
        <div class="flexbox">
          <div class="inputBox">
            <span>expiration mm</span>
            <select name="" class="month-input" id="month">
              <option value="month" selected>month</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
            <span id="vmonth" class="vspan"></span>
          </div>
          <div class="inputBox">
            <span>expiration yy</span>
            <select name="" class="year-input" id="year">
              <option value="year" selected>year</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
            </select>
            <span id="vyear" class="vspan"></span>
          </div>
          <div class="inputBox">
            <span>cvv</span>
            <input type="text" maxlength="4" class="cvv-input" id="code"/>
            <span id="vcode" class="vspan"></span>
          </div>
        </div>
        <input type="submit" name="payment" value="submit" class="submit-btn" />
        <p>you can exit the page by clicking <a href="./usermain.php">back</a></p>
      </form>
    </div>

   <script src="js/payment.js"></script>
   <script>
    function paymentvalidate(){
    let cardnumber=document.getElementById('cardnumber');
    let cardholder=document.getElementById('cardholder');
    let code=document.querySelector('#code');
    let month=document.querySelector('#month');
    let year=document.querySelector('#year');
    let vcardnumber=document.getElementById('vcardnumber');
    let vcardholder=document.getElementById('vcardholder');
    let vcode=document.querySelector('#vcode');
    let vmonth=document.querySelector('#vmonth');
    let vyear=document.querySelector('#vyear');
    
    console.log(vmonth);
    let isvalid=true;
       if(cardnumber.value===""){
        vcardnumber.innerHTML="please enter the card number";
        isvalid=false;
       }
       if(cardholder.value===""){
        vcardholder.innerHTML="please enter the card number";
        isvalid=false;
       }
       if(code.value===""){
        vcode.innerHTML="please enter the card verification value";
        isvalid=false;
       }
       if(year.value==="year"){
        vyear.innerHTML="please select the date on year";
        isvalid=false;
       }
       if(month.value==="month"){
        vmonth.innerHTML="please select the date on month";
        isvalid=false;
       }
       if(isvalid){
          return true;
       }
        return false;
    }
    var currentDate = new Date();
    var currentMonth = currentDate.getMonth() + 1;
    document.getElementById('month').addEventListener('change', function() {
    var selectedMonth = parseInt(this.value);

    if (selectedMonth < currentMonth) {
    vmonth.innerHTML = 'Error: Selected month is less than the current month.';
    } else {
      vmonth.innerHTML = '';
    }
  });
   </script>
  </body>
</html>
